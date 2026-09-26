<?php

/**
 * Owns workout plan rules: what a valid plan looks like, the draft → published
 * lifecycle, and adherence.
 *
 * Rules enforced here:
 *  - Only the instructor a member is assigned to can read or change that member's plan.
 *  - Save draft never changes what the member sees; Publish replaces the member's
 *    published plan (the old one is archived, not deleted).
 *  - A plan cannot be published with an empty week.
 *  - Delete removes the draft and archives the published plan, so workout history stays.
 *
 * Business-rule violations throw InvalidArgumentException; controllers catch it
 * and flash the message.
 */
class WorkoutPlanService
{
    public const GOALS = ['Muscle gain', 'Fat loss', 'Strength', 'Endurance', 'General fitness'];
    public const DURATIONS = [4, 6, 8, 12];
    public const DIFFICULTIES = ['beginner' => 'Beginner', 'intermediate' => 'Intermediate', 'advanced' => 'Advanced'];
    public const DAYS = [
        1 => ['key' => 'mon', 'short' => 'Mon', 'long' => 'Monday'],
        2 => ['key' => 'tue', 'short' => 'Tue', 'long' => 'Tuesday'],
        3 => ['key' => 'wed', 'short' => 'Wed', 'long' => 'Wednesday'],
        4 => ['key' => 'thu', 'short' => 'Thu', 'long' => 'Thursday'],
        5 => ['key' => 'fri', 'short' => 'Fri', 'long' => 'Friday'],
        6 => ['key' => 'sat', 'short' => 'Sat', 'long' => 'Saturday'],
        7 => ['key' => 'sun', 'short' => 'Sun', 'long' => 'Sunday'],
    ];

    private const MAX_EXERCISES_PER_DAY = 30;
    private const ADHERENCE_WINDOW_DAYS = 30;

    private WorkoutPlan $plans;
    private InstructorClient $clients;
    private Exercise $exercises;
    private WorkoutLog $logs;

    public function __construct(
        ?WorkoutPlan $plans = null,
        ?InstructorClient $clients = null,
        ?Exercise $exercises = null,
        ?WorkoutLog $logs = null
    ) {
        $this->plans = $plans ?? new WorkoutPlan();
        $this->clients = $clients ?? new InstructorClient();
        $this->exercises = $exercises ?? new Exercise();
        $this->logs = $logs ?? new WorkoutLog();
    }

    // ------------------------------------------------------------------
    // Reads
    // ------------------------------------------------------------------

    /** The assignment row (with member name/email), or an exception if not this instructor's client. */
    public function requireClient(int $instructorId, int $memberId): array
    {
        $client = $this->clients->findForInstructor($instructorId, $memberId);
        if (!$client) {
            throw new InvalidArgumentException('That member is not one of your clients.');
        }
        return $client;
    }

    /**
     * Everything the plan editor needs. The editor opens the draft if there is
     * one (unpublished changes), otherwise the published plan, otherwise a blank plan.
     */
    public function getEditorData(int $instructorId, int $memberId): array
    {
        $client = $this->requireClient($instructorId, $memberId);

        $published = $this->plans->findForMember($memberId, 'published') ?: null;
        $draft = $this->plans->findForMember($memberId, 'draft') ?: null;
        $plan = $draft ?? $published;

        $days = $plan ? $this->plans->getDaysWithExercises((int) $plan['id']) : $this->emptyWeek();
        $previous = $this->plans->findPrevious($memberId, $plan ? (int) $plan['id'] : 0);

        return [
            'client'      => $client,
            'plan'        => $plan ?? $this->blankPlan(),
            'isEdit'      => $plan !== null,
            'hasDraft'    => $draft !== null,
            'isPublished' => $published !== null,
            'hasPrevious' => (bool) $previous,
            'days'        => $days,
            'adherence'   => $published ? $this->adherence($memberId, $published) : null,
            'lastLogDate' => $this->logs->lastLogDate($memberId),
            'library'     => $this->exercises->allActive(),
        ];
    }

    /** Days of the plan before the one being edited, for "Copy last week". */
    public function getPreviousWeek(int $instructorId, int $memberId): array
    {
        $this->requireClient($instructorId, $memberId);

        $current = $this->plans->findForMember($memberId, 'draft') ?: $this->plans->findForMember($memberId, 'published');
        $previous = $this->plans->findPrevious($memberId, $current ? (int) $current['id'] : 0);

        if (!$previous) {
            throw new InvalidArgumentException('There is no earlier plan to copy from.');
        }

        return [
            'name' => $previous['name'],
            'days' => $this->plans->getDaysWithExercises((int) $previous['id']),
        ];
    }

    /**
     * Percentage of scheduled exercises the member ticked off, from the later of
     * (plan start, publish date, 30 days ago) up to yesterday. Null when that
     * window is empty or nothing was scheduled — i.e. too early to judge.
     */
    public function adherence(int $memberId, array $publishedPlan, ?array $days = null): ?int
    {
        $days ??= $this->plans->getDaysWithExercises((int) $publishedPlan['id']);

        $yesterday = new DateTimeImmutable('yesterday');
        $from = max(
            new DateTimeImmutable($publishedPlan['start_date']),
            new DateTimeImmutable(substr((string) ($publishedPlan['published_at'] ?? $publishedPlan['created_at']), 0, 10)),
            $yesterday->modify('-' . (self::ADHERENCE_WINDOW_DAYS - 1) . ' days')
        );

        if ($from > $yesterday) {
            return null;
        }

        $scheduled = 0;
        for ($date = $from; $date <= $yesterday; $date = $date->modify('+1 day')) {
            $scheduled += count($days[(int) $date->format('N')]['exercises']);
        }

        if ($scheduled === 0) {
            return null;
        }

        $done = $this->logs->countForPlanBetween(
            $memberId,
            (int) $publishedPlan['id'],
            $from->format('Y-m-d'),
            $yesterday->format('Y-m-d')
        );

        return min(100, (int) round($done / $scheduled * 100));
    }

    // ------------------------------------------------------------------
    // Writes
    // ------------------------------------------------------------------

    /**
     * Validates the submitted editor form and saves it as the member's draft,
     * publishing it when $publish is true. $daysJson is the weekly plan the
     * editor serialises: [{day, focus, note, exercises: [{exercise_id, sets, reps, load, rest, superset}]}].
     */
    public function save(int $instructorId, int $memberId, array $input, string $daysJson, bool $publish): int
    {
        $this->requireClient($instructorId, $memberId);

        $details = $this->validateDetails($input);
        $days = $this->validateDays($daysJson);

        if ($publish) {
            $total = array_sum(array_map(fn($day) => count($day['exercises']), $days));
            if ($total === 0) {
                throw new InvalidArgumentException('Add at least one exercise before publishing the plan.');
            }
        }

        return $this->plans->saveForMember($memberId, $instructorId, $details, $days, $publish);
    }

    public function delete(int $instructorId, int $memberId): void
    {
        $this->requireClient($instructorId, $memberId);

        $hasPlan = $this->plans->findForMember($memberId, 'draft') || $this->plans->findForMember($memberId, 'published');
        if (!$hasPlan) {
            throw new InvalidArgumentException('This client has no workout plan to delete.');
        }

        $this->plans->removeForMember($memberId);
    }

    // ------------------------------------------------------------------
    // Validation
    // ------------------------------------------------------------------

    private function validateDetails(array $input): array
    {
        $name = trim((string) ($input['name'] ?? ''));
        if ($name === '') {
            throw new InvalidArgumentException('Give the plan a name.');
        }
        if (mb_strlen($name) > 100) {
            throw new InvalidArgumentException('Plan name must be 100 characters or fewer.');
        }

        $goal = (string) ($input['goal'] ?? '');
        if (!in_array($goal, self::GOALS, true)) {
            throw new InvalidArgumentException('Choose a goal from the list.');
        }

        $duration = (int) ($input['duration_weeks'] ?? 0);
        if (!in_array($duration, self::DURATIONS, true)) {
            throw new InvalidArgumentException('Choose a duration from the list.');
        }

        $startDate = (string) ($input['start_date'] ?? '');
        $parsed = DateTimeImmutable::createFromFormat('!Y-m-d', $startDate);
        if (!$parsed || $parsed->format('Y-m-d') !== $startDate) {
            throw new InvalidArgumentException('Enter a valid start date.');
        }

        $sessions = (int) ($input['sessions_per_week'] ?? 0);
        if ($sessions < 1 || $sessions > 7) {
            throw new InvalidArgumentException('Sessions per week must be between 1 and 7.');
        }

        $difficulty = (string) ($input['difficulty'] ?? '');
        if (!array_key_exists($difficulty, self::DIFFICULTIES)) {
            throw new InvalidArgumentException('Choose a difficulty.');
        }

        return [
            'name'              => $name,
            'goal'              => $goal,
            'duration_weeks'    => $duration,
            'start_date'        => $startDate,
            'sessions_per_week' => $sessions,
            'difficulty'        => $difficulty,
        ];
    }

    /** Returns [day_of_week => ['focus', 'note', 'exercises' => [...]]] for all 7 days. */
    private function validateDays(string $daysJson): array
    {
        $submitted = json_decode($daysJson, true);
        if (!is_array($submitted)) {
            throw new InvalidArgumentException('The weekly plan could not be read. Reload the page and try again.');
        }

        $days = $this->emptyWeek();
        $exerciseIds = [];

        foreach ($submitted as $day) {
            $dow = (int) ($day['day'] ?? 0);
            if (!isset(self::DAYS[$dow])) {
                throw new InvalidArgumentException('The weekly plan contains an unknown day.');
            }
            $dayName = self::DAYS[$dow]['long'];

            $focus = trim((string) ($day['focus'] ?? ''));
            if (mb_strlen($focus) > 50) {
                throw new InvalidArgumentException("{$dayName}: focus must be 50 characters or fewer.");
            }

            $note = trim((string) ($day['note'] ?? ''));
            if (mb_strlen($note) > 500) {
                throw new InvalidArgumentException("{$dayName}: the note must be 500 characters or fewer.");
            }

            $exercises = is_array($day['exercises'] ?? null) ? $day['exercises'] : [];
            if (count($exercises) > self::MAX_EXERCISES_PER_DAY) {
                throw new InvalidArgumentException("{$dayName}: a day can have at most " . self::MAX_EXERCISES_PER_DAY . ' exercises.');
            }

            $clean = [];
            foreach ($exercises as $exercise) {
                $sets = (int) ($exercise['sets'] ?? 0);
                $reps = (int) ($exercise['reps'] ?? 0);
                $rest = (int) ($exercise['rest'] ?? -1);
                $load = trim((string) ($exercise['load'] ?? ''));
                $superset = $exercise['superset'] ?? null;

                if ($sets < 1 || $sets > 20) {
                    throw new InvalidArgumentException("{$dayName}: sets must be between 1 and 20.");
                }
                if ($reps < 1 || $reps > 500) {
                    throw new InvalidArgumentException("{$dayName}: reps must be between 1 and 500.");
                }
                if ($rest < 0 || $rest > 600) {
                    throw new InvalidArgumentException("{$dayName}: rest must be between 0 and 600 seconds.");
                }
                if (mb_strlen($load) > 20) {
                    throw new InvalidArgumentException("{$dayName}: load must be 20 characters or fewer.");
                }

                $exerciseIds[] = (int) ($exercise['exercise_id'] ?? 0);
                $clean[] = [
                    'exercise_id' => (int) ($exercise['exercise_id'] ?? 0),
                    'sets'        => $sets,
                    'reps'        => $reps,
                    'load'        => $load === '' ? null : $load,
                    'rest'        => $rest,
                    'superset'    => $superset === null || $superset === '' ? null : max(1, min(255, (int) $superset)),
                ];
            }

            $days[$dow] = [
                'focus'     => $focus === '' ? null : $focus,
                'note'      => $note === '' ? null : $note,
                'exercises' => $this->dropLoneSupersets($clean),
            ];
        }

        $known = $this->exercises->findActiveByIds($exerciseIds);
        foreach ($exerciseIds as $id) {
            if (!isset($known[$id])) {
                throw new InvalidArgumentException('One of the exercises is no longer in the library. Remove it and try again.');
            }
        }

        return $days;
    }

    /** A superset needs at least two exercises; a group left with one member is cleared. */
    private function dropLoneSupersets(array $exercises): array
    {
        $sizes = array_count_values(array_filter(array_column($exercises, 'superset'), fn($g) => $g !== null));

        foreach ($exercises as &$exercise) {
            if ($exercise['superset'] !== null && ($sizes[$exercise['superset']] ?? 0) < 2) {
                $exercise['superset'] = null;
            }
        }
        return $exercises;
    }

    private function emptyWeek(): array
    {
        $days = [];
        foreach (array_keys(self::DAYS) as $dow) {
            $days[$dow] = ['focus' => null, 'note' => null, 'exercises' => []];
        }
        return $days;
    }

    private function blankPlan(): array
    {
        return [
            'id'                => null,
            'name'              => '',
            'goal'              => self::GOALS[0],
            'duration_weeks'    => 8,
            'start_date'        => (new DateTimeImmutable('next monday'))->format('Y-m-d'),
            'sessions_per_week' => 3,
            'difficulty'        => 'beginner',
            'status'            => null,
        ];
    }
}
