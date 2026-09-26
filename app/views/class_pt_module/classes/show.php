<style>
.cls-page{
    padding:24px 28px 40px;
    background:#f7f9fb;
    min-height:100vh;
    font-family:Inter,Arial,sans-serif;
    color:#292c33;
}

.cls-breadcrumb{
    font-size:12px;
    color:#98a2b3;
    margin-bottom:25px;
}

.cls-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:22px;
}

.cls-head h1{
    margin:0;
    font-size:28px;
}

.cls-head p{
    margin:6px 0 0;
    color:#98a2b3;
    font-size:13px;
}

.cls-actions{
    display:flex;
    gap:10px;
}

.cls-btn{
    height:36px;
    padding:0 15px;
    border-radius:7px;
    border:1px solid #d0d5dd;
    background:#fff;
    color:#344054;
    font-size:12px;
    font-weight:600;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
}

.cls-primary{
    background:#292c33;
    color:#fff;
    border-color:#292c33;
}

.cls-card{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
    padding:20px;
    margin-bottom:22px;
}

.cls-details{
    display:grid;
    grid-template-columns:1.2fr .7fr .7fr .7fr;
    gap:28px;
}

.cls-details span{
    display:block;
    font-size:10px;
    color:#98a2b3;
    text-transform:uppercase;
    margin-bottom:5px;
}

.cls-details strong{
    font-size:13px;
}

.cls-description{
    margin-top:18px;
    border-top:1px solid #eef1f4;
    padding-top:14px;
}

.cls-description span{
    font-size:10px;
    color:#98a2b3;
    text-transform:uppercase;
}

.cls-description p{
    margin:6px 0 0;
    font-size:12px;
    color:#667085;
}

.cls-badge{
    display:inline-flex;
    align-items:center;
    gap:5px;
    padding:4px 8px;
    border-radius:999px;
    font-size:10px;
    background:#e8f7ef;
    color:#15965b;
}

.cls-badge:before{
    content:'';
    width:5px;
    height:5px;
    background:#15965b;
    border-radius:50%;
}

.cls-section-title{
    font-size:16px;
    margin:0 0 16px;
}

.cls-table-wrap{
    background:#fff;
    border:1px solid #e4e7ec;
    border-radius:10px;
    overflow:hidden;
}

.cls-table{
    width:100%;
    border-collapse:collapse;
    font-size:12px;
}

.cls-table th{
    background:#f8fafc;
    color:#667085;
    text-transform:uppercase;
    font-size:10px;
    text-align:left;
    padding:12px 16px;
}

.cls-table td{
    padding:14px 16px;
    border-top:1px solid #eef1f4;
}

.cls-avatar{
    display:inline-block;
    width:18px;
    height:18px;
    border-radius:50%;
    background:#e4e7ec;
    margin-right:7px;
    vertical-align:middle;
}

.cls-status{
    display:inline-flex;
    padding:4px 8px;
    border-radius:999px;
    font-size:10px;
}

.cls-scheduled{
    background:#eef4ff;
    color:#2563eb;
}

.cls-full{
    background:#fff5e6;
    color:#d97706;
}

.cls-open{
    background:#e8f7ef;
    color:#15965b;
}

.cls-action-view{
    color:#2563eb;
    text-decoration:none;
    margin-right:12px;
}

.cls-action-cancel{
    color:#d92d20;
    text-decoration:none;
}
</style>

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
            <a href="/classes/create?id=1" class="cls-btn">
                Edit Class
            </a>

            <a href="#" class="cls-btn cls-primary">
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
                        <a href="#" class="cls-action-view">
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