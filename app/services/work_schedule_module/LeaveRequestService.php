<?php

/**
 * Owns what happens to an instructor's schedule when a manager decides a leave request.
 *
 * Rules enforced here:
 *  - Only a pending request can be approved or rejected, and only once.
 *  - Approving hands each affected session to another instructor who is free at that
 *    time and not on leave that day (the least-busy one that day); a session nobody can
 *    cover is cancelled.
 *  - Rejecting leaves every session with the instructor.
 *  - An approved leave can be cancelled until it starts: replacements go back to the
 *    original instructor and cancelled sessions are restored, where the original
 *    instructor is still free.
 *
 * Business-rule violations throw InvalidArgumentException.
 */
class LeaveRequestService
{
    public const TYPES = ['planned' => 'Planned Holiday', 'immediate' => 'Immediate Leave'];
    public const NO_COVER_NOTE = 'Cancelled automatically — no suitable instructor available.';

    private LeaveRequest $requests;
    private WorkSession $sessions;

    public function __construct(?LeaveRequest $requests = null, ?WorkSession $sessions = null)
    {
        $this->requests = $requests ?? new LeaveRequest();
        $this->sessions = $sessions ?? new WorkSession();
    }

    public function requireRequest(int $id): array
    {
        $request = $this->requests->find($id);
        if (!$request) {
            throw new InvalidArgumentException('That leave request does not exist.');
        }
        return $request;
    }

    /** A pending request and the sessions it affects, each with the replacement approving would assign. */
    public function review(int $id): array
    {
        $request = $this->requireRequest($id);

        return ['request' => $request, 'sessions' => $request['status'] === 'pending' ? $this->plan($request) : []];
    }

    /** A processed request and the recorded outcome of each affected session. */
    public function result(int $id): array
    {
        $request = $this->requireRequest($id);
        $outcomes = $this->requests->outcomes($id);
        $counts = array_count_values(array_column($outcomes, 'outcome')) + array_fill_keys(['replaced', 'cancelled', 'kept', 'reverted', 'restored'], 0);

        return ['request' => $request, 'outcomes' => $outcomes, 'counts' => $counts];
    }

    public function approve(int $id, int $managerId): void
    {
        $request = $this->requirePending($id);

        $outcomes = array_map(fn($s) => $this->outcomeRow($s, $s['replacement'] ? 'replaced' : 'cancelled', $s['replacement']['id'] ?? null,
            $s['replacement'] ? null : self::NO_COVER_NOTE), $this->plan($request));

        if (!$this->requests->decide($id, 'approved', $managerId, $outcomes)) {
            throw new InvalidArgumentException('This request has already been decided.');
        }
    }

    public function reject(int $id, int $managerId): void
    {
        $request = $this->requirePending($id);

        $outcomes = array_map(fn($s) => $this->outcomeRow($s, 'kept', null, null), $this->affectedSessions($request));

        if (!$this->requests->decide($id, 'rejected', $managerId, $outcomes)) {
            throw new InvalidArgumentException('This request has already been decided.');
        }
    }

    /** True while an approved leave can still be cancelled (it hasn't started yet). */
    public function canCancel(array $request): bool
    {
        return $request['status'] === 'approved' && $request['start_date'] > (new DateTimeImmutable('today'))->format('Y-m-d');
    }

    public function cancel(int $id, int $managerId): void
    {
        $request = $this->requireRequest($id);
        if ($request['status'] !== 'approved') {
            throw new InvalidArgumentException('Only an approved leave can be cancelled.');
        }
        if (!$this->canCancel($request)) {
            throw new InvalidArgumentException('This leave has already started, so it can no longer be cancelled.');
        }

        $outcomes = $this->requests->outcomes($id);
        $original = trim($request['first_name'] . ' ' . $request['last_name']);
        $changes = [];

        foreach ($outcomes as $row) {
            $ignore = $row['work_session_id'] !== null ? [(int) $row['work_session_id']] : [];
            $free = $this->isFree((int) $row['original_instructor_id'], $row['session_date'], $row['start_time'], $row['end_time'], $ignore);

            if ($row['outcome'] === 'replaced' && $row['work_session_id'] !== null) {
                $changes[(int) $row['id']] = $free
                    ? ['action' => 'revert', 'outcome' => 'reverted', 'outcome_note' => 'Replacement assignment reversed.']
                    : ['action' => null, 'outcome' => 'replaced', 'outcome_note' => "Kept with the replacement — {$original} is booked at this time."];
            } elseif ($row['outcome'] === 'cancelled') {
                $changes[(int) $row['id']] = $free
                    ? ['action' => 'restore', 'outcome' => 'restored', 'outcome_note' => 'Original instructor restored.']
                    : ['action' => null, 'outcome' => 'cancelled', 'outcome_note' => "Couldn't restore — {$original} is now booked at this time."];
            }
        }

        if (!$this->requests->cancel($id, $managerId, $outcomes, $changes)) {
            throw new InvalidArgumentException('This leave is no longer approved.');
        }
    }

    // ------------------------------------------------------------------

    private function requirePending(int $id): array
    {
        $request = $this->requireRequest($id);
        if ($request['status'] !== 'pending') {
            throw new InvalidArgumentException('This request has already been decided.');
        }
        return $request;
    }

    /** The requesting instructor's sessions during the leave. */
    private function affectedSessions(array $request): array
    {
        return array_values(array_filter(
            $this->sessions->between($request['start_date'], $request['end_date']),
            fn($s) => (int) $s['instructor_id'] === (int) $request['instructor_id']
        ));
    }

    /**
     * The affected sessions, each with the instructor who would cover it (or null).
     * Candidates must be free for the whole session and not on approved leave that day;
     * the one with the fewest scheduled minutes that day is picked, and each pick counts
     * towards later sessions so one instructor isn't double-booked.
     */
    private function plan(array $request): array
    {
        $requesterId = (int) $request['instructor_id'];
        $all = $this->sessions->between($request['start_date'], $request['end_date']);
        $onLeave = $this->requests->approvedLeaveByDate($request['start_date'], $request['end_date']);
        $candidates = array_values(array_filter($this->sessions->instructors(), fn($i) => (int) $i['id'] !== $requesterId));

        $busy = []; // [instructor][date] => [[start, end], …]
        foreach ($all as $s) {
            if ((int) $s['instructor_id'] !== $requesterId) {
                $busy[(int) $s['instructor_id']][$s['session_date']][] = [$s['start_time'], $s['end_time']];
            }
        }

        $planned = [];
        foreach ($all as $s) {
            if ((int) $s['instructor_id'] !== $requesterId) {
                continue;
            }

            $date = $s['session_date'];
            $best = null;
            $bestLoad = PHP_INT_MAX;
            foreach ($candidates as $c) {
                $cid = (int) $c['id'];
                if (in_array($cid, $onLeave[$date] ?? [], true)) {
                    continue;
                }
                $slots = $busy[$cid][$date] ?? [];
                foreach ($slots as [$start, $end]) {
                    if ($start < $s['end_time'] && $end > $s['start_time']) {
                        continue 2;
                    }
                }
                $load = array_sum(array_map(fn($slot) => strtotime($slot[1]) - strtotime($slot[0]), $slots));
                if ($load < $bestLoad) {
                    $best = $c;
                    $bestLoad = $load;
                }
            }

            if ($best) {
                $busy[(int) $best['id']][$date][] = [$s['start_time'], $s['end_time']];
            }
            $planned[] = $s + ['replacement' => $best];
        }

        return $planned;
    }

    private function isFree(int $instructorId, string $date, string $start, string $end, array $ignoreIds): bool
    {
        foreach ($this->sessions->forInstructorBetween($instructorId, $date, $date) as $s) {
            if (!in_array((int) $s['id'], $ignoreIds, true) && $s['start_time'] < $end && $s['end_time'] > $start) {
                return false;
            }
        }
        return true;
    }

    private function outcomeRow(array $session, string $outcome, ?int $replacementId, ?string $note): array
    {
        return [
            'work_session_id'           => (int) $session['id'],
            'session_date'              => $session['session_date'],
            'start_time'                => $session['start_time'],
            'end_time'                  => $session['end_time'],
            'session_type'              => $session['session_type'],
            'notes'                     => $session['notes'],
            'original_instructor_id'    => (int) $session['instructor_id'],
            'replacement_instructor_id' => $replacementId,
            'outcome'                   => $outcome,
            'outcome_note'              => $note,
        ];
    }
}
