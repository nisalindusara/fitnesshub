<?php

class MembershipPlan extends Model
{
    private string $table = 'membership_plans';

    public function getAll(?string $search = null, ?string $status = null): array
    {
        $sql = "SELECT plan_id, plan_name, description, duration_days, price,
                       included_pt_sessions, status, created_at
                FROM {$this->table}
                WHERE 1 = 1";
        $params = [];

        if ($search !== null && trim($search) !== '') {
            $sql .= " AND (plan_name LIKE :search OR description LIKE :search)";
            $params[':search'] = '%' . trim($search) . '%';
        }

        $normalizedStatus = strtoupper(trim((string) $status));
        if (in_array($normalizedStatus, ['ACTIVE', 'INACTIVE'], true)) {
            $sql .= " AND status = :status";
            $params[':status'] = $normalizedStatus;
        }

        $sql .= " ORDER BY plan_id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $planId): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT plan_id, plan_name, description, duration_days, price,
                    included_pt_sessions, status, created_at
             FROM {$this->table}
             WHERE plan_id = :plan_id
             LIMIT 1"
        );
        $stmt->execute([':plan_id' => $planId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): int|false
    {
        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table}
                (plan_name, description, duration_days, price, included_pt_sessions, status)
             VALUES
                (:plan_name, :description, :duration_days, :price, :included_pt_sessions, :status)"
        );

        $ok = $stmt->execute([
            ':plan_name' => $data['plan_name'],
            ':description' => $data['description'],
            ':duration_days' => $data['duration_days'],
            ':price' => $data['price'],
            ':included_pt_sessions' => $data['included_pt_sessions'],
            ':status' => $data['status'],
        ]);

        return $ok ? (int) $this->db->lastInsertId() : false;
    }

    public function update(int $planId, array $data): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE {$this->table}
             SET plan_name = :plan_name,
                 description = :description,
                 duration_days = :duration_days,
                 price = :price,
                 included_pt_sessions = :included_pt_sessions,
                 status = :status
             WHERE plan_id = :plan_id"
        );

        return $stmt->execute([
            ':plan_id' => $planId,
            ':plan_name' => $data['plan_name'],
            ':description' => $data['description'],
            ':duration_days' => $data['duration_days'],
            ':price' => $data['price'],
            ':included_pt_sessions' => $data['included_pt_sessions'],
            ':status' => $data['status'],
        ]);
    }

    public function deactivate(int $planId): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE {$this->table}
             SET status = 'INACTIVE'
             WHERE plan_id = :plan_id"
        );
        return $stmt->execute([':plan_id' => $planId]);
    }

    public function getSummaryCounts(): array
    {
        $stmt = $this->db->query(
            "SELECT
                COUNT(*) AS total_plans,
                SUM(CASE WHEN status = 'ACTIVE' THEN 1 ELSE 0 END) AS active_plans,
                SUM(CASE WHEN status = 'INACTIVE' THEN 1 ELSE 0 END) AS inactive_plans
             FROM {$this->table}"
        );
        $row = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];

        return [
            'total_plans' => (int) ($row['total_plans'] ?? 0),
            'active_plans' => (int) ($row['active_plans'] ?? 0),
            'inactive_plans' => (int) ($row['inactive_plans'] ?? 0),
        ];
    }

    public function membershipUsageSupported(): bool
    {
        $required = ['membership_id', 'user_id', 'plan_id', 'start_date', 'end_date', 'status'];

        $stmt = $this->db->prepare(
            "SELECT COLUMN_NAME
             FROM information_schema.COLUMNS
             WHERE TABLE_SCHEMA = DATABASE()
               AND TABLE_NAME = 'memberships'"
        );
        $stmt->execute();
        $columns = array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'COLUMN_NAME');

        foreach ($required as $column) {
            if (!in_array($column, $columns, true)) {
                return false;
            }
        }
        return true;
    }

    public function countAllActiveMemberships(): ?int
    {
        if (!$this->membershipUsageSupported()) {
            return null;
        }
        $stmt = $this->db->query("SELECT COUNT(*) FROM memberships WHERE UPPER(status) = 'ACTIVE'");
        return (int) $stmt->fetchColumn();
    }

    public function getPlanMetrics(int $planId): array
    {
        if (!$this->membershipUsageSupported()) {
            return ['supported' => false, 'active_members' => null, 'total_purchases' => null];
        }

        $active = $this->db->prepare(
            "SELECT COUNT(*) FROM memberships
             WHERE plan_id = :plan_id AND UPPER(status) = 'ACTIVE'"
        );
        $active->execute([':plan_id' => $planId]);

        $total = $this->db->prepare("SELECT COUNT(*) FROM memberships WHERE plan_id = :plan_id");
        $total->execute([':plan_id' => $planId]);

        return [
            'supported' => true,
            'active_members' => (int) $active->fetchColumn(),
            'total_purchases' => (int) $total->fetchColumn(),
        ];
    }

    public function getPlanUsage(int $planId): array
    {
        if (!$this->membershipUsageSupported()) {
            return [];
        }

        $stmt = $this->db->prepare(
            "SELECT m.membership_id, m.user_id, m.start_date, m.end_date, m.status,
                    CONCAT(u.first_name, ' ', u.last_name) AS member_name
             FROM memberships m
             LEFT JOIN users u ON u.id = m.user_id
             WHERE m.plan_id = :plan_id
             ORDER BY m.start_date DESC
             LIMIT 10"
        );
        $stmt->execute([':plan_id' => $planId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
