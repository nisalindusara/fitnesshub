<?php

/**
 * Builds an instructor's client list (My Clients) and owns the rules for
 * adding a client.
 *
 * A client's status is derived, not stored (except 'paused'):
 *  - paused        instructor_clients.status = 'paused'
 *  - new           no published workout plan yet
 *  - needs_review  adherence below NEEDS_REVIEW_BELOW
 *  - active        everything else
 *
 * Business-rule violations throw InvalidArgumentException.
 */
class ClientRosterService
{
    public const NEEDS_REVIEW_BELOW = 60;
    public const TYPES = ['1-on-1' => '1-on-1', 'group' => 'Group'];
    public const FILTERS = ['all' => 'All', '1-on-1' => '1-on-1', 'group' => 'Group', 'needs_review' => 'Needs review'];
    public const SORTS = ['next' => 'Next session', 'name' => 'Name', 'adherence' => 'Adherence'];

    private InstructorClient $clients;
    private WorkoutPlan $plans;
    private WorkoutLog $logs;
    private User $users;
    private WorkoutPlanService $planService;

    public function __construct(
        ?InstructorClient $clients = null,
        ?WorkoutPlan $plans = null,
        ?WorkoutLog $logs = null,
        ?User $users = null,
        ?WorkoutPlanService $planService = null
    ) {
        $this->clients = $clients ?? new InstructorClient();
        $this->plans = $plans ?? new WorkoutPlan();
        $this->logs = $logs ?? new WorkoutLog();
        $this->users = $users ?? new User();
        $this->planService = $planService ?? new WorkoutPlanService($this->plans, $this->clients, null, $this->logs);
    }

    /** Every client of the instructor, enriched with plan, adherence, today and next-workout info. */
    public function buildRoster(int $instructorId): array
    {
        $today = new DateTimeImmutable('today');
        $todayDow = (int) $today->format('N');
        $roster = [];

        foreach ($this->clients->listForInstructor($instructorId) as $row) {
            $memberId = (int) $row['member_id'];
            $published = $this->plans->findForMember($memberId, 'published') ?: null;
            $draft = $this->plans->findForMember($memberId, 'draft') ?: null;
            $days = $published ? $this->plans->getDaysWithExercises((int) $published['id']) : null;
            $adherence = $published ? $this->planService->adherence($memberId, $published, $days) : null;

            $todayCount = 0;
            $todayDone = 0;
            $next = null;

            if ($published && new DateTimeImmutable($published['start_date']) <= $today) {
                $todayCount = count($days[$todayDow]['exercises']);
                if ($todayCount > 0) {
                    $todayDone = $this->logs->countForPlanBetween($memberId, (int) $published['id'], $today->format('Y-m-d'), $today->format('Y-m-d'));
                }
                $next = $this->nextWorkout($days, $today);
            }

            if ($row['status'] === 'paused') {
                $status = 'paused';
            } elseif (!$published) {
                $status = 'new';
            } elseif ($adherence !== null && $adherence < self::NEEDS_REVIEW_BELOW) {
                $status = 'needs_review';
            } else {
                $status = 'active';
            }

            $roster[] = [
                'member_id'         => $memberId,
                'name'              => trim($row['first_name'] . ' ' . $row['last_name']),
                'email'             => $row['email'],
                'type'              => $row['client_type'],
                'type_label'        => self::TYPES[$row['client_type']] ?? $row['client_type'],
                'created_at'        => $row['created_at'],
                'program'           => $published['name'] ?? ($draft['name'] ?? 'No plan yet'),
                'program_meta'      => $this->programMeta($published, $draft, $today),
                'adherence'         => $adherence,
                'status'            => $status,
                'today_count'       => $row['status'] === 'paused' ? 0 : $todayCount,
                'today_done'        => $todayDone,
                'next_days_away'    => $next['days_away'] ?? null,
                'next_session'      => $this->nextLabel($row['status'], $published, $next, $today),
                'next_session_meta' => $this->nextMeta($row['status'], $published, $next),
            ];
        }

        return $roster;
    }

    /** Numbers for the four stat cards at the top of My Clients. */
    public function stats(array $roster): array
    {
        $weekAgo = new DateTimeImmutable('-7 days');
        $adherences = array_filter(array_column($roster, 'adherence'), fn($a) => $a !== null);
        $training = array_filter($roster, fn($c) => $c['today_count'] > 0);
        $completed = array_filter($training, fn($c) => $c['today_done'] >= $c['today_count']);

        return [
            'active'        => count(array_filter($roster, fn($c) => $c['status'] !== 'paused')),
            'new_this_week' => count(array_filter($roster, fn($c) => new DateTimeImmutable($c['created_at']) >= $weekAgo)),
            'today'         => count($training),
            'today_done'    => count($completed),
            'avg_adherence' => $adherences ? (int) round(array_sum($adherences) / count($adherences)) : null,
            'needs_review'  => count(array_filter($roster, fn($c) => $c['status'] === 'needs_review')),
        ];
    }

    public function filterCounts(array $roster): array
    {
        $counts = [];
        foreach (array_keys(self::FILTERS) as $key) {
            $counts[$key] = count($this->applyFilter($roster, $key));
        }
        return $counts;
    }

    /** Search, filter and sort — the list the table shows (before pagination). */
    public function query(array $roster, string $search, string $filter, string $sort): array
    {
        $list = $this->applyFilter($roster, $filter);

        $term = mb_strtolower(trim($search));
        if ($term !== '') {
            $list = array_filter($list, fn($c) => str_contains(mb_strtolower($c['name'] . ' ' . $c['email']), $term));
        }

        $list = array_values($list);
        usort($list, match ($sort) {
            'name'      => fn($a, $b) => strcasecmp($a['name'], $b['name']),
            // Lowest adherence first — the clients who need attention; unknown last
            'adherence' => fn($a, $b) => [$a['adherence'] === null, $a['adherence']] <=> [$b['adherence'] === null, $b['adherence']],
            default     => fn($a, $b) => [$a['next_days_away'] === null, $a['next_days_away'], $a['name']]
                                     <=> [$b['next_days_away'] === null, $b['next_days_away'], $b['name']],
        });

        return $list;
    }

    /** Assigns an existing gym member to the instructor. */
    public function addClient(int $instructorId, int $memberId, string $type): void
    {
        if (!array_key_exists($type, self::TYPES)) {
            throw new InvalidArgumentException('Choose 1-on-1 or Group.');
        }
        if (!$this->users->findMemberById($memberId)) {
            throw new InvalidArgumentException('Pick a member from the search results.');
        }
        if ($this->clients->findForInstructor($instructorId, $memberId)) {
            throw new InvalidArgumentException('That member is already one of your clients.');
        }

        $this->clients->create($instructorId, $memberId, $type);
    }

    public function searchAssignableMembers(int $instructorId, string $term): array
    {
        $term = trim($term);
        if (mb_strlen($term) < 2) {
            return [];
        }
        return $this->clients->searchAssignableMembers($instructorId, $term);
    }

    // ------------------------------------------------------------------

    private function applyFilter(array $roster, string $filter): array
    {
        return array_filter($roster, fn($c) => match ($filter) {
            '1-on-1', 'group' => $c['type'] === $filter,
            'needs_review'    => $c['status'] === 'needs_review',
            default           => true,
        });
    }

    /** First day from today (inclusive) that has exercises, within the next week. */
    private function nextWorkout(array $days, DateTimeImmutable $today): ?array
    {
        for ($i = 0; $i < 7; $i++) {
            $date = $today->modify("+{$i} days");
            $day = $days[(int) $date->format('N')];
            if (count($day['exercises']) > 0) {
                return ['days_away' => $i, 'date' => $date, 'focus' => $day['focus'], 'count' => count($day['exercises'])];
            }
        }
        return null;
    }

    private function programMeta(?array $published, ?array $draft, DateTimeImmutable $today): string
    {
        if (!$published) {
            return $draft ? 'Draft, not published' : 'Plan not set';
        }

        $start = new DateTimeImmutable($published['start_date']);
        if ($start > $today) {
            return 'Starts ' . $start->format('D, j M');
        }

        $week = intdiv($start->diff($today)->days, 7) + 1;
        $total = (int) $published['duration_weeks'];
        $label = $week > $total ? "Finished ({$total} weeks)" : "Week {$week} of {$total}";

        return $draft ? $label . ' · unpublished changes' : $label;
    }

    private function nextLabel(string $assignmentStatus, ?array $published, ?array $next, DateTimeImmutable $today): string
    {
        if ($assignmentStatus === 'paused') {
            return 'Paused';
        }
        if (!$published) {
            return 'Not scheduled';
        }
        $start = new DateTimeImmutable($published['start_date']);
        if ($start > $today) {
            return $start->format('D, j M');
        }
        if ($next === null) {
            return 'Not scheduled';
        }
        return match ($next['days_away']) {
            0 => 'Today',
            1 => 'Tomorrow',
            default => $next['date']->format('D, j M'),
        };
    }

    private function nextMeta(string $assignmentStatus, ?array $published, ?array $next): string
    {
        if ($assignmentStatus === 'paused') {
            return 'Client paused';
        }
        if (!$published) {
            return 'Create a plan to start';
        }
        if ($next === null) {
            return 'Plan starts soon';
        }
        return ($next['focus'] ?: 'Workout') . ' · ' . $next['count'] . ' exercises';
    }
}
