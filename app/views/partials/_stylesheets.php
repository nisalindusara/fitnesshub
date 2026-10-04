<?php
/*
 * Stylesheet links for every layout, in a fixed cascade order:
 *   tokens.css -> the surface file ($surfaceStyle) -> each entry in $pageStyles.
 * Page files come last so their rules still beat surface rules of equal
 * specificity, as they did when they were inline <style> blocks.
 *
 * $pageStyles is set by the view (rendered before the layout), paths relative
 * to /assets/css/pages/ without the extension, e.g. ['staff/orders'].
 */
$cssDir      = __DIR__ . '/../../../public/assets/css/';
$stylesheets = ['tokens', $surfaceStyle];
foreach ($pageStyles ?? [] as $pageStyle) {
    $stylesheets[] = 'pages/' . $pageStyle;
}
foreach ($stylesheets as $sheet):
    $sheetFile = $cssDir . $sheet . '.css';
?>
    <link rel="stylesheet" href="/assets/css/<?= htmlspecialchars($sheet) ?>.css?v=<?= is_file($sheetFile) ? filemtime($sheetFile) : 0 ?>">
<?php endforeach; ?>
