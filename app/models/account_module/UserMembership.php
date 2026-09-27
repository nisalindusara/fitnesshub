<?php

class UserMembership extends Model
{
    /**
     * The member's most recent membership row, trusted as-is per the
     * status column — this is NOT recomputed from end_date vs today.
     * That responsibility belongs elsewhere in the system.
     */
    public function findCurrentByUserId(int $userId): array|false
    {
        $query = "SELECT um.status, um.end_date, mp.plan_name
                  FROM user_memberships um
                  JOIN membership_plans mp ON mp.plan_id = um.plan_id
                  WHERE um.user_id = :user_id
                  ORDER BY um.created_at DESC
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
