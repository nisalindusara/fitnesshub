<?php

class MembershipPlanController extends Controller
{
    private MembershipPlanService $service;

    public function __construct()
    {
        $this->service = new MembershipPlanService();
    }

    public function index(): void
    {
        $search = trim($_GET['search'] ?? '');
        $status = strtoupper(trim($_GET['status'] ?? ''));
        $data = $this->service->list($search, $status);

        $this->render('account_module/membership_plans/index', 'staff-layout', [
            'pageTitle' => 'Membership Plans',
            'plans' => $data['plans'],
            'summary' => $data['summary'],
            'search' => $search,
            'statusFilter' => $status,
            'flash' => $this->pullFlash(),
        ]);
    }

    public function create(): void
    {
        $this->render('account_module/membership_plans/create', 'staff-layout', [
            'pageTitle' => 'Add Membership Plan',
            'errors' => [],
            'old' => [
                'duration' => 30,
                'duration_unit' => 'days',
                'included_pt_sessions' => 0,
                'status' => 'ACTIVE',
            ],
        ]);
    }

    public function store(): void
    {
        $result = $this->service->create($_POST);

        if ($result['success']) {
            $_SESSION['flash_success'] = 'Membership plan created successfully.';
            $this->redirect('/membership-plans/show?id=' . (int) $result['plan_id']);
        }

        $this->render('account_module/membership_plans/create', 'staff-layout', [
            'pageTitle' => 'Add Membership Plan',
            'errors' => $result['errors'],
            'old' => $_POST,
        ]);
    }

    public function show(): void
    {
        $planId = (int) ($_GET['id'] ?? 0);
        $details = $this->service->details($planId);

        if (!$details) {
            $_SESSION['flash_error'] = 'Membership plan not found.';
            $this->redirect('/membership-plans');
        }

        $this->render('account_module/membership_plans/show', 'staff-layout', [
            'pageTitle' => $details['plan']['plan_name'] . ' Membership',
            'plan' => $details['plan'],
            'metrics' => $details['metrics'],
            'usage' => $details['usage'],
            'flash' => $this->pullFlash(),
        ]);
    }

    public function edit(): void
    {
        $planId = (int) ($_GET['id'] ?? 0);
        $details = $this->service->details($planId);

        if (!$details) {
            $_SESSION['flash_error'] = 'Membership plan not found.';
            $this->redirect('/membership-plans');
        }

        $plan = $details['plan'];
        $old = [
            'plan_id' => $plan['plan_id'],
            'plan_name' => $plan['plan_name'],
            'description' => $plan['description'],
            'duration' => $plan['duration_days'],
            'duration_unit' => 'days',
            'price' => $plan['price'],
            'included_pt_sessions' => $plan['included_pt_sessions'],
            'status' => strtoupper($plan['status']),
        ];

        $this->render('account_module/membership_plans/edit', 'staff-layout', [
            'pageTitle' => 'Edit Membership Plan',
            'errors' => [],
            'old' => $old,
        ]);
    }

    public function update(): void
    {
        $planId = (int) ($_POST['plan_id'] ?? 0);
        $result = $this->service->update($planId, $_POST);

        if ($result['success']) {
            $_SESSION['flash_success'] = 'Membership plan updated successfully.';
            $this->redirect('/membership-plans/show?id=' . $planId);
        }

        $old = $_POST;
        $old['plan_id'] = $planId;

        $this->render('account_module/membership_plans/edit', 'staff-layout', [
            'pageTitle' => 'Edit Membership Plan',
            'errors' => $result['errors'],
            'old' => $old,
        ]);
    }

    public function deactivate(): void
    {
        $planId = (int) ($_POST['plan_id'] ?? 0);

        if ($this->service->deactivate($planId)) {
            $_SESSION['flash_success'] = 'Membership plan deactivated successfully.';
            $this->redirect('/membership-plans/show?id=' . $planId);
        }

        $_SESSION['flash_error'] = 'Unable to deactivate the membership plan.';
        $this->redirect('/membership-plans');
    }

    private function pullFlash(): ?array
    {
        if (isset($_SESSION['flash_success'])) {
            $message = $_SESSION['flash_success'];
            unset($_SESSION['flash_success']);
            return ['type' => 'success', 'message' => $message];
        }

        if (isset($_SESSION['flash_error'])) {
            $message = $_SESSION['flash_error'];
            unset($_SESSION['flash_error']);
            return ['type' => 'error', 'message' => $message];
        }

        return null;
    }
}
