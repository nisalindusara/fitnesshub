<?php $pageStyles = ['staff/class_pt_module/sessions/_sessions', 'staff/class_pt_module/sessions/index']; ?>


<section class="cs-page">

    <div class="cs-breadcrumb">
        Classes /
        <strong>Sessions</strong>
    </div>


    <div class="cs-head">

        <div>
            <h1>Class Sessions</h1>

            <p>
                Schedule and manage individual class occurrences.
            </p>
        </div>

        <a
            href="/portal/classes/sessions/create"
            class="cs-btn cs-btn-primary"
        >
            + Schedule Session
        </a>

    </div>


    <div class="cs-toolbar">

        <input
            type="text"
            class="cs-search"
            placeholder="Search class sessions..."
        >


        <div class="cs-filters">

            <select class="cs-select">
                <option>All dates</option>
                <option>Today</option>
                <option>This week</option>
            </select>

            <select class="cs-select">
                <option>All statuses</option>
                <option>Scheduled</option>
                <option>Completed</option>
                <option>Cancelled</option>
            </select>

        </div>

    </div>


    <div class="cs-table-wrap">

        <table class="cs-table">

            <thead>

            <tr>
                <th>Class</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Instructor</th>
                <th>Capacity</th>
                <th>Bookings</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            </thead>


            <tbody>

            <?php foreach ($sessions as $session): ?>

                <?php

                $statusClass = match ($session['status']) {

                    'COMPLETED' => 'cs-completed',

                    'CANCELLED' => 'cs-cancelled',

                    default => 'cs-scheduled'
                };

                ?>


                <tr>

                    <td>
                        <strong>
                            <?= htmlspecialchars($session['class_name']) ?>
                        </strong>
                    </td>

                    <td>
                        <?= htmlspecialchars($session['date']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($session['start_time']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($session['end_time']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($session['instructor']) ?>
                    </td>

                    <td>
                        <?= (int)$session['capacity'] ?>
                    </td>

                    <td>
                        <?= (int)$session['bookings'] ?>
                        /
                        <?= (int)$session['capacity'] ?>
                    </td>

                    <td>

                        <span class="cs-status <?= $statusClass ?>">

                            <?= ucfirst(
                                strtolower($session['status'])
                            ) ?>

                        </span>

                    </td>


                    <td class="cs-actions">

                        <a
                            href="/portal/classes/sessions/show?id=<?= (int)$session['id'] ?>"
                            class="cs-view"
                        >
                            View
                        </a>


                        <a href="/portal/classes/sessions/create?id=<?= (int)$session['id'] ?>" class="cs-edit">
                            Edit
                        </a>


                        <a href="#" class="cs-cancel">
                            Cancel Session
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>


        <div class="cs-footer">
            Showing <?= count($sessions) ?> results
        </div>

    </div>

</section>