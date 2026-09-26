<style>
.cls-page{
    padding:24px 28px 40px;
    background:#f7f9fb;
    min-height:100vh;
    font-family:Inter,Arial,sans-serif;
    color:#1c1c1c;
}

.cls-breadcrumb{
    font-size:12px;
    color:#98a2b3;
    margin-bottom:28px;
}

.cls-breadcrumb strong{
    color:#344054;
}

.cls-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:24px;
}

.cls-head h1{
    margin:0;
    font-size:28px;
    font-weight:700;
}

.cls-head p{
    margin:6px 0 0;
    color:#98a2b3;
    font-size:13px;
}

.cls-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    height:36px;
    padding:0 15px;
    border-radius:7px;
    border:1px solid #d0d5dd;
    font-size:12px;
    font-weight:600;
    text-decoration:none;
    color:#344054;
    background:#fff;
}

.cls-btn-primary{
    background:#292c33;
    color:#fff;
    border-color:#292c33;
}

.cls-toolbar{
    display:flex;
    justify-content:space-between;
    gap:16px;
    margin-bottom:18px;
}

.cls-search,
.cls-select{
    height:36px;
    border:1px solid #d0d5dd;
    border-radius:7px;
    background:#fff;
    padding:0 12px;
    font-size:12px;
    box-sizing:border-box;
}

.cls-search{
    width:300px;
}

.cls-select{
    width:150px;
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
    vertical-align:middle;
}

.cls-badge{
    display:inline-flex;
    align-items:center;
    gap:5px;
    padding:4px 8px;
    border-radius:999px;
    font-size:10px;
    font-weight:600;
}

.cls-badge:before{
    content:'';
    width:5px;
    height:5px;
    border-radius:50%;
}

.cls-active{
    background:#e8f7ef;
    color:#15965b;
}

.cls-active:before{
    background:#15965b;
}

.cls-inactive{
    background:#fff0f1;
    color:#e5484d;
}

.cls-inactive:before{
    background:#e5484d;
}

.cls-actions{
    white-space:nowrap;
}

.cls-actions a{
    margin-right:10px;
    text-decoration:none;
    font-size:11px;
}

.cls-view{
    color:#2563eb;
}

.cls-edit{
    color:#667085;
}

.cls-danger{
    color:#d92d20;
}

.cls-success{
    color:#15965b;
}
</style>

<section class="cls-page">

    <div class="cls-breadcrumb">
        Classes /
        <strong>Class Management</strong>
    </div>

    <div class="cls-head">
        <div>
            <h1>Classes</h1>
            <p>Manage available group fitness classes.</p>
        </div>

        <a href="/classes/create" class="cls-btn cls-btn-primary">
            + Add Class
        </a>
    </div>

    <div class="cls-toolbar">
        <input
            type="text"
            class="cls-search"
            placeholder="Search classes..."
        >

        <select class="cls-select">
            <option>All Statuses</option>
            <option>Active</option>
            <option>Inactive</option>
        </select>
    </div>

    <div class="cls-table-wrap">

        <table class="cls-table">

            <thead>
            <tr>
                <th>Class Name</th>
                <th>Description</th>
                <th>Capacity</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            <?php foreach ($classes as $class): ?>

                <tr>

                    <td>
                        <strong>
                            <?= htmlspecialchars($class['name']) ?>
                        </strong>
                    </td>

                    <td>
                        <?= htmlspecialchars($class['description']) ?>
                    </td>

                    <td>
                        <?= (int)$class['capacity'] ?>
                    </td>

                    <td>
                        <?= (int)$class['duration'] ?> min
                    </td>

                    <td>
                        <span class="cls-badge <?= $class['status'] === 'ACTIVE' ? 'cls-active' : 'cls-inactive' ?>">
                            <?= ucfirst(strtolower($class['status'])) ?>
                        </span>
                    </td>

                    <td class="cls-actions">

                        <a
                            href="/classes/show?id=<?= (int)$class['id'] ?>"
                            class="cls-view"
                        >
                            View
                        </a>

                        <a
                            href="/classes/create?id=<?= (int)$class['id'] ?>"
                            class="cls-edit"
                        >
                            Edit
                        </a>

                        <?php if ($class['status'] === 'ACTIVE'): ?>

                            <a href="#" class="cls-danger">
                                Deactivate
                            </a>

                        <?php else: ?>

                            <a href="#" class="cls-success">
                                Activate
                            </a>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</section>