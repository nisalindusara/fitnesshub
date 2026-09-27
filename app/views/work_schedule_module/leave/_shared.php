<?php
/*
 * Shared look and helpers for the leave request screens
 * (review_planned, review_immediate, result). Included at the top of each.
 */

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
<style>
    .lv-page {
        max-width: 1120px;
        padding: 20px 28px 40px;
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
        display: flex;
        flex-direction: column;
        gap: 16px;
        box-sizing: border-box;
    }

    .lv-page *,
    .lv-page *::before,
    .lv-page *::after,
    .lv-modal * {
        box-sizing: border-box;
    }

    .lv-crumbs {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }

    .lv-crumbs span {
        color: rgba(28, 28, 28, 0.4);
    }

    .lv-crumbs .lv-crumbs__sep {
        color: rgba(28, 28, 28, 0.2);
    }

    .lv-crumbs .lv-crumbs__current {
        color: #1c1c1c;
        font-weight: 500;
    }

    /* Heading */
    .lv-head {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .lv-title {
        margin: 0;
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .lv-subtitle {
        margin: 4px 0 0;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
    }

    .lv-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 6px;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.7);
        text-decoration: none;
    }

    .lv-back:hover {
        color: #1c1c1c;
    }

    /* Cards */
    .lv-card {
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        background: #fff;
        overflow: hidden;
    }

    .lv-card__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        padding: 14px 18px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.08);
    }

    .lv-card__title {
        display: flex;
        align-items: center;
        gap: 8px;
        margin: 0;
        font-size: 15px;
        font-weight: 600;
    }

    .lv-card__meta {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.45);
    }

    .lv-count {
        min-width: 22px;
        padding: 1px 7px;
        border-radius: 999px;
        background: rgba(28, 28, 28, 0.06);
        font-size: 12px;
        font-weight: 500;
        color: rgba(28, 28, 28, 0.6);
        text-align: center;
    }

    .lv-fields {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 18px 24px;
        padding: 18px;
    }

    .lv-fields--3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .lv-field__label {
        display: block;
        margin-bottom: 6px;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.45);
    }

    .lv-field__value {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 15px;
        font-weight: 600;
    }

    .lv-field__sub {
        display: block;
        margin-top: 3px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
    }

    /* Chips */
    .lv-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 500;
        white-space: nowrap;
    }

    .lv-chip::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .lv-chip--plain::before {
        display: none;
    }

    .lv-chip--amber {
        background: #fff6e5;
        color: #b76e00;
    }

    .lv-chip--green {
        background: #e9f8ef;
        color: #146c3a;
    }

    .lv-chip--red {
        background: #fdecec;
        color: #c0262d;
    }

    .lv-chip--blue {
        background: #eaf1ff;
        color: #1d4ed8;
    }

    .lv-chip--orange {
        background: #fff1e6;
        color: #c2410c;
    }

    .lv-chip--grey {
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.65);
    }

    .lv-chip svg {
        width: 12px;
        height: 12px;
    }

    /* Avatars */
    .lv-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        flex-shrink: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(28, 28, 28, 0.06);
        font-size: 9px;
        font-weight: 600;
        color: rgba(28, 28, 28, 0.55);
    }

    .lv-avatar--lg {
        width: 30px;
        height: 30px;
        font-size: 11px;
    }

    .lv-avatar--green {
        background: #e9f8ef;
        color: #146c3a;
    }

    /* Sessions table */
    .lv-table-wrap {
        overflow-x: auto;
    }

    .lv-table {
        width: 100%;
        min-width: 820px;
        border-collapse: collapse;
        font-size: 14px;
    }

    .lv-table th {
        padding: 10px 18px;
        background: #fafbfc;
        border-bottom: 1px solid rgba(28, 28, 28, 0.08);
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.45);
        text-align: left;
        white-space: nowrap;
    }

    .lv-table td {
        padding: 14px 18px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
        vertical-align: middle;
    }

    .lv-table tr:last-child td {
        border-bottom: none;
    }

    .lv-date {
        font-weight: 500;
        white-space: nowrap;
    }

    .lv-time {
        color: rgba(28, 28, 28, 0.65);
        white-space: nowrap;
    }

    .lv-type {
        display: inline-block;
        padding: 3px 9px;
        border-radius: 6px;
        background: rgba(28, 28, 28, 0.06);
        font-size: 12px;
        color: rgba(28, 28, 28, 0.7);
        white-space: nowrap;
    }

    .lv-cm {
        display: block;
        font-weight: 500;
    }

    .lv-cm-sub {
        display: block;
        margin-top: 2px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
    }

    .lv-person {
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .lv-muted {
        color: rgba(28, 28, 28, 0.35);
    }

    .lv-note {
        display: block;
        margin-top: 4px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
    }

    .lv-note--red {
        color: #c0262d;
    }

    .lv-empty {
        padding: 28px 18px;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
        text-align: center;
    }

    .lv-foot-note {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 12px 18px;
        border-top: 1px solid rgba(28, 28, 28, 0.08);
        background: #fafbfc;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.55);
    }

    /* Actions */
    .lv-actions {
        display: flex;
        align-items: flex-end;
        gap: 10px;
        flex-wrap: wrap;
    }

    .lv-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 40px;
        padding: 0 18px;
        border: 1px solid rgba(28, 28, 28, 0.14);
        border-radius: 10px;
        background: #fff;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        color: #1c1c1c;
        text-decoration: none;
        cursor: pointer;
    }

    .lv-btn:hover {
        background: #f7f9fb;
    }

    .lv-btn--dark {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #fff;
    }

    .lv-btn--dark:hover {
        background: #333;
    }

    .lv-btn--reject {
        border-color: #f1b9bc;
        background: #fff6f6;
        color: #c0262d;
    }

    .lv-btn--reject:hover {
        background: #fdecec;
    }

    .lv-btn--danger {
        background: #c0262d;
        border-color: #c0262d;
        color: #fff;
    }

    .lv-btn--danger:hover {
        background: #a11f25;
    }

    .lv-btn:disabled {
        opacity: 0.6;
        cursor: wait;
    }

    .lv-alert {
        padding: 12px 16px;
        border: 1px solid #f6d5d5;
        border-radius: 10px;
        background: #fdf0f0;
        font-size: 14px;
        color: #b42318;
    }

    /* Confirm dialog */
    .lv-modal {
        position: fixed;
        inset: 0;
        z-index: 50;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
        background: rgba(15, 15, 20, 0.4);
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
    }

    .lv-modal[hidden] {
        display: none;
    }

    .lv-modal__box {
        width: min(440px, 100%);
        padding: 22px;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 24px 48px -12px rgba(0, 0, 0, 0.25);
    }

    .lv-modal__title {
        margin: 0 0 6px;
        font-size: 17px;
        font-weight: 600;
    }

    .lv-modal__text {
        margin: 0 0 20px;
        font-size: 14px;
        line-height: 1.5;
        color: rgba(28, 28, 28, 0.65);
    }

    .lv-modal__actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    @media (max-width: 900px) {

        .lv-fields,
        .lv-fields--3 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .lv-page {
            padding: 16px;
        }

        .lv-fields,
        .lv-fields--3 {
            grid-template-columns: 1fr;
        }
    }
</style>
