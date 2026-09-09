<?php

require_once __DIR__ . '/../core/Model.php';

class Payment extends Model
{
    /**
     * Records a payment for an order. Wrapped in a transaction since this
     * writes to two tables (payments header + order_payments link) that
     * must both succeed together — a payment row with no extension-table
     * link would be an orphaned, meaningless record.
     *
     * $paymentData must include: amount, method, recorded_by, verification_status, notes (optional)
     */
    public function recordForOrder(array $paymentData, int $orderId): int|false
    {
        try {
            $this->db->beginTransaction();

            $insertPayment = "INSERT INTO payments (amount, method, verification_status, recorded_by, notes)
                               VALUES (:amount, :method, :verification_status, :recorded_by, :notes)";
            $stmt = $this->db->prepare($insertPayment);
            $stmt->execute([
                ':amount'              => $paymentData['amount'],
                ':method'              => $paymentData['method'],
                ':verification_status' => $paymentData['verification_status'],
                ':recorded_by'         => $paymentData['recorded_by'],
                ':notes'               => $paymentData['notes'] ?? null,
            ]);

            $paymentId = (int) $this->db->lastInsertId();

            $insertLink = "INSERT INTO order_payments (payment_id, order_id) VALUES (:payment_id, :order_id)";
            $this->db->prepare($insertLink)->execute([
                ':payment_id' => $paymentId,
                ':order_id'   => $orderId,
            ]);

            $this->db->commit();
            return $paymentId;
        } catch (Throwable $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function recordForMembership(array $paymentData, int $orderId) {}

    public function recordForClass(array $paymentData, int $orderId) {}

    public function recordForPtSession(array $paymentData, int $orderId) {}

    /**
     * For revenue reports / dashboards — deliberately the ONLY method report
     * code should call. Unverified payments must never contribute to
     * revenue totals, since a pending_verification transfer might turn out
     * to have never actually arrived.
     */
    public function getVerifiedPayments(): array
    {
        $query = "SELECT p.*, CONCAT(u.first_name, ' ', u.last_name) AS recorded_by_name
                  FROM payments p
                  JOIN users u ON p.recorded_by = u.id
                  WHERE p.verification_status = 'verified'
                  ORDER BY p.created_at DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Operational view — everything still awaiting confirmation, so staff
     * can see what needs chasing up. NOT for revenue reporting.
     */
    public function getPendingVerification(): array
    {
        $query = "SELECT p.*, CONCAT(u.first_name, ' ', u.last_name) AS recorded_by_name
                  FROM payments p
                  JOIN users u ON p.recorded_by = u.id
                  WHERE p.verification_status = 'pending_verification'
                  ORDER BY p.created_at ASC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Every payment regardless of status — for admin/audit views only.
     * Not for revenue totals; use getVerifiedPayments() for that.
     */
    public function getAllPayments(): array
    {
        $query = "SELECT p.*, CONCAT(u.first_name, ' ', u.last_name) AS recorded_by_name
                  FROM payments p
                  JOIN users u ON p.recorded_by = u.id
                  ORDER BY p.created_at DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByIdWithContext(int $id): array|false
    {
        $query = "SELECT p.*,
                    op.order_id,
                    mp.membership_fee_id,
                    cp.class_fee_id,
                    ptp.pt_booking_id
                  FROM payments p
                  LEFT JOIN order_payments op ON op.payment_id = p.id
                  LEFT JOIN membership_payments mp ON mp.payment_id = p.id
                  LEFT JOIN class_payments cp ON cp.payment_id = p.id
                  LEFT JOIN pt_session_payments ptp ON ptp.payment_id = p.id
                  WHERE p.id = :id
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Verification status of the payment linked to a given order — used
     * to enforce the order-status/payment-verification link. Returns null
     * if the order has no payment recorded yet.
     */
    public function getVerificationStatusForOrder(int $orderId): ?string
    {
        $query = "SELECT p.verification_status
                  FROM payments p
                  JOIN order_payments op ON op.payment_id = p.id
                  WHERE op.order_id = :order_id
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':order_id' => $orderId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['verification_status'] ?? null;
    }
}
