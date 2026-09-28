<?php
$currentRoute = $currentRoute ?? '/';
$isLoggedIn   = !empty($isLoggedIn);
$cartCount    = (int) ($cartCount ?? 0);   // pass the number of items in the cart from the controller
$css          = $_SERVER['DOCUMENT_ROOT'] . '/assets/css/';
$v            = fn($file) => file_exists($css . $file) ? filemtime($css . $file) : '1';
$active       = fn($route) => $currentRoute === $route ? ' is-active' : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fitness Hub | Anuradhapura</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Barlow+Condensed:wght@700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/tokens.css?v=<?= $v('tokens.css') ?>">
    <link rel="stylesheet" href="/assets/css/landing-layout.css?v=<?= $v('landing-layout.css') ?>">
    <link rel="stylesheet" href="/assets/css/landing.css?v=<?= $v('landing.css') ?>">
    <link rel="stylesheet" href="/assets/css/classes.css?v=<?= $v('classes.css') ?>">
</head>

<body class="site">

    <!-- ─── Navigation ─── -->
    <nav class="site-nav" aria-label="Main">
        <div class="site-nav__bar">

            <a href="/" class="site-logo">
                <img src="/assets/images/logo_bg_removed.png" alt="" width="44" height="44">
                <span>The Fitness <em>Hub</em></span>
            </a>

            <div class="site-nav__links">
                <a href="/" class="nav-link<?= $active('/') ?>">Home</a>
                <a href="/classes" class="nav-link<?= $active('/classes') ?>">Classes</a>
                <a href="/about" class="nav-link<?= $active('/about') ?>">About Us</a>
                <a href="/contact" class="nav-link<?= $active('/contact') ?>">Contact</a>
                <a href="/store" class="nav-link<?= $active('/store') ?>">Store</a>
            </div>

            <div class="site-nav__actions">
                <?php if ($isLoggedIn): ?>
                    <a href="/store/cart" class="site-nav__icon" aria-label="Cart<?= $cartCount ? ", $cartCount item" . ($cartCount === 1 ? '' : 's') : '' ?>">
                        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 7h12l-1 13H7L6 7Z" />
                            <path d="M9 7V6a3 3 0 0 1 6 0v1" />
                        </svg>
                        <?php if ($cartCount > 0): ?>
                            <span class="site-nav__badge"><?= $cartCount > 99 ? '99+' : $cartCount ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="<?= htmlspecialchars(SessionHelper::resolveHomeRouteForSession()) ?>" class="site-nav__icon site-nav__icon--profile" aria-label="My account">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                            <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4Z" />
                        </svg>
                    </a>
                <?php else: ?>
                    <a href="/login" class="site-btn site-btn--outline site-nav__desktop">Login</a>
                    <a href="/onboarding" class="site-btn site-nav__desktop">
                        Join Now
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                <?php endif; ?>

                <button class="site-nav__toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="site-nav__mobile" hidden>
            <a href="/" class="nav-link<?= $active('/') ?>">Home</a>
            <a href="/classes" class="nav-link<?= $active('/classes') ?>">Classes</a>
            <a href="/about" class="nav-link<?= $active('/about') ?>">About Us</a>
            <a href="/contact" class="nav-link<?= $active('/contact') ?>">Contact</a>
            <a href="/store" class="nav-link<?= $active('/store') ?>">Store</a>

            <?php if (!$isLoggedIn): ?>
                <div class="site-nav__mobile-actions">
                    <a href="/login" class="site-btn site-btn--outline">Login</a>
                    <a href="/onboarding" class="site-btn">
                        Join Now
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </nav>

    <!-- ─── Page content ─── -->
    <main class="site-main">
        <?= $content ?>
    </main>

    <!-- ─── Footer ─── -->
    <footer class="site-footer">
        <div class="site-footer__inner">
            <div class="site-footer__grid">

                <div class="site-footer__brand">
                    <a href="/" class="site-logo site-logo--lg">
                        <img src="/assets/images/logo_bg_removed.png" alt="" width="48" height="48">
                        <span>The Fitness <em>Hub</em></span>
                    </a>
                    <p>Anuradhapura's friendly, fully equipped gym. Train with coaches who plan your workouts and diet with you.</p>
                    <a href="https://www.facebook.com/p/The-Fitness-HUB-100050345780505/" class="site-footer__social" target="_blank" rel="noopener" aria-label="The Fitness Hub on Facebook">
                        <img src="/assets/images/icons/facebook-svgrepo-com.svg" alt="" width="20" height="20">
                    </a>
                </div>

                <div>
                    <p class="site-footer__title">Quick Links</p>
                    <ul class="site-footer__list">
                        <li><a href="/">Home</a></li>
                        <li><a href="/#programs">Programs</a></li>
                        <li><a href="/classes">Classes</a></li>
                        <li><a href="/#membership">Membership</a></li>
                        <li><a href="/store">Store</a></li>
                        <li><a href="/about">About Us</a></li>
                    </ul>
                </div>

                <div>
                    <p class="site-footer__title">Resources</p>
                    <ul class="site-footer__list">
                        <li><a href="#">Workout Library</a></li>
                        <li><a href="#">Nutrition Guide</a></li>
                        <li><a href="#">Member FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Use</a></li>
                    </ul>
                </div>

                <div>
                    <p class="site-footer__title">Contact</p>
                    <ul class="site-footer__list">
                        <li>No. 2664, Anuradhapura 50000</li>
                        <li><a href="tel:+94767788837">076 778 8837</a> (Lakmal)</li>
                        <li><a href="tel:+94767777773">076 777 7773</a></li>
                    </ul>
                    <a href="/onboarding" class="site-btn site-btn--sm">
                        Join Now
                        <svg viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="site-footer__bottom">
                <p>&copy; <?= date('Y') ?> The Fitness Hub, Anuradhapura. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        (function() {
            var btn = document.querySelector('.site-nav__toggle');
            var menu = document.getElementById('mobile-menu');
            if (!btn || !menu) return;
            btn.addEventListener('click', function() {
                var open = btn.getAttribute('aria-expanded') === 'true';
                btn.setAttribute('aria-expanded', String(!open));
                btn.setAttribute('aria-label', open ? 'Open menu' : 'Close menu');
                menu.hidden = open;
            });
        })();
    </script>
</body>

</html>