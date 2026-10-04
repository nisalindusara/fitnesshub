<?php
$pageStyles = ['staff/daily_plan_module/meal-plan'];
$memberName = trim($request['first_name'] . ' ' . $request['last_name']);
$initials = mb_strtoupper(mb_substr($request['first_name'], 0, 1) . mb_substr($request['last_name'], 0, 1));
$isCompleted = $request['status'] === 'completed';
$optionField = fn(int $dow, string $meal, string $key, string $field) => "plan[$dow][$meal][$key][$field]";

// One option row. $key only has to be unique within its meal; the service re-numbers them.
$optionRow = function (int $dow, string $meal, string $key, array $o) use ($optionField): string {
    $v = fn(string $f) => htmlspecialchars((string) ($o[$f] ?? ''));
    return '<div class="mp-option">'
        . '<input class="mp-input mp-input--name" type="text" maxlength="100" placeholder="Meal name, e.g. Oatmeal with berries" aria-label="Option name" name="' . $optionField($dow, $meal, $key, 'name') . '" value="' . $v('name') . '">'
        . '<input class="mp-input mp-input--desc" type="text" maxlength="255" placeholder="Ingredients or portion (optional)" aria-label="Description" name="' . $optionField($dow, $meal, $key, 'description') . '" value="' . $v('description') . '">'
        . '<label class="mp-unit"><input class="mp-input mp-input--num" type="number" min="0" max="3000" inputmode="numeric" aria-label="Calories" name="' . $optionField($dow, $meal, $key, 'calories') . '" value="' . $v('calories') . '"><span>kcal</span></label>'
        . '<label class="mp-unit"><input class="mp-input mp-input--num" type="number" min="0" max="300" inputmode="numeric" aria-label="Protein in grams" name="' . $optionField($dow, $meal, $key, 'protein') . '" value="' . $v('protein') . '"><span>g protein</span></label>'
        . '<button type="button" class="mp-remove" aria-label="Remove option" title="Remove option">'
        . '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>'
        . '</button></div>';
};
?>

<form class="mp-view" id="mp-form" method="post" action="/portal/meal-plan-requests/save" novalidate>
    <input type="hidden" name="request_id" value="<?= (int) $request['id'] ?>">

    <nav class="mp-crumbs" aria-label="Breadcrumb">
        <a href="/portal/meal-plan-requests">Meal Plan Requests</a>
        <span>/</span>
        <strong aria-current="page"><?= htmlspecialchars($memberName) ?></strong>
    </nav>

    <?php if ($flash): ?>
        <div class="mp-flash mp-flash--<?= $flash['type'] ?>" role="<?= $flash['type'] === 'error' ? 'alert' : 'status' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <div class="mp-head">
        <div>
            <div class="mp-title-row">
                <h1 class="mp-title">Meal plan for <?= htmlspecialchars($memberName) ?></h1>
                <span class="mp-status<?= $isCompleted ? ' mp-status--done' : '' ?>"><?= $isCompleted ? 'Plan sent' : 'Pending' ?></span>
            </div>
            <p class="mp-subtitle">Five meals a day, up to <?= (int) $maxOptions ?> options each. The member picks one option per meal.</p>
        </div>
        <div class="mp-actions">
            <a class="mp-btn" href="/portal/meal-plan-requests">Back to requests</a>
            <button type="submit" class="mp-btn mp-btn--primary">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M2.5 7.5L5.5 10.5L11.5 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <?= $isCompleted ? 'Save changes' : 'Save and send plan' ?>
            </button>
        </div>
    </div>

    <?php if ($replacesOtherPlan): ?>
        <div class="mp-flash mp-flash--info">
            <?= htmlspecialchars($request['first_name']) ?> already follows a meal plan from another instructor. Saving this plan replaces it.
        </div>
    <?php endif; ?>

    <div class="mp-grid">
        <section class="mp-panel">
            <div class="mp-panel__head">
                <h2 class="mp-panel__title">Weekly meal plan</h2>
                <button type="button" class="mp-btn mp-btn--sm" id="mp-copy-day">Copy this day to every day</button>
            </div>

            <div class="mp-days" role="tablist" aria-label="Days of the week">
                <?php foreach ($dayNames as $dow => $day): ?>
                    <button type="button" role="tab" class="mp-day<?= $dow === 1 ? ' is-active' : '' ?>" data-day="<?= $dow ?>"
                        id="mp-tab-<?= $dow ?>" aria-controls="mp-day-<?= $dow ?>" aria-selected="<?= $dow === 1 ? 'true' : 'false' ?>">
                        <span class="mp-day__short"><?= htmlspecialchars($day['short']) ?></span>
                        <span class="mp-day__count"></span>
                    </button>
                <?php endforeach; ?>
            </div>

            <?php foreach ($dayNames as $dow => $day): ?>
                <div class="mp-daypanel" id="mp-day-<?= $dow ?>" role="tabpanel" aria-labelledby="mp-tab-<?= $dow ?>" data-day="<?= $dow ?>" <?= $dow === 1 ? '' : 'hidden' ?>>
                    <?php foreach ($mealTypes as $meal => $label): ?>
                        <div class="mp-meal" data-meal="<?= htmlspecialchars($meal) ?>">
                            <div class="mp-meal__head">
                                <h3 class="mp-meal__title"><?= htmlspecialchars($label) ?></h3>
                                <span class="mp-meal__count"></span>
                            </div>
                            <div class="mp-options"><?php foreach ($plan[$dow][$meal] as $i => $option) { echo $optionRow($dow, $meal, 'o' . $i, $option); } ?></div>
                            <button type="button" class="mp-btn mp-btn--sm mp-add">+ Add option</button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <aside class="mp-panel">
            <div class="mp-member">
                <span class="mp-avatar"><?= htmlspecialchars($initials) ?></span>
                <div>
                    <p class="mp-member__name"><?= htmlspecialchars($memberName) ?></p>
                    <p class="mp-member__meta"><?= htmlspecialchars($request['email']) ?></p>
                </div>
            </div>
            <dl class="mp-facts">
                <div>
                    <dt>Goal</dt>
                    <dd><?= htmlspecialchars($request['goal']) ?></dd>
                </div>
                <div>
                    <dt>Notes from the member</dt>
                    <dd><?= htmlspecialchars($request['notes'] ?: 'No notes.') ?></dd>
                </div>
                <div>
                    <dt>Requested</dt>
                    <dd><?= date('M j, Y · g:i A', strtotime($request['requested_at'])) ?></dd>
                </div>
                <?php if ($isCompleted && $request['completed_at']): ?>
                    <div>
                        <dt>Plan sent</dt>
                        <dd><?= date('M j, Y · g:i A', strtotime($request['completed_at'])) ?></dd>
                    </div>
                <?php endif; ?>
            </dl>
        </aside>
    </div>
</form>

<template id="mp-option-template"><?= $optionRow(0, '__meal__', '__key__', []) ?></template>

<script>
    (() => {
        const MAX_OPTIONS = <?= (int) $maxOptions ?>;
        const form = document.getElementById('mp-form');
        const template = document.getElementById('mp-option-template');
        let nextKey = 1;

        // A fresh option row for one meal of one day, optionally pre-filled
        function newOption(day, meal, values = {}) {
            const key = 'n' + (nextKey++);
            const html = template.innerHTML
                .replaceAll('plan[0][__meal__][__key__]', `plan[${day}][${meal}][${key}]`);
            const wrap = document.createElement('div');
            wrap.innerHTML = html;
            const row = wrap.firstElementChild;
            for (const [field, value] of Object.entries(values)) {
                const input = row.querySelector(`[name$="[${field}]"]`);
                if (input) input.value = value;
            }
            return row;
        }

        function optionValues(row) {
            const values = {};
            row.querySelectorAll('input').forEach(input => {
                values[input.name.match(/\[(\w+)\]$/)[1]] = input.value;
            });
            return values;
        }

        // Counts under each meal and on each day tab; "Add option" stops at the limit
        function refresh() {
            document.querySelectorAll('.mp-daypanel').forEach(panel => {
                let total = 0;
                panel.querySelectorAll('.mp-meal').forEach(mealEl => {
                    const count = mealEl.querySelectorAll('.mp-option').length;
                    total += count;
                    mealEl.querySelector('.mp-meal__count').textContent = `${count} of ${MAX_OPTIONS} options`;
                    mealEl.querySelector('.mp-add').disabled = count >= MAX_OPTIONS;
                });
                const tab = document.getElementById('mp-tab-' + panel.dataset.day);
                tab.querySelector('.mp-day__count').textContent = total ? `${total} option${total === 1 ? '' : 's'}` : 'Empty';
                tab.classList.toggle('is-empty', total === 0);
            });
        }

        // Day tabs
        const tabs = document.querySelectorAll('.mp-day');
        tabs.forEach(tab => tab.addEventListener('click', () => {
            tabs.forEach(t => {
                const active = t === tab;
                t.classList.toggle('is-active', active);
                t.setAttribute('aria-selected', active ? 'true' : 'false');
                document.getElementById('mp-day-' + t.dataset.day).hidden = !active;
            });
        }));

        // Add / remove options
        form.addEventListener('click', (e) => {
            const add = e.target.closest('.mp-add');
            if (add) {
                const mealEl = add.closest('.mp-meal');
                const list = mealEl.querySelector('.mp-options');
                if (list.children.length < MAX_OPTIONS) {
                    const row = newOption(add.closest('.mp-daypanel').dataset.day, mealEl.dataset.meal);
                    list.appendChild(row);
                    row.querySelector('input').focus();
                    refresh();
                }
                return;
            }
            const remove = e.target.closest('.mp-remove');
            if (remove) {
                remove.closest('.mp-option').remove();
                refresh();
            }
        });

        // Copy the open day's meals onto every other day
        document.getElementById('mp-copy-day').addEventListener('click', () => {
            const source = document.querySelector('.mp-daypanel:not([hidden])');
            const dayName = document.querySelector('.mp-day.is-active .mp-day__short').textContent;
            if (!confirm(`Replace every other day's meals with ${dayName}'s?`)) return;

            document.querySelectorAll('.mp-daypanel').forEach(panel => {
                if (panel === source) return;
                source.querySelectorAll('.mp-meal').forEach(sourceMeal => {
                    const list = panel.querySelector(`.mp-meal[data-meal="${sourceMeal.dataset.meal}"] .mp-options`);
                    list.innerHTML = '';
                    sourceMeal.querySelectorAll('.mp-option').forEach(row => {
                        list.appendChild(newOption(panel.dataset.day, sourceMeal.dataset.meal, optionValues(row)));
                    });
                });
            });
            refresh();
        });

        refresh();
    })();
</script>
