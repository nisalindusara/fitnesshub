<?php

/**
 * Manager: leave request tickets (planned / immediate) and their processing result.
 *   /portal/leave-requests              every request
 *   /portal/leave-requests/review?id=1  the ticket, until it's decided
 *   /portal/leave-requests/result?id=3  the outcome, once approved / rejected / cancelled
 */
class LeaveRequestController extends Controller
{
    // "Back to Leave Management" on the review and result screens
    private const LEAVE_MANAGEMENT_URL = '/portal/leave-requests';

    public function index(): void
    {
        $requests = (new LeaveRequest())->all();
        $tones = ['pending' => 'warning', 'approved' => 'success', 'rejected' => 'danger', 'cancelled' => 'neutral'];
        $pending = count(array_filter($requests, fn($r) => $r['status'] === 'pending'));

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Leave Requests',
            'subtitle'  => 'Planned holidays and immediate leave from instructors.',
            'isSample'  => false,
            'actions'   => [
                ['label' => 'Staff availability', 'href' => '/portal/staff-availability', 'permission' => 'manage_schedule'],
            ],
            'stats' => [
                ['label' => 'Waiting for a decision', 'value' => $pending, 'alert' => $pending > 0],
                ['label' => 'All requests', 'value' => count($requests)],
            ],
            'table' => [
                'columns' => ['Instructor', 'Type', 'Dates', 'Submitted', 'Status'],
                'rows'    => array_map(fn($r) => [
                    ['text' => $r['first_name'] . ' ' . $r['last_name'], 'sub' => $r['reason']],
                    LeaveRequestService::TYPES[$r['leave_type']] ?? ucfirst($r['leave_type']),
                    date('M j', strtotime($r['start_date'])) . ($r['end_date'] !== $r['start_date'] ? ' – ' . date('M j, Y', strtotime($r['end_date'])) : ', ' . date('Y', strtotime($r['start_date']))),
                    date('M j, g:i A', strtotime($r['submitted_at'])),
                    ['tag' => ucfirst($r['status']), 'tone' => $tones[$r['status']] ?? 'neutral'],
                ], $requests),
                'links' => array_map(fn($r) => '/portal/leave-requests/' . ($r['status'] === 'pending' ? 'review' : 'result') . '?id=' . (int) $r['id'], $requests),
                'empty' => 'No leave requests yet.',
            ],
        ]);
    }

    public function review(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $service = new LeaveRequestService();

        try {
            $data = $service->review($id);
        } catch (InvalidArgumentException $e) {
            (new ErrorController())->pageNotFoundError404();
            return;
        }

        // A decided request has nothing left to review
        if ($data['request']['status'] !== 'pending') {
            $this->redirect('/portal/leave-requests/result?id=' . $id);
        }

        $immediate = $data['request']['leave_type'] === 'immediate';
        $this->render('work_schedule_module/leave/' . ($immediate ? 'review_immediate' : 'review_planned'), 'staff-layout', $data + [
            'pageTitle'  => $immediate ? 'Immediate Leave' : 'Planned Holiday Request',
            'types'      => WorkScheduleService::TYPES,
            'leaveTypes' => LeaveRequestService::TYPES,
            'backUrl'    => self::LEAVE_MANAGEMENT_URL,
            'error'      => $_GET['error'] ?? null,
        ]);
    }

    public function result(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $service = new LeaveRequestService();

        try {
            $data = $service->result($id);
        } catch (InvalidArgumentException $e) {
            (new ErrorController())->pageNotFoundError404();
            return;
        }

        if ($data['request']['status'] === 'pending') {
            $this->redirect('/portal/leave-requests/review?id=' . $id);
        }

        $this->render('work_schedule_module/leave/result', 'staff-layout', $data + [
            'pageTitle'  => 'Leave Processing Result',
            'types'      => WorkScheduleService::TYPES,
            'leaveTypes' => LeaveRequestService::TYPES,
            'canCancel'  => $service->canCancel($data['request']),
            'backUrl'    => self::LEAVE_MANAGEMENT_URL,
            'error'      => $_GET['error'] ?? null,
        ]);
    }

    public function approve(): void
    {
        $this->decide(fn(LeaveRequestService $s, int $id, int $manager) => $s->approve($id, $manager), 'review');
    }

    public function reject(): void
    {
        $this->decide(fn(LeaveRequestService $s, int $id, int $manager) => $s->reject($id, $manager), 'review');
    }

    public function cancel(): void
    {
        $this->decide(fn(LeaveRequestService $s, int $id, int $manager) => $s->cancel($id, $manager), 'result');
    }

    /** Runs a decision, then shows the result — or goes back to $errorPage with the reason. */
    private function decide(callable $action, string $errorPage): void
    {
        $id = (int) ($_POST['id'] ?? 0);

        try {
            $action(new LeaveRequestService(), $id, (int) $_SESSION['user_id']);
        } catch (InvalidArgumentException $e) {
            $this->redirect("/portal/leave-requests/{$errorPage}?id={$id}&error=" . urlencode($e->getMessage()));
        }

        $this->redirect('/portal/leave-requests/result?id=' . $id);
    }
}
