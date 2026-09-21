<?php

require_once __DIR__ . '/../core/Model.php';

class Message extends Model
{
    /**
     * Get all conversations for a given user (instructor or client),
     * including latest message snippet, timestamp, and unread count.
     */
    public function getConversations(int $instructorId): array
    {
        $sql = "
            SELECT 
                u.id AS client_id,
                u.first_name,
                u.last_name,
                u.email,
                u.phone_number,
                COALESCE(latest.message_text, 'No messages yet') AS last_message,
                latest.created_at AS last_message_time,
                COALESCE(unread.cnt, 0) AS unread_count
            FROM users u
            LEFT JOIN roles r ON u.role_id = r.id
            -- Subquery for the most recent message with each client
            LEFT JOIN (
                SELECT m.id, m.message_text, m.created_at,
                       IF(m.sender_id = :inst_latest, m.receiver_id, m.sender_id) AS partner_id
                FROM messages m
                WHERE m.id IN (
                    SELECT MAX(id)
                    FROM messages
                    WHERE sender_id = :inst_max1 OR receiver_id = :inst_max2
                    GROUP BY IF(sender_id = :inst_grp, receiver_id, sender_id)
                )
            ) latest ON u.id = latest.partner_id
            -- Subquery for counting unread messages in the conversation with each client
            LEFT JOIN (
                SELECT 
                    m.sender_id AS client_id, 
                    COUNT(*) AS cnt
                FROM messages m
                WHERE m.receiver_id = :inst_unread
                  AND m.is_read = 0
                GROUP BY m.sender_id
            ) unread ON u.id = unread.client_id
            WHERE u.id != :inst_user AND (u.role_id IS NULL OR LOWER(r.name) = 'client')
            ORDER BY (latest.created_at IS NULL), latest.created_at DESC, u.first_name ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':inst_latest' => $instructorId,
            ':inst_max1'   => $instructorId,
            ':inst_max2'   => $instructorId,
            ':inst_grp'    => $instructorId,
            ':inst_unread' => $instructorId,
            ':inst_user'   => $instructorId,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Get chat message history between two users in chronological order.
     */
    public function getChatHistory(int $user1, int $user2): array
    {
        $sql = "
            SELECT 
                m.id,
                m.sender_id,
                m.receiver_id,
                m.message_text,
                m.is_read,
                m.created_at,
                u.first_name AS sender_first_name,
                u.last_name AS sender_last_name
            FROM messages m
            JOIN users u ON u.id = m.sender_id
            WHERE (m.sender_id = :p1 AND m.receiver_id = :p2)
               OR (m.sender_id = :p3 AND m.receiver_id = :p4)
            ORDER BY m.created_at ASC, m.id ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':p1' => $user1,
            ':p2' => $user2,
            ':p3' => $user2,
            ':p4' => $user1,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * [CRUD - Create]: Insert a new message.
     */
    public function sendMessage(int $senderId, int $receiverId, string $messageText): array|false
    {
        $sql = "INSERT INTO messages (sender_id, receiver_id, message_text, is_read, created_at) 
                VALUES (:sender_id, :receiver_id, :message_text, 0, NOW())";

        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([
            ':sender_id'    => $senderId,
            ':receiver_id'  => $receiverId,
            ':message_text' => trim($messageText),
        ]);

        if ($success) {
            $id = (int)$this->db->lastInsertId();
            $stmt = $this->db->prepare("SELECT * FROM messages WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return false;
    }

    /**
     * [CRUD - Delete]: Delete a specific message.
     */
    public function deleteMessage(int $messageId, int $userId): bool
    {
        $sql = "DELETE FROM messages WHERE id = :id AND (sender_id = :user_id OR receiver_id = :user_id_2)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':id'        => $messageId,
            ':user_id'   => $userId,
            ':user_id_2' => $userId,
        ]);
        return $stmt->rowCount() > 0;
    }

    /**
     * [CRUD - Update]: Mark all incoming messages from sender as read.
     */
    public function markAsRead(int $user1, int $user2): bool
    {
        $sql = "UPDATE messages 
                SET is_read = 1 
                WHERE ((sender_id = :u1_a AND receiver_id = :u2_a) OR (sender_id = :u2_b AND receiver_id = :u1_b))
                  AND is_read = 0";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':u1_a' => $user1,
            ':u2_a' => $user2,
            ':u2_b' => $user2,
            ':u1_b' => $user1,
        ]);
    }

    /**
     * Get detailed client information for the profile view in Figma.
     */
    public function getClientProfile(int $clientId): ?array
    {
        $sql = "SELECT id, first_name, last_name, email, phone_number, created_at 
                FROM users 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $clientId]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$client) {
            return null;
        }

        // Add rich client profile details matching Figma
        $mockDetails = [
            21 => [
                'fitness_goal'   => 'Endurance & Hypertrophy',
                'created_at'     => '2024, Jul 08',
                'next_session'   => 'Tomorrow, 2:00 PM',
                'last_session'   => '7 days ago',
                'total_sessions' => 695,
                'growth_rate'    => '30.1%',
                'growth_delta'   => '+5.03%'
            ],
            22 => [
                'fitness_goal'   => 'Weight Loss & Tone',
                'created_at'     => '2024, Aug 12',
                'next_session'   => 'Wednesday, 4:00 PM',
                'last_session'   => '2 days ago',
                'total_sessions' => 142,
                'growth_rate'    => '24.5%',
                'growth_delta'   => '+3.20%'
            ],
            23 => [
                'fitness_goal'   => 'Strength & Conditioning',
                'created_at'     => '2024, Aug 25',
                'next_session'   => 'Thursday, 10:00 AM',
                'last_session'   => '1 day ago',
                'total_sessions' => 88,
                'growth_rate'    => '18.2%',
                'growth_delta'   => '+2.40%'
            ],
            24 => [
                'fitness_goal'   => 'Cardio & Flexibility',
                'created_at'     => '2024, Sep 02',
                'next_session'   => 'Friday, 3:30 PM',
                'last_session'   => '3 days ago',
                'total_sessions' => 110,
                'growth_rate'    => '15.7%',
                'growth_delta'   => '+1.80%'
            ],
            25 => [
                'fitness_goal'   => 'Rehabilitation & Core',
                'created_at'     => '2024, Sep 10',
                'next_session'   => 'Next Monday, 9:00 AM',
                'last_session'   => '15 days ago',
                'total_sessions' => 54,
                'growth_rate'    => '12.0%',
                'growth_delta'   => '+0.95%'
            ]
        ];

        $details = $mockDetails[$clientId] ?? [
            'fitness_goal'   => 'General Fitness',
            'created_at'     => '2024, Jul 08',
            'next_session'   => 'Upcoming',
            'last_session'   => 'Last week',
            'total_sessions' => 50,
            'growth_rate'    => '15.0%',
            'growth_delta'   => '+2.10%'
        ];

        return array_merge($client, $details);
    }
}
