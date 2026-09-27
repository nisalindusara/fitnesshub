<?php

class AttendanceService
{
    private Attendance $attendanceModel;
    private UserMembership $membershipModel;
    private ClassEnrollment $classEnrollmentModel;

    public function __construct()
    {
        $this->attendanceModel = new Attendance();
        $this->membershipModel = new UserMembership();
        $this->classEnrollmentModel = new ClassEnrollment();
    }

    public function getStatus(int $memberId): array
    {
        $open = $this->attendanceModel->findOpenSessionByUserId($memberId);
        return [
            'is_checked_in' => $open !== false,
            'checked_in_at' => $open['check_in_at'] ?? null,
        ];
    }

    public function markCheckIn(int $memberId, ?int $classId): void
    {
        if ($this->attendanceModel->findOpenSessionByUserId($memberId) !== false) {
            throw new InvalidArgumentException('Member is already checked in.');
        }

        $membership = $this->membershipModel->findCurrentByUserId($memberId);
        $hasActiveMembership = $membership !== false && $membership['status'] === 'ACTIVE';
        $classesToday = $this->classEnrollmentModel->findClassesWithSessionTodayForUser($memberId);

        if (!$hasActiveMembership && count($classesToday) === 0) {
            throw new InvalidArgumentException('Member has no active membership or class enrollment.');
        }

        if ($classId === null && !$hasActiveMembership) {
            throw new InvalidArgumentException('Gym session requires an active membership.');
        }

        if ($classId !== null && !in_array($classId, array_column($classesToday, 'class_id'), true)) {
            throw new InvalidArgumentException('Member is not enrolled in that class today.');
        }

        $this->attendanceModel->checkIn($memberId, $classId);
    }

    public function markCheckOut(int $memberId): void
    {
        $open = $this->attendanceModel->findOpenSessionByUserId($memberId);
        if ($open === false) {
            throw new InvalidArgumentException('Member is not currently checked in.');
        }
        $this->attendanceModel->checkOut((int) $open['id']);
    }
}
