<?php

/**
 * One-to-one chat messages between users (instructor <-> member).
 * Deleting a message is a soft delete: `deleted_at` is set and every read
 * below ignores those rows.
 */
class Message extends Model
{
    private const MESSAGE_COLUMNS = "m.id, m.sender_id, m.receiver_id, m.message, m.is_read,
                                     m.created_at, m.updated_at,
                                     CONCAT(u.first_name, ' ', u.last_name) AS sender_name,
                                     u.profile_image";

    /**
     * Sidebar list for a user: everyone they already have a thread with, plus
     * (for an instructor) every assigned client so a new conversation can be
     * started. Each row carries the last message preview and the unread count.
     */
    public function conversations(int $userId): array
    {
        $query = "SELECT u.id,
                         CONCAT(u.first_name, ' ', u.last_name) AS name,
                         u.profile_image,
                         lm.message    AS last_message,
                         lm.sender_id  AS last_sender_id,
                         lm.created_at AS last_time,
                         COALESCE(unread.total, 0) AS unread_count
                  FROM users u
                  LEFT JOIN messages lm ON lm.id = (
                      SELECT m.id FROM messages m
                      WHERE m.deleted_at IS NULL
                        AND ((m.sender_id = u.id AND m.receiver_id = :uid1)
                          OR (m.sender_id = :uid2 AND m.receiver_id = u.id))
                      ORDER BY m.created_at DESC, m.id DESC
                      LIMIT 1
                  )
                  LEFT JOIN (
                      SELECT sender_id, COUNT(*) AS total
                      FROM messages
                      WHERE receiver_id = :uid3 AND is_read = 0 AND deleted_at IS NULL
                      GROUP BY sender_id
                  ) unread ON unread.sender_id = u.id
                  WHERE u.id <> :uid4
                    AND (lm.id IS NOT NULL
                         OR EXISTS (SELECT 1 FROM instructor_clients ic
                                    WHERE ic.instructor_id = :uid5 AND ic.member_id = u.id))
                  ORDER BY lm.created_at IS NULL, lm.created_at DESC, lm.id DESC, u.first_name, u.last_name";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':uid1' => $userId, ':uid2' => $userId, ':uid3' => $userId,
            ':uid4' => $userId, ':uid5' => $userId,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** True if $userId may message $contactId: an assigned client, or someone they already have a thread with. */
    public function canMessage(int $userId, int $contactId): bool
    {
        if ($userId === $contactId) {
            return false;
        }

        $query = "SELECT 1 FROM users u
                  WHERE u.id = :contact
                    AND (EXISTS (SELECT 1 FROM instructor_clients ic
                                 WHERE ic.instructor_id = :uid1 AND ic.member_id = u.id)
                         OR EXISTS (SELECT 1 FROM messages m
                                    WHERE (m.sender_id = :uid2 AND m.receiver_id = u.id)
                                       OR (m.sender_id = u.id AND m.receiver_id = :uid3)))
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':contact' => $contactId, ':uid1' => $userId, ':uid2' => $userId, ':uid3' => $userId]);

        return (bool) $stmt->fetchColumn();
    }

    /** Full thread between the user and one contact, oldest first. */
    public function thread(int $userId, int $contactId): array
    {
        $query = "SELECT " . self::MESSAGE_COLUMNS . "
                  FROM messages m
                  JOIN users u ON u.id = m.sender_id
                  WHERE m.deleted_at IS NULL
                    AND ((m.sender_id = :uid1 AND m.receiver_id = :cid1)
                      OR (m.sender_id = :cid2 AND m.receiver_id = :uid2))
                  ORDER BY m.created_at ASC, m.id ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':uid1' => $userId, ':cid1' => $contactId,
            ':cid2' => $contactId, ':uid2' => $userId,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $query = "SELECT " . self::MESSAGE_COLUMNS . "
                  FROM messages m
                  JOIN users u ON u.id = m.sender_id
                  WHERE m.id = :id AND m.deleted_at IS NULL";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(int $senderId, int $receiverId, string $text): ?array
    {
        $query = "INSERT INTO messages (sender_id, receiver_id, message)
                  VALUES (:sender, :receiver, :message)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':sender' => $senderId, ':receiver' => $receiverId, ':message' => $text]);

        return $this->find((int) $this->db->lastInsertId());
    }

    /** Marks everything $contactId sent to $userId as read. Returns how many rows changed. */
    public function markThreadRead(int $userId, int $contactId): int
    {
        $query = "UPDATE messages
                  SET is_read = 1, updated_at = NOW()
                  WHERE receiver_id = :uid AND sender_id = :cid
                    AND is_read = 0 AND deleted_at IS NULL";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':uid' => $userId, ':cid' => $contactId]);

        return $stmt->rowCount();
    }

    /** Total unread messages waiting for the user, across all threads. */
    public function unreadTotal(int $userId): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM messages
                                    WHERE receiver_id = :uid AND is_read = 0 AND deleted_at IS NULL");
        $stmt->execute([':uid' => $userId]);

        return (int) $stmt->fetchColumn();
    }

    /** Soft-deletes a message, only if $userId is the one who sent it. */
    public function deleteOwn(int $messageId, int $userId): bool
    {
        $query = "UPDATE messages
                  SET deleted_at = NOW()
                  WHERE id = :id AND sender_id = :uid AND deleted_at IS NULL";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $messageId, ':uid' => $userId]);

        return $stmt->rowCount() > 0;
    }
}
