<?php
/*
 * Reject / Approve buttons and their confirm dialogs, shared by both leave tickets.
 * Needs $request, $sessions and $lvName from the including view.
 */
$instructorName = $lvName($request['first_name'], $request['last_name']);
$covered = count(array_filter($sessions, fn($s) => $s['replacement'] !== null));
$uncovered = count($sessions) - $covered;
$plural = fn(int $n, string $word): string => $n . ' ' . $word . ($n === 1 ? '' : 's');

if (!$sessions) {
    $approveText = "{$instructorName} has no sessions during this leave, so the schedule won't change.";
} else {
    $approveText = $plural($covered, 'session') . ' will move to the replacement instructor shown';
    $approveText .= $uncovered ? ', and ' . $plural($uncovered, 'session') . ' with no available instructor will be cancelled.' : '.';
}
$rejectText = $sessions
    ? "{$instructorName} keeps all " . $plural(count($sessions), 'session') . ' and the schedule stays as it is.'
    : "{$instructorName}'s schedule stays as it is.";
?>

<div class="lv-actions">
    <button type="button" class="lv-btn lv-btn--reject" data-open="lv-reject-modal">Reject Request</button>
    <button type="button" class="lv-btn lv-btn--dark" data-open="lv-approve-modal">Approve Request</button>
</div>

<div class="lv-modal" id="lv-approve-modal" hidden>
    <form class="lv-modal__box" method="post" action="/portal/leave-requests/approve" role="alertdialog" aria-modal="true" aria-labelledby="lv-approve-title">
        <input type="hidden" name="id" value="<?= (int) $request['id'] ?>">
        <h2 class="lv-modal__title" id="lv-approve-title">Approve this leave?</h2>
        <p class="lv-modal__text"><?= htmlspecialchars($approveText) ?></p>
        <div class="lv-modal__actions">
            <button type="button" class="lv-btn" data-close>Cancel</button>
            <button type="submit" class="lv-btn lv-btn--dark">Approve Request</button>
        </div>
    </form>
</div>

<div class="lv-modal" id="lv-reject-modal" hidden>
    <form class="lv-modal__box" method="post" action="/portal/leave-requests/reject" role="alertdialog" aria-modal="true" aria-labelledby="lv-reject-title">
        <input type="hidden" name="id" value="<?= (int) $request['id'] ?>">
        <h2 class="lv-modal__title" id="lv-reject-title">Reject this leave?</h2>
        <p class="lv-modal__text"><?= htmlspecialchars($rejectText) ?></p>
        <div class="lv-modal__actions">
            <button type="button" class="lv-btn" data-close>Cancel</button>
            <button type="submit" class="lv-btn lv-btn--danger">Reject Request</button>
        </div>
    </form>
</div>

<script>
    (function () {
        let opener = null;
        document.querySelectorAll('[data-open]').forEach(btn => btn.addEventListener('click', () => {
            opener = btn;
            const modal = document.getElementById(btn.dataset.open);
            modal.hidden = false;
            modal.querySelector('[data-close]').focus();
        }));

        function closeAll() {
            document.querySelectorAll('.lv-modal').forEach(m => { m.hidden = true; });
            opener?.focus();
        }

        document.querySelectorAll('.lv-modal').forEach(modal => {
            modal.addEventListener('click', e => {
                if (e.target === modal || e.target.closest('[data-close]')) closeAll();
            });
            // Stop a double click from submitting twice
            modal.querySelector('form').addEventListener('submit', e => {
                e.target.querySelectorAll('button').forEach(b => { b.disabled = true; });
            });
        });
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAll(); });
    })();
</script>
