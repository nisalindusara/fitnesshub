<?php $pageStyles = ['staff/class_pt_module/classes/_classes', 'staff/class_pt_module/classes/show']; ?>

<section class="cls-page">

    <div class="cls-breadcrumb">
        Classes /
        <strong><?= htmlspecialchars($class['name']) ?></strong>
    </div>

    <div class="cls-head">

        <div>
            <h1><?= htmlspecialchars($class['name']) ?></h1>
            <p>Class Details</p>
        </div>

        <div class="cls-actions">
            <a href="/portal/classes/create?id=1" class="cls-btn">
                Edit Class
            </a>

            <a href="/portal/classes/sessions/create" class="cls-btn cls-primary">
                 Schedule Session
            </a>
        </div>

    </div>

    <div class="cls-card">

        <div class="cls-details">

            <div>
                <span>Class Name</span>
                <strong><?= htmlspecialchars($class['name']) ?></strong>
            </div>

            <div>
                <span>Default Capacity</span>
                <strong><?= (int)$class['capacity'] ?> participants</strong>
            </div>

            <div>
                <span>Duration</span>
                <strong><?= (int)$class['duration'] ?> minutes</strong>
            </div>

            <div>
                <span>Status</span>
                <strong class="cls-badge">Active</strong>
            </div>

        </div>

        <div class="cls-description">
            <span>Description</span>
            <p>
                <?= htmlspecialchars($class['description']) ?>
            </p>
        </div>

    </div>

    <h2 class="cls-section-title">
        Upcoming Sessions
    </h2>

    <div class="cls-table-wrap">

        <table class="cls-table">

            <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Instructor</th>
                <th>Booked / Capacity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            <?php foreach ($sessions as $session): ?>

                <?php
                $statusClass = match ($session['status']) {
                    'FULL' => 'cls-full',
                    'OPEN' => 'cls-open',
                    default => 'cls-scheduled'
                };
                ?>

                <tr>

                    <td>
                        <strong><?= htmlspecialchars($session['date']) ?></strong>
                    </td>

                    <td>
                        <?= htmlspecialchars($session['time']) ?>
                    </td>

                    <td>
                        <span class="cls-avatar"></span>
                        <?= htmlspecialchars($session['instructor']) ?>
                    </td>

                    <td>
                        <?= (int)$session['booked'] ?>
                        /
                        <?= (int)$session['capacity'] ?>
                    </td>

                    <td>
                        <span class="cls-status <?= $statusClass ?>">
                            <?= ucfirst(strtolower($session['status'])) ?>
                        </span>
                    </td>

                    <td>
                        <a href="/portal/classes/sessions/show?id=1" class="cls-action-view">
                            View
                        </a>

                        <a href="#" class="cls-action-cancel">
                            Cancel
                        </a>
                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</section>