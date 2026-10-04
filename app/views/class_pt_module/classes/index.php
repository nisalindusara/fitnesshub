<?php $pageStyles = ['staff/class_pt_module/classes/_classes', 'staff/class_pt_module/classes/index']; ?>

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

        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <a href="/portal/classes/sessions" class="cls-btn">
                View Sessions
            </a>
            <a href="/portal/classes/create" class="cls-btn cls-btn-primary">
                + Add Class
            </a>
        </div>
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
                            href="/portal/classes/show?id=<?= (int)$class['id'] ?>"
                            class="cls-view"
                        >
                            View
                        </a>

                        <a
                            href="/portal/classes/create?id=<?= (int)$class['id'] ?>"
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