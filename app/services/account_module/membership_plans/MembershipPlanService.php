<?php

class MembershipPlanService
{
    private MembershipPlan $model;

    public function __construct()
    {
        $this->model = new MembershipPlan();
    }

    public function list(?string $search, ?string $status): array
    {
        $summary = $this->model->getSummaryCounts();
        $summary['active_memberships'] = $this->model->countAllActiveMemberships();

        return [
            'plans' => $this->model->getAll($search, $status),
            'summary' => $summary,
        ];
    }

    public function details(int $planId): array|false
    {
        $plan = $this->model->findById($planId);
        if (!$plan) {
            return false;
        }

        $metrics = $this->model->getPlanMetrics($planId);

        return [
            'plan' => $plan,
            'metrics' => $metrics,
            'usage' => $metrics['supported'] ? $this->model->getPlanUsage($planId) : [],
        ];
    }

    public function create(array $input): array
    {
        $validation = $this->validate($input);
        if ($validation['errors']) {
            return ['success' => false, 'errors' => $validation['errors']];
        }

        $id = $this->model->create($validation['data']);
        return [
            'success' => $id !== false,
            'plan_id' => $id,
            'errors' => $id === false ? ['general' => 'Unable to create the membership plan.'] : [],
        ];
    }

    public function update(int $planId, array $input): array
    {
        if (!$this->model->findById($planId)) {
            return ['success' => false, 'errors' => ['general' => 'Membership plan not found.']];
        }

        $validation = $this->validate($input);
        if ($validation['errors']) {
            return ['success' => false, 'errors' => $validation['errors']];
        }

        $ok = $this->model->update($planId, $validation['data']);
        return [
            'success' => $ok,
            'errors' => $ok ? [] : ['general' => 'Unable to update the membership plan.'],
        ];
    }

    public function deactivate(int $planId): bool
    {
        $plan = $this->model->findById($planId);
        if (!$plan) {
            return false;
        }
        if (strtoupper($plan['status']) === 'INACTIVE') {
            return true;
        }
        return $this->model->deactivate($planId);
    }

    private function validate(array $input): array
    {
        $errors = [];

        $planName = trim($input['plan_name'] ?? '');
        $description = trim($input['description'] ?? '');
        $duration = filter_var($input['duration'] ?? null, FILTER_VALIDATE_INT);
        $durationUnit = strtolower(trim($input['duration_unit'] ?? 'days'));
        $price = filter_var($input['price'] ?? null, FILTER_VALIDATE_FLOAT);
        $ptSessions = filter_var($input['included_pt_sessions'] ?? 0, FILTER_VALIDATE_INT);
        $status = strtoupper(trim($input['status'] ?? 'ACTIVE'));

        if ($planName === '') {
            $errors['plan_name'] = 'Plan name is required.';
        } elseif (mb_strlen($planName) > 100) {
            $errors['plan_name'] = 'Plan name must be 100 characters or less.';
        }

        if ($duration === false || $duration <= 0) {
            $errors['duration'] = 'Duration must be greater than 0.';
        }

        if (!in_array($durationUnit, ['days', 'months'], true)) {
            $errors['duration_unit'] = 'Choose Days or Months.';
        }

        if ($price === false || $price <= 0) {
            $errors['price'] = 'Price must be greater than 0.';
        }

        if ($ptSessions === false || $ptSessions < 0) {
            $errors['included_pt_sessions'] = 'PT sessions must be 0 or more.';
        }

        if (!in_array($status, ['ACTIVE', 'INACTIVE'], true)) {
            $errors['status'] = 'Invalid status.';
        }

        $durationDays = ($durationUnit === 'months' && $duration !== false)
            ? $duration * 30
            : (int) $duration;

        return [
            'errors' => $errors,
            'data' => [
                'plan_name' => $planName,
                'description' => $description,
                'duration_days' => $durationDays,
                'price' => (float) $price,
                'included_pt_sessions' => (int) $ptSessions,
                'status' => $status,
            ],
        ];
    }
}
