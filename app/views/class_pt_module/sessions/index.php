<style>

.cs-page{
    padding:26px 28px 40px;
    min-height:100vh;
    background:#f7f9fb;
    font-family:Inter,Arial,sans-serif;
    color:#24272d;
}

.cs-breadcrumb{
    margin-bottom:30px;
    font-size:12px;
    color:#98a2b3;
}

.cs-breadcrumb strong{
    color:#344054;
}

.cs-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:26px;
}

.cs-head h1{
    margin:0;
    font-size:27px;
}

.cs-head p{
    margin:7px 0 0;
    font-size:13px;
    color:#8b93a1;
}

.cs-btn{
    display:inline-flex;
    justify-content:center;
    align-items:center;
    min-height:36px;
    padding:0 15px;
    border-radius:7px;
    border:1px solid #d0d5dd;
    background:#fff;
    color:#344054;
    font-size:12px;
    font-weight:600;
    text-decoration:none;
}

.cs-btn-primary{
    background:#24272d;
    color:#fff;
    border-color:#24272d;
}

.cs-toolbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:22px;
}

.cs-search{
    width:250px;
    height:36px;
    padding:0 12px;
    border:1px solid #d0d5dd;
    border-radius:7px;
    font-size:12px;
    background:#fff;
}

.cs-filters{
    display:flex;
    gap:10px;
}

.cs-select{
    height:36px;
    min-width:110px;
    padding:0 12px;
    border:1px solid #d0d5dd;
    border-radius:7px;
    background:#fff;
    font-size:12px;
}

.cs-table-wrap{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
    overflow:hidden;
}

.cs-table{
    width:100%;
    border-collapse:collapse;
    font-size:12px;
}

.cs-table th{
    padding:13px 15px;
    background:#f8fafc;
    color:#667085;
    text-transform:uppercase;
    font-size:10px;
    text-align:left;
}

.cs-table td{
    padding:15px;
    border-top:1px solid #eaecf0;
}

.cs-status{
    display:inline-flex;
    align-items:center;
    gap:5px;
    border-radius:999px;
    padding:4px 8px;
    font-size:10px;
    font-weight:600;
}

.cs-status:before{
    content:'';
    width:5px;
    height:5px;
    border-radius:50%;
}

.cs-scheduled{
    background:#eef4ff;
    color:#3973c6;
}

.cs-scheduled:before{
    background:#3973c6;
}

.cs-completed{
    background:#e9f8ef;
    color:#208b55;
}

.cs-completed:before{
    background:#208b55;
}

.cs-cancelled{
    background:#fff0f0;
    color:#d74444;
}

.cs-cancelled:before{
    background:#d74444;
}

.cs-actions{
    white-space:nowrap;
}

.cs-actions a{
    margin-right:10px;
    font-size:11px;
    text-decoration:none;
}

.cs-view{
    color:#2563eb;
}

.cs-edit{
    color:#667085;
}

.cs-cancel{
    color:#d92d20;
}

.cs-footer{
    padding:13px 15px;
    font-size:11px;
    color:#8b93a1;
    border-top:1px solid #eaecf0;
}

</style>


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
            href="/classes/sessions/create"
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
                            href="/classes/sessions/show?id=<?= (int)$session['id'] ?>"
                            class="cs-view"
                        >
                            View
                        </a>


                        <a href="#" class="cs-edit">
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