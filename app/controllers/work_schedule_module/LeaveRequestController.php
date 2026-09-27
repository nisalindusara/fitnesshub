<?php

/**
 * Manager: leave request tickets (planned / immediate) and their processing result.
 * Not linked from the navigation yet — open them by URL:
 *   /leave-requests/review?id=1   the ticket, until it's decided
 *   /leave-requests/result?id=3   the outcome, once approved / rejected / cancelled
 */
class LeaveRequestController extends Controller
{
    // The Leave Management list isn't built yet; "Back to Leave Management" points here.
    private const LEAVE_MANAGEMENT_URL = '/leave-management';

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
            $this->redirect('/leave-requests/result?id=' . $id);
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
            $this->redirect('/leave-requests/review?id=' . $id);
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
            $this->redirect("/leave-requests/{$errorPage}?id={$id}&error=" . urlencode($e->getMessage()));
        }

        $this->redirect('/leave-requests/result?id=' . $id);
    }
}
