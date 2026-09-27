<?php

class MyClientsController extends Controller
{
    private const PER_PAGE = 10;

    public function showMyClientsScreen(): void
    {
        $service = new ClientRosterService();
        $roster = $service->buildRoster((int) $_SESSION['user_id']);

        [$search, $filter, $sort] = $this->listParams();
        $list = $service->query($roster, $search, $filter, $sort);

        $pages = max(1, (int) ceil(count($list) / self::PER_PAGE));
        $page = min($pages, max(1, (int) ($_GET['page'] ?? 1)));

        $this->render('instructor/my-clients', 'staff-layout', [
            'pageTitle'    => 'My Clients',
            'stats'        => $service->stats($roster),
            'filterCounts' => $service->filterCounts($roster),
            'clients'      => array_slice($list, ($page - 1) * self::PER_PAGE, self::PER_PAGE),
            'matchCount'   => count($list),
            'totalClients' => count($roster),
            'search'       => $search,
            'filter'       => $filter,
            'sort'         => $sort,
            'page'         => $page,
            'pages'        => $pages,
            'flash'        => $this->flash(),
        ]);
    }

    /** CSV of the list as currently searched / filtered / sorted. */
    public function exportClients(): void
    {
        $service = new ClientRosterService();
        [$search, $filter, $sort] = $this->listParams();
        $list = $service->query($service->buildRoster((int) $_SESSION['user_id']), $search, $filter, $sort);

        $statusLabels = ['active' => 'Active', 'needs_review' => 'Needs review', 'paused' => 'Paused', 'new' => 'New'];

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="my-clients-' . date('Y-m-d') . '.csv"');

        $out = fopen('php://output', 'w');
        fputcsv($out, ['Name', 'Email', 'Type', 'Program', 'Program status', 'Adherence (%)', 'Next session', 'Status']);
        foreach ($list as $client) {
            fputcsv($out, [
                $client['name'],
                $client['email'],
                $client['type_label'],
                $client['program'],
                $client['program_meta'],
                $client['adherence'] ?? '',
                $client['next_session'] . ' (' . $client['next_session_meta'] . ')',
                $statusLabels[$client['status']],
            ]);
        }
        fclose($out);
    }

    /** JSON search for the Add client dialog. */
    public function searchMembers(): void
    {
        $results = (new ClientRosterService())->searchAssignableMembers((int) $_SESSION['user_id'], (string) ($_GET['q'] ?? ''));

        header('Content-Type: application/json');
        echo json_encode(array_map(fn($row) => [
            'id'    => (int) $row['id'],
            'name'  => trim($row['first_name'] . ' ' . $row['last_name']),
            'email' => $row['email'],
        ], $results));
    }

    /** Add client → the new client has no plan yet, so go straight to creating one. */
    public function addClient(): void
    {
        $memberId = (int) ($_POST['member_id'] ?? 0);

        try {
            (new ClientRosterService())->addClient((int) $_SESSION['user_id'], $memberId, (string) ($_POST['client_type'] ?? ''));
        } catch (InvalidArgumentException $e) {
            $this->redirect('/my-clients?error=' . urlencode($e->getMessage()));
        }

        $this->redirect('/my-clients/client?member=' . $memberId . '&added=1');
    }

    // ------------------------------------------------------------------

    private function listParams(): array
    {
        $filter = (string) ($_GET['filter'] ?? 'all');
        $sort = (string) ($_GET['sort'] ?? 'next');

        return [
            trim((string) ($_GET['q'] ?? '')),
            array_key_exists($filter, ClientRosterService::FILTERS) ? $filter : 'all',
            array_key_exists($sort, ClientRosterService::SORTS) ? $sort : 'next',
        ];
    }

    private function flash(): ?array
    {
        if (isset($_GET['error'])) {
            return ['type' => 'error', 'message' => (string) $_GET['error']];
        }
        if (isset($_GET['deleted'])) {
            return ['type' => 'success', 'message' => 'Workout plan deleted. The client can no longer see it.'];
        }
        return null;
    }
}
