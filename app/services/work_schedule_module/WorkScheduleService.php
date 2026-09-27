<?php

/**
 * Owns the instructor work schedule an admin builds on the Instructor Sessions calendar.
 *
 * Rules enforced here:
 *  - A session belongs to a staff member with the instructor role and ends after it starts.
 *  - An instructor can't be double-booked: sessions on the same date may not overlap.
 *  - A repeating session is stored as one row per date (daily, weekly on chosen weekdays,
 *    or monthly on the same day of the month), for at most a year.
 *  - Editing or deleting a repeating session applies to that one date, or to it and every
 *    later date in the series.
 *
 * Business-rule violations throw InvalidArgumentException.
 */
class WorkScheduleService
{
    public const TYPES = [
        'floor'       => 'Floor Duty',
        'class'       => 'Group Class',
        'pt'          => 'Personal Training',
        'orientation' => 'Member Orientation',
        'meeting'     => 'Staff Meeting',
    ];
    public const FREQUENCIES = ['daily' => 'Daily', 'weekly' => 'Weekly', 'monthly' => 'Monthly'];

    private const MAX_REPEAT = '+1 year';
    private const MAX_NOTES = 500;

    private WorkSession $sessions;

    public function __construct(?WorkSession $sessions = null)
    {
        $this->sessions = $sessions ?? new WorkSession();
    }

    /** The Mon–Sun week containing $anyDate (default: this week) and its sessions. */
    public function week(?string $anyDate): array
    {
        $day = $this->parseDate((string) $anyDate) ?? new DateTimeImmutable('today');
        $monday = $day->modify('-' . ((int) $day->format('N') - 1) . ' days');
        $sunday = $monday->modify('+6 days');

        return [
            'monday'      => $monday,
            'sunday'      => $sunday,
            'sessions'    => $this->sessions->between($monday->format('Y-m-d'), $sunday->format('Y-m-d')),
            'instructors' => $this->sessions->instructors(),
        ];
    }

    /** Creates a session, or a whole series when repeating. Returns the first session's date. */
    public function create(array $input, int $adminId): string
    {
        $session = $this->parse($input);
        $dates = $session['repeat'] ? $this->occurrences($session['session_date'], $session['repeat']) : [$session['session_date']];

        $this->assertFree($session, $dates, []);
        $this->sessions->apply([], null, $session['repeat'], $this->rows($session, $dates), $adminId);

        return $dates[0];
    }

    /**
     * $scope: 'one' changes only this session; 'following' replaces it and every later
     * session of its series with the submitted details (and repeat rule, if any).
     */
    public function update(int $id, array $input, string $scope, int $adminId): string
    {
        $existing = $this->requireSession($id);
        $session = $this->parse($input);
        $inSeries = $existing['series_id'] !== null;

        // One date of a series: the series rule stays as it is
        if ($inSeries && $scope !== 'following') {
            $this->assertFree($session, [$session['session_date']], [$id]);
            $this->sessions->apply([], ['id' => $id] + $session, null, [], $adminId);
            return $session['session_date'];
        }

        $replaced = $inSeries ? $this->sessions->seriesIdsFrom((int) $existing['series_id'], $existing['session_date']) : [$id];

        if (!$session['repeat']) {
            // Stops repeating: keep this session on its own, drop the later ones
            $this->assertFree($session, [$session['session_date']], $replaced);
            $later = array_values(array_diff($replaced, [$id]));
            $this->sessions->apply($later, ['id' => $id] + $session, null, [], $adminId, true);
            return $session['session_date'];
        }

        // (Re)starts a series from this session with the submitted rule
        $dates = $this->occurrences($session['session_date'], $session['repeat']);
        $this->assertFree($session, $dates, $replaced);
        $later = array_values(array_diff($replaced, [$id]));
        $this->sessions->apply(
            $later,
            array_merge($session, ['id' => $id, 'session_date' => $dates[0]]),
            $session['repeat'],
            $this->rows($session, array_slice($dates, 1)),
            $adminId,
            true
        );

        return $dates[0];
    }

    public function delete(int $id, string $scope): void
    {
        $existing = $this->requireSession($id);

        $ids = $existing['series_id'] !== null && $scope === 'following'
            ? $this->sessions->seriesIdsFrom((int) $existing['series_id'], $existing['session_date'])
            : [$id];

        $this->sessions->apply($ids, null, null, [], 0);
    }

    // ------------------------------------------------------------------

    private function requireSession(int $id): array
    {
        $session = $this->sessions->find($id);
        if (!$session) {
            throw new InvalidArgumentException('That session no longer exists. Refresh the calendar.');
        }
        return $session;
    }

    /** Validates the overlay form into session fields plus an optional repeat rule. */
    private function parse(array $input): array
    {
        $type = (string) ($input['session_type'] ?? '');
        if (!isset(self::TYPES[$type])) {
            throw new InvalidArgumentException('Select a session type.');
        }

        $instructorId = (int) ($input['instructor_id'] ?? 0);
        if (!in_array($instructorId, array_map('intval', array_column($this->sessions->instructors(), 'id')), true)) {
            throw new InvalidArgumentException('Select an instructor.');
        }

        $date = $this->parseDate((string) ($input['session_date'] ?? ''));
        if (!$date) {
            throw new InvalidArgumentException('Pick a date.');
        }

        $start = $this->parseTime((string) ($input['start_time'] ?? ''));
        $end = $this->parseTime((string) ($input['end_time'] ?? ''));
        if (!$start || !$end) {
            throw new InvalidArgumentException('Enter a start and end time.');
        }
        if ($end <= $start) {
            throw new InvalidArgumentException('The session must end after it starts.');
        }

        $notes = trim((string) ($input['notes'] ?? ''));
        if (mb_strlen($notes) > self::MAX_NOTES) {
            throw new InvalidArgumentException('Notes must be ' . self::MAX_NOTES . ' characters or fewer.');
        }

        $repeat = null;
        if (($input['repeat'] ?? '') === '1') {
            $frequency = (string) ($input['frequency'] ?? '');
            if (!isset(self::FREQUENCIES[$frequency])) {
                throw new InvalidArgumentException('Choose how often the session repeats.');
            }

            $until = $this->parseDate((string) ($input['repeat_until'] ?? ''));
            if (!$until) {
                throw new InvalidArgumentException('Pick the date the session repeats until.');
            }
            if ($until <= $date) {
                throw new InvalidArgumentException('"Repeat until" must be after the session date.');
            }
            if ($until > $date->modify(self::MAX_REPEAT)) {
                throw new InvalidArgumentException('A session can repeat for at most a year.');
            }

            $weekdays = null;
            if ($frequency === 'weekly') {
                $days = array_unique(array_filter(array_map('intval', (array) ($input['weekdays'] ?? [])), fn($d) => $d >= 1 && $d <= 7));
                sort($days);
                if (!$days) {
                    throw new InvalidArgumentException('Pick at least one day of the week to repeat on.');
                }
                $weekdays = implode(',', $days);
            }

            $repeat = ['frequency' => $frequency, 'weekdays' => $weekdays, 'repeat_until' => $until->format('Y-m-d')];
        }

        return [
            'instructor_id' => $instructorId,
            'session_type'  => $type,
            'session_date'  => $date->format('Y-m-d'),
            'start_time'    => $start,
            'end_time'      => $end,
            'notes'         => $notes === '' ? null : $notes,
            'repeat'        => $repeat,
        ];
    }

    /** Every date a repeat rule produces, from $start up to its repeat-until date. */
    private function occurrences(string $start, array $repeat): array
    {
        $from = new DateTimeImmutable($start);
        $until = new DateTimeImmutable($repeat['repeat_until']);
        $dates = [];

        if ($repeat['frequency'] === 'monthly') {
            // Same day of the month; months without that day (e.g. the 31st) are skipped
            $dayOfMonth = (int) $from->format('j');
            for ($month = $from->modify('first day of this month'); $month <= $until; $month = $month->modify('+1 month')) {
                if ($dayOfMonth <= (int) $month->format('t')) {
                    $date = $month->setDate((int) $month->format('Y'), (int) $month->format('n'), $dayOfMonth);
                    if ($date >= $from && $date <= $until) {
                        $dates[] = $date->format('Y-m-d');
                    }
                }
            }
        } else {
            $weekdays = $repeat['weekdays'] !== null ? array_map('intval', explode(',', $repeat['weekdays'])) : null;
            for ($date = $from; $date <= $until; $date = $date->modify('+1 day')) {
                if ($weekdays === null || in_array((int) $date->format('N'), $weekdays, true)) {
                    $dates[] = $date->format('Y-m-d');
                }
            }
        }

        if (!$dates) {
            throw new InvalidArgumentException('That repeat rule doesn\'t land on any date before "Repeat until".');
        }
        return $dates;
    }

    /** Throws if the instructor already has a session overlapping any of the dates. */
    private function assertFree(array $session, array $dates, array $ignoreIds): void
    {
        $existing = $this->sessions->forInstructorBetween($session['instructor_id'], min($dates), max($dates));
        $wanted = array_flip($dates);

        foreach ($existing as $other) {
            if (in_array((int) $other['id'], $ignoreIds, true) || !isset($wanted[$other['session_date']])) {
                continue;
            }
            if ($other['start_time'] < $session['end_time'] && $other['end_time'] > $session['start_time']) {
                $when = (new DateTimeImmutable($other['session_date']))->format('D, M j');
                throw new InvalidArgumentException(sprintf(
                    'This instructor already has %s on %s from %s to %s.',
                    self::TYPES[$other['session_type']] ?? 'a session',
                    $when,
                    substr($other['start_time'], 0, 5),
                    substr($other['end_time'], 0, 5)
                ));
            }
        }
    }

    private function rows(array $session, array $dates): array
    {
        return array_map(fn($date) => ['session_date' => $date] + $session, $dates);
    }

    private function parseDate(string $value): ?DateTimeImmutable
    {
        $date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);
        return $date && $date->format('Y-m-d') === $value ? $date : null;
    }

    /** "09:30" or "09:30:00" → "09:30:00", or null. */
    private function parseTime(string $value): ?string
    {
        return preg_match('/^([01]\d|2[0-3]):([0-5]\d)(:00)?$/', $value, $m) ? "{$m[1]}:{$m[2]}:00" : null;
    }
}
