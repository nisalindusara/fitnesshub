<?php
/*
 * Shared look and helpers for the leave request screens
 * (review_planned, review_immediate, result). Included at the top of each.
 */

$pageStyles[] = 'staff/work_schedule_module/leave/_leave-review';

$lvName = fn(?string $first, ?string $last): string => trim(($first ?? '') . ' ' . ($last ?? ''));

$lvAvatar = function (?string $first, ?string $last, string $extra = ''): string {
    $initials = mb_strtoupper(mb_substr((string) $first, 0, 1) . mb_substr((string) $last, 0, 1));
    return '<span class="lv-avatar ' . $extra . '" aria-hidden="true">' . htmlspecialchars($initials) . '</span>';
};

// "Today, Sep 27" / "Tomorrow, Sep 28" / "Wed, Oct 14"
$lvDay = function (string $ymd): string {
    $date = new DateTimeImmutable($ymd);
    $today = new DateTimeImmutable('today');
    if ($date == $today) {
        return 'Today, ' . $date->format('M j');
    }
    if ($date == $today->modify('+1 day')) {
        return 'Tomorrow, ' . $date->format('M j');
    }
    return $date->format('D, M j');
};

$lvTime = fn(string $start, string $end): string => substr($start, 0, 5) . '–' . substr($end, 0, 5);

$lvType = fn(string $type): string => '<span class="lv-type">' . htmlspecialchars($types[$type] ?? $type) . '</span>';

// Session notes read "Title, detail" — e.g. "Strength Foundations, Studio A"
$lvClassMember = function (?string $notes): string {
    if ($notes === null || trim($notes) === '') {
        return '<span class="lv-muted">—</span>';
    }
    [$title, $detail] = array_pad(array_map('trim', explode(',', $notes, 2)), 2, '');
    return '<span class="lv-cm">' . htmlspecialchars($title) . '</span>'
        . ($detail !== '' ? '<span class="lv-cm-sub">' . htmlspecialchars($detail) . '</span>' : '');
};

$lvAgo = function (string $datetime): string {
    $seconds = time() - strtotime($datetime);
    if ($seconds < 60) {
        return 'just now';
    }
    foreach ([86400 => 'day', 3600 => 'hour', 60 => 'minute'] as $unit => $label) {
        if ($seconds >= $unit) {
            $n = intdiv($seconds, $unit);
            return $n . ' ' . $label . ($n === 1 ? '' : 's') . ' ago';
        }
    }
    return '';
};

$lvStatusChips = [
    'pending'   => ['lv-chip--amber', 'Pending Approval'],
    'approved'  => ['lv-chip--green', 'Approved'],
    'rejected'  => ['lv-chip--red', 'Rejected'],
    'cancelled' => ['lv-chip--red', 'Leave Cancelled'],
];
?>
