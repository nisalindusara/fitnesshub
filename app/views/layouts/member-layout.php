<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fitness Hub - Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="app-layout">
    <!-- Top Navigation Header -->
    <header class="top-header">
      <div class="header-container">
        <!-- Logo -->
        <a href="/" class="brand-logo" aria-label="The Fitness Hub">
          <img src="/assets/images/logo_bg_removed.png" alt="Logo" style="width: 48px; height: 48px;">
        </a>

        <!-- Header Actions -->
        <div class="header-actions">
          <button class="icon-btn" aria-label="Notifications" type="button">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
              <path d="M12 22C13.1 22 14 21.1 14 20H10C10 21.1 10.9 22 12 22ZM18 16V11C18 7.93 16.37 5.36 13.5 4.68V4C13.5 3.17 12.83 2.5 12 2.5C11.17 2.5 10.5 3.17 10.5 4V4.68C7.64 5.36 6 7.92 6 11V16L4 18V19H20V18L18 16Z"/>
            </svg>
          </button>

          <button class="icon-btn" aria-label="Profile" type="button">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
              <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z"/>
            </svg>
          </button>
        </div>
      </div>
    </header>

    <!-- Page Content Container -->
    <main style="padding-top: 4rem;">
        <?php echo $content; ?>
    </main>

    <!-- Floating Bottom Navigation Dock -->
    <aside class="bottom-dock-wrapper">
      <nav class="floating-dock" aria-label="Primary Navigation">
        <!-- Home (Active) -->
        <a href="#home" class="nav-item active" aria-current="page">
          <svg viewBox="0 0 24 24" class="nav-icon">
            <path d="M10 20V14H14V20H19V12H22L12 3L2 12H5V20H10Z"/>
          </svg>
          <span class="nav-label">Home</span>
        </a>

        <!-- Membership -->
        <a href="#membership" class="nav-item">
          <svg viewBox="0 0 24 24" class="nav-icon">
            <path d="M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3H19ZM19 19H5V8H19V19ZM7 10H17V12H7V10ZM7 14H14V16H7V14Z"/>
          </svg>
          <span class="nav-label">Membership</span>
        </a>

        <!-- Analytics -->
        <a href="#analytics" class="nav-item">
          <svg viewBox="0 0 24 24" class="nav-icon">
            <path d="M5 9.2H8V19H5V9.2ZM10.6 5H13.4V19H10.6V5ZM16.2 13H19V19H16.2V13Z"/>
          </svg>
          <span class="nav-label">Analytics</span>
        </a>

        <!-- Classes -->
        <a href="#classes" class="nav-item">
          <svg viewBox="0 0 24 24" class="nav-icon">
            <path d="M16 11C17.66 11 18.99 9.66 18.99 8C18.99 6.34 17.66 5 16 5C14.34 5 13 6.34 13 8C13 9.66 14.34 11 16 11ZM8 11C9.66 11 10.99 9.66 10.99 8C10.99 6.34 9.66 5 8 5C6.34 5 5 6.34 5 8C5 9.66 6.34 11 8 11ZM8 13C5.67 13 1 14.17 1 16.5V19H15V16.5C15 14.17 10.33 13 8 13ZM16 13C15.71 13 15.38 13.02 15.03 13.05C16.19 13.89 17 15.02 17 16.5V19H23V16.5C23 14.17 18.33 13 16 13Z"/>
          </svg>
          <span class="nav-label">Classes</span>
        </a>

        <!-- Message -->
        <a href="#message" class="nav-item">
          <svg viewBox="0 0 24 24" class="nav-icon">
            <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM9 11C8.45 11 8 10.55 8 10C8 9.45 8.45 9 9 9C9.55 9 10 9.45 10 10C10 10.55 9.55 11 9 11ZM15 11C14.45 11 14 10.55 14 10C14 9.45 14.45 9 15 9C15.55 9 16 9.45 16 10C16 10.55 15.55 11 15 11Z"/>
          </svg>
          <span class="nav-label">Message</span>
        </a>
      </nav>
    </aside>
  </div>

    <style>
        :root {
            --color-page-bg: #EAEAEF;
            --color-header-bg: #FFFFFF;
            --color-dock-bg: #FFFFFF;
            --color-dock-active: #E4E5EB;
            --color-icon-btn-bg: #E2E4E9;
            --color-text-primary: #18181B;
            --color-text-muted: #64748B;
            --font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --shadow-dock: 0 10px 30px -4px rgba(0, 0, 0, 0.08), 0 4px 8px -2px rgba(0, 0, 0, 0.04);
            }

            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            body {
            font-family: var(--font-family);
            background-color: var(--color-page-bg);
            color: var(--color-text-primary);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
            }

            .app-layout {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            }

            /* Top Header */
            .top-header {
            background-color: var(--color-header-bg);
            height: 76px;
            width: 100%;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .header-container {
            max-width: 1512px;
            height: 100%;
            margin: 0 auto;
            padding: 0 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            }

            .brand-logo {
            display: inline-flex;
            text-decoration: none;
            }

            .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            }

            .icon-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: var(--color-icon-btn-bg);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #475569;
            cursor: pointer;
            transition: all 0.2s ease;
            }

            .icon-btn:hover {
            background-color: #CBD5E1;
            color: var(--color-text-primary);
            }

            /* Main Content Area */
            .main-content {
            flex: 1;
            width: 100%;
            padding-bottom: 110px; /* Clearance for floating dock */
            }

            .content-container {
            max-width: 1512px;
            margin: 0 auto;
            padding: 36px 48px;
            }

            .welcome-heading {
            font-size: 24px;
            font-weight: 400;
            color: var(--color-text-primary);
            letter-spacing: -0.015em;
            }

            .welcome-heading strong {
            font-weight: 700;
            }

            /* Floating Dock */
            .bottom-dock-wrapper {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 50;
            max-width: calc(100% - 32px);
            }

            .floating-dock {
            background-color: var(--color-dock-bg);
            border-radius: 9999px;
            padding: 6px 10px;
            display: flex;
            align-items: center;
            gap: 6px;
            box-shadow: var(--shadow-dock);
            }

            .nav-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 9999px;
            text-decoration: none;
            color: var(--color-text-muted);
            font-size: 14px;
            font-weight: 500;
            transition: all 0.15s ease;
            white-space: nowrap;
            }

            .nav-icon {
            width: 18px;
            height: 18px;
            fill: currentColor;
            flex-shrink: 0;
            }

            .nav-item:hover {
            color: var(--color-text-primary);
            background-color: rgba(0, 0, 0, 0.04);
            }

            .nav-item.active {
            background-color: var(--color-dock-active);
            color: var(--color-text-primary);
            font-weight: 600;
            }

            /* Responsiveness */
            @media (max-width: 768px) {
            .header-container,
            .content-container {
                padding: 0 20px;
            }

            .top-header {
                height: 64px;
            }

            .content-container {
                padding-top: 24px;
            }

            .welcome-heading {
                font-size: 20px;
            }

            .bottom-dock-wrapper {
                bottom: 16px;
                width: calc(100% - 24px);
            }

            .floating-dock {
                width: 100%;
                justify-content: space-between;
                padding: 6px;
            }

            .nav-item {
                padding: 8px 12px;
                font-size: 12px;
                gap: 6px;
            }
            }

            @media (max-width: 520px) {
            .nav-item {
                padding: 8px 6px;
                flex-direction: column;
                gap: 4px;
                font-size: 11px;
            }

            .nav-icon {
                width: 20px;
                height: 20px;
            }
            }
    </style>

</body>
</html>