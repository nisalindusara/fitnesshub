<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Fitness Hub</title>
    <!-- Google Fonts for Barlow & Barlow Condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/tokens.css">
    <link rel="stylesheet" href="/assets/css/landing.css">
</head>
<body>

    <!-- Navigation Header -->
    <nav>
        <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem; height: var(--nav-height); display: flex; align-items: center; justify-content: space-between;">
            
            <a href="/" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none; flex-shrink: 0;">
                <img src="/assets/images/logo_bg_removed.png" alt="Company Logo" style="width: 44px; height: 44px;">
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; letter-spacing: 0.05em; color: #0a0a0a; text-transform: uppercase; line-height: 1; white-space: nowrap;">
                    The Fitness <span style="color: #E31837;">Hub</span>
                </span>
            </a>

            <!-- Desktop Links -->
            <div style="display: flex; align-items: center; gap: 2.5rem;" class="hide-on-mobile">
                <a href="/" class="nav-link <?= $currentRoute === '/' ? 'active' : '' ?>">Home</a>
                <a href="/classes" class="nav-link">Classes</a>
                <a href="/about" class="nav-link <?= $currentRoute === '/about' ? 'active' : '' ?>">About Us</a>
                <a href="/contact" class="nav-link">Contact</a>
                <a href="/onboarding?flow=store" class="nav-link">Store</a>
            </div>

            <!-- CTAs -->
            <?php if ($isLoggedIn): ?>
                <a href="/dashboard" class="profile-icon" aria-label="Go to dashboard">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                        <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/>
                    </svg>
                </a>
            <?php else: ?>
                <div style="display: flex; align-items: center; gap: 0.75rem;" class="hide-on-mobile">
                    <a href="/login" style="border: 1px solid #d1d5db; color: #0a0a0a; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.625rem 1.25rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                        Login
                    </a>
                    <a href="/personal-details" style="background-color: #E31837; color: white; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.625rem 1.25rem; display: flex; align-items: center; gap: 0.5rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                        Join Now
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                    </a>
                </div>
            <?php endif; ?>

            <!-- Mobile Hamburger -->
            <button onclick="document.getElementById('mobile-menu').style.display = document.getElementById('mobile-menu').style.display === 'none' ? 'flex' : 'none'" style="display: flex; flex-direction: column; gap: 0.375rem; padding: 0.5rem; background: none; border: none; cursor: pointer;" class="show-on-mobile">
                <span style="display: block; width: 1.5rem; height: 0.125rem; background-color: #0a0a0a;"></span>
                <span style="display: block; width: 1.5rem; height: 0.125rem; background-color: #0a0a0a;"></span>
                <span style="display: block; width: 1.5rem; height: 0.125rem; background-color: #0a0a0a;"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" style="display: none; flex-direction: column; gap: 1rem; padding: 1.5rem 2rem; background: white; border-top: 1px solid #f3f4f6;" class="show-on-mobile">
            <a href="/" class="nav-link mobile">Home</a>
            <a href="/classes" class="nav-link mobile">Classes</a>
            <a href="/about" class="nav-link mobile">About Us</a>
            <a href="/contact" class="nav-link mobile">Contact</a>
            <a href="/onboarding?flow=store" class="nav-link mobile">Store</a>
            
            <div style="display: flex; gap: 0.75rem; margin-top: 0.5rem;">
                <a href="/login" style="border: 1px solid #d1d5db; color: #0a0a0a; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.625rem 1.25rem; text-decoration: none; flex: 1; text-align: center;">Login</a>
                <a href="/onboarding?flow=get-started" style="background-color: #E31837; color: white; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.625rem 1.25rem; text-decoration: none; flex: 1; text-align: center; display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;">Join Now <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg></a>
            </div>
        </div>
    </nav>

    <!-- Page Content Container -->
    <main style="padding-top: 4rem;">
        <?php echo $content; ?>
    </main>

    <!-- Footer -->
    <footer style="background-color: white; border-top: 1px solid #e5e7eb; padding-top: 4rem; padding-bottom: 2rem;">
        <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2.5rem; padding-bottom: 3rem; border-bottom: 1px solid #f3f4f6;">
                
                <!-- Logo Col -->
                <div style="grid-column: span 2;">
                    <div style="margin-bottom: 1rem;">
                        <a href="/" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
                            <img src="/assets/images/logo_bg_removed.png" alt="Company Logo" style="width: 48px; height: 48px;">
                            <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.5rem; font-weight: 900; letter-spacing: 0.05em; color: #0a0a0a; text-transform: uppercase; line-height: 1; white-space: nowrap;">
                                The Fitness <span style="color: #E31837;">Hub</span>
                            </span>
                        </a>
                    </div>
                    <p style="font-family: 'Barlow', sans-serif; color: #9ca3af; font-size: 0.875rem; line-height: 1.625; margin-bottom: 1.5rem; max-width: 20rem;">
                        Sri Lanka's leading gym management platform. Train smarter, not harder.
                    </p>
                    <div style="display: flex; gap: 1rem;">
                        <a href="https://www.facebook.com/p/The-Fitness-HUB-100050345780505/" style="border: 1px solid black; border-radius: 50%; display: flex; justify-content:center; align-items: center; padding: 5px;"><img src="/assets/images/icons/facebook-svgrepo-com.svg" alt="Facebook Logo"  style="width: 1.25rem; height: 1.25rem"></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <p style="font-family: 'Barlow Condensed', sans-serif; color: #0a0a0a; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.25rem; margin-top: 0;">Quick Links</p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; font-family: 'Barlow', sans-serif;">
                        <li><a href="/" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Home</a></li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Programs</a></li>
                        <li><a href="/classes" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Classes</a></li>
                        <li><a href="/onboarding?flow=membership" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Membership</a></li>
                        <li><a href="/onboarding?flow=store" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Store</a></li>
                        <li><a href="/about" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">About Us</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <p style="font-family: 'Barlow Condensed', sans-serif; color: #0a0a0a; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.25rem; margin-top: 0;">Resources</p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; font-family: 'Barlow', sans-serif;">
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Workout Library</a></li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Nutrition Guide</a></li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Trainer Blog</a></li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Member FAQ</a></li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Privacy Policy</a></li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Terms of Use</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <p style="font-family: 'Barlow Condensed', sans-serif; color: #0a0a0a; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1.25rem; margin-top: 0;">Contact</p>
                    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; font-family: 'Barlow', sans-serif;">
                        <li style="color: #9ca3af; font-size: 0.875rem; font-weight: 500; line-height: 1.625;">45 Galle Road, Colombo 03</li>
                        <li style="color: #9ca3af; font-size: 0.875rem; font-weight: 500;">+94 11 234 5678</li>
                        <li><a href="#" style="color: #9ca3af; font-size: 0.875rem; text-decoration: none; font-weight: 500;">info@fitnesshub.lk</a></li>
                    </ul>
                    <a href="/onboarding?flow=membership" style="font-family: 'Barlow', sans-serif; margin-top: 1.5rem; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.625rem 1.25rem; font-size: 0.75rem; display: inline-flex; align-items: center; gap: 0.5rem; text-decoration: none;">
                        Join Now <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div style="padding-top: 2rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <p style="font-family: 'Barlow', sans-serif; color: #6b7280; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; margin: 0;">
                    &copy; <?php echo date('Y'); ?> The Fitness Hub Sri Lanka. All Rights Reserved.
                </p>
                <p style="font-family: 'Barlow', sans-serif; color: #6b7280; font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; margin: 0;">
                    Designed for Champions
                </p>
            </div>
        </div>
    </footer>

    <style>
        body {
            margin: 0; 
            padding: 0; 
            background-color: var(--color-background);
        }
        nav {
            font-family: 'Barlow', sans-serif; 
            position: fixed; 
            top: 0; left: 0; right: 0; 
            z-index: 50; 
            background: white; 
            border-bottom: 1px solid #e5e7eb; 
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
        .nav-link {
            color: #9ca3af;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            text-decoration: none;
            position: relative;
            transition: color 0.2s;
        }
        .active {
            color: #0a0a0a;
        }
        .nav-link:hover { color: #0a0a0a; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; right: 0; left: 0;
            height: 2px;
            background-color: #E31837;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.2s;
        }
        .nav-link:hover::after { transform: scaleX(1); }
        
        @media (max-width: 768px) {
            .hide-on-mobile { display: none !important; }
        }
        @media (min-width: 769px) {
            .show-on-mobile { display: none !important; }
        }
    </style>
</body>
</html>