<?php

class AttendanceService
{
    private Attendance $attendanceModel;

    public function __construct()
    {
        $this->attendanceModel = new Attendance();
    }

    public function getStatus(int $memberId): array
    {
        $open = $this->attendanceModel->findOpenSessionByUserId($memberId);

        return [
            'is_checked_in' => $open !== false,
            'checked_in_at' => $open['check_in_at'] ?? null,
        ];
    }

    public function markCheckIn(int $memberId): void
    {
        if ($this->attendanceModel->findOpenSessionByUserId($memberId) !== false) {
            throw new InvalidArgumentException('Member is already checked in.');
        }
        $this->attendanceModel->checkIn($memberId);
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
