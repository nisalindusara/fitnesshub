<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'FitnessHub') ?></title>
    <link rel="stylesheet" href="/assets/css/tokens.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">
</head>

<body>

    <?php include __DIR__ . '/../partials/_icon-sprite.php'; ?>

    <div class="staff-shell">
        <aside class="staff-shell__sidebar">
            <?php include __DIR__ . '/../partials/_sidebar.php'; ?>
        </aside>

        <main class="staff-shell__content">
            <?= $content ?>
        </main>
    </div>

    <script type="module" src="/assets/js/fh-nav-item.js"></script>
    <script type="module" src="/assets/js/fh-nav-dropdown.js"></script>

</body>

</html>