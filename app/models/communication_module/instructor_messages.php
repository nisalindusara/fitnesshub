<?php

class instructor_messages {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    /**
     * Sidebar list: contacts with conversation history or eligible members,
     * including last message preview, last timestamp, and unread count.
     */
    public function getConversations(int $userId): array {
        $sql = "SELECT
                    u.id,
                    CONCAT(u.first_name, ' ', u.last_name) AS name,
                    u.profile_image,
                    u.avatar_color,
                    (SELECT m.message FROM messages m
                      WHERE ((m.sender_id = u.id AND m.receiver_id = :uid1)
                         OR (m.sender_id = :uid2 AND m.receiver_id = u.id))
                        AND (m.deleted_at IS NULL)
                      ORDER BY m.created_at DESC, m.id DESC LIMIT 1)      AS last_message,
                    (SELECT m.created_at FROM messages m
                      WHERE ((m.sender_id = u.id AND m.receiver_id = :uid3)
                         OR (m.sender_id = :uid4 AND m.receiver_id = u.id))
                        AND (m.deleted_at IS NULL)
                      ORDER BY m.created_at DESC, m.id DESC LIMIT 1)      AS last_time,
                    (SELECT COUNT(*) FROM messages m
                      WHERE m.sender_id = u.id
                        AND m.receiver_id = :uid5
                        AND m.is_read = 0
                        AND (m.deleted_at IS NULL))                     AS unread_count
                FROM users u
                WHERE u.id != :uid6
                  AND EXISTS (
                    SELECT 1 FROM messages m
                    WHERE ((m.sender_id = u.id AND m.receiver_id = :uid7)
                       OR (m.sender_id = :uid8 AND m.receiver_id = u.id))
                      AND (m.deleted_at IS NULL)
                  )
                ORDER BY last_time DESC, u.id ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':uid1' => $userId, ':uid2' => $userId,
            ':uid3' => $userId, ':uid4' => $userId,
            ':uid5' => $userId, ':uid6' => $userId,
            ':uid7' => $userId, ':uid8' => $userId,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Full message thread between logged-in user and a specific contact.
     */
    public function getMessages(int $userId, int $contactId): array {
        $sql = "SELECT m.*,
                       CONCAT(u.first_name, ' ', u.last_name) AS sender_name,
                       u.avatar_color,
                       u.profile_image
                FROM messages m
                JOIN users u ON m.sender_id = u.id
                WHERE (((m.sender_id = :uid  AND m.receiver_id = :cid)
                    OR (m.sender_id = :cid2 AND m.receiver_id = :uid2)))
                  AND (m.deleted_at IS NULL)
                ORDER BY m.created_at ASC, m.id ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':uid'  => $userId, ':cid'  => $contactId,
            ':cid2' => $contactId, ':uid2' => $userId,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * UPDATE: Mark all unread messages sent by $contactId to $userId as read.
     */
    public function markAsRead(int $userId, int $contactId): int {
        $sql = "UPDATE messages
                SET is_read = 1, updated_at = NOW()
                WHERE receiver_id = :uid AND sender_id = :cid AND is_read = 0 AND (deleted_at IS NULL)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':uid' => $userId, ':cid' => $contactId]);
        return $stmt->rowCount();
    }

    /**
     * CREATE: Insert a new message and return the newly created row.
     */
    public function create(int $senderId, int $receiverId, string $text): array {
        $sql = "INSERT INTO messages (sender_id, receiver_id, message, is_read, created_at)
                VALUES (:sender, :receiver, :msg, 0, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':sender'   => $senderId,
            ':receiver' => $receiverId,
            ':msg'      => $text,
        ]);
        $id = (int)$this->db->lastInsertId();
        return $this->getById($id) ?: [];
    }

    /**
     * Get a single message by ID.
     */
    public function getById(int $id): array|false {
        $sql = "SELECT m.*,
                       CONCAT(u.first_name, ' ', u.last_name) AS sender_name,
                       u.avatar_color,
                       u.profile_image
                FROM messages m
                JOIN users u ON m.sender_id = u.id
                WHERE m.id = :id AND (m.deleted_at IS NULL)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * DELETE: Delete a message sent by the user themselves.
     */
    public function delete(int $messageId, int $userId): bool {
        $stmt = $this->db->prepare("DELETE FROM messages WHERE id = :id AND sender_id = :uid");
        $stmt->execute([':id' => $messageId, ':uid' => $userId]);
        return $stmt->rowCount() > 0;
    }
}

// Backwards compatibility alias for code referencing Message
if (!class_exists('Message', false)) {
    class_alias('instructor_messages', 'Message');
}