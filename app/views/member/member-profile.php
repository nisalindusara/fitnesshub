<style>
    .profile-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        align-self: flex-start;
        padding: 32px 10px;
        gap: 16px;
        width: 100%;
        max-width: 808px;
        background: #FFFFFF;
        border-radius: 24px;
    }

    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 8px;
    }

    .avatar-wrapper {
        position: relative;
        width: 90px;
        height: 90px;
        margin-bottom: 12px;
    }

    .avatar-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }

    .edit-avatar-badge {
        position: absolute;
        right: 0px;
        bottom: 0px;
        width: 32px;
        height: 32px;
        background: #E2231C;
        border: 2px solid #FFFFFF;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        padding: 0;
    }

    .profile-name {
        font-weight: 400;
        font-size: 24px;
        line-height: 30px;
        color: #000000;
        margin: 0 0 4px 0;
    }

    .profile-subtitle {
        font-weight: 400;
        font-size: 13px;
        line-height: 18px;
        color: rgba(0, 0, 0, 0.6);
        margin: 0;
    }

    .menu-card {
        display: flex;
        flex-direction: column;
        width: 350px;
        background: #E8E8E8;
        border-radius: 22px;
        padding: 8px 20px;
        box-sizing: border-box;
    }

    .menu-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 0;
        border-bottom: 1px solid rgba(28, 28, 28, 0.1);
        text-decoration: none;
        color: #000000;
        transition: opacity 0.2s ease;
    }

    .menu-item:last-child {
        border-bottom: none;
    }

    .menu-item:hover {
        opacity: 0.7;
    }

    .menu-label {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .nav-icon {
        color: #000000;
    }

    .menu-text {
        font-size: 15px;
        line-height: 22px;
    }

    .logout-form {
        margin-top: 16px;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .logout-button {
        background: #E2231C;
        color: #FFFFFF;
        font-family: inherit;
        font-size: 20px;
        line-height: 18px;
        padding: 15px 30px;
        border-radius: 11px;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .logout-button:hover {
        background: #C91C16;
    }
</style>

<div class="profile-container">
    <header class="profile-header">
        <div class="avatar-wrapper">
            <img src="https://images.unsplash.com/photo-1615109398623-88346a601842?q=80&w=200&auto=format&fit=crop" alt="Profile Picture" class="avatar-image">
            <button class="edit-avatar-badge" aria-label="Edit profile picture">
                <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 10.5C1.0875 10.5 0.734375 10.3531 0.440625 10.0594C0.146875 9.76562 0 9.4125 0 9V3C0 2.5875 0.146875 2.23438 0.440625 1.94063C0.734375 1.64687 1.0875 1.5 1.5 1.5H3.15L4.5 0H9.5L10.85 1.5H12.5C12.9125 1.5 13.2656 1.64687 13.5594 1.94063C13.8531 2.23438 14 2.5875 14 3V9C14 9.4125 13.8531 9.76562 13.5594 10.0594C13.2656 10.3531 12.9125 10.5 12.5 10.5H1.5ZM7 8.625C7.725 8.625 8.34375 8.36875 8.85625 7.85625C9.36875 7.34375 9.625 6.725 9.625 6C9.625 5.275 9.36875 4.65625 8.85625 4.14375C8.34375 3.63125 7.725 3.375 7 3.375C6.275 3.375 5.65625 3.63125 5.14375 4.14375C4.63125 4.65625 4.375 5.275 4.375 6C4.375 6.725 4.63125 7.34375 5.14375 7.85625C5.65625 8.36875 6.275 8.625 7 8.625Z" fill="white" />
                </svg>
            </button>
        </div>
        <h1 class="profile-name">John Fernando</h1>
        <p class="profile-subtitle">Member since 2024</p>
    </header>

    <section class="menu-card">
        <a href="/member/member-profile/personal-details" class="menu-item">
            <span class="menu-text">Personal Details</span>
            <svg class="chevron-icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 9L6 5L1.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <a href="/member/member-profile/order-history" class="menu-item">
            <span class="menu-text">Your Orders</span>
            <svg class="chevron-icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 9L6 5L1.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <a href="/member/member-profile/payment-history" class="menu-item">
            <span class="menu-text">Payment History</span>
            <svg class="chevron-icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 9L6 5L1.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>

    <section class="menu-card">
        <a href="/member/member-profile/notification-settings" class="menu-item">
            <div class="menu-label">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <span class="menu-text">Notification Settings</span>
            </div>
            <svg class="chevron-icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 9L6 5L1.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <a href="/member/member-profile/privacy-data" class="menu-item">
            <div class="menu-label">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                </svg>
                <span class="menu-text">Privacy & Data</span>
            </div>
            <svg class="chevron-icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 9L6 5L1.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <a href="#" class="menu-item">
            <div class="menu-label">
                <svg class="nav-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>
                <span class="menu-text">Help & Support</span>
            </div>
            <svg class="chevron-icon" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.5 9L6 5L1.5 1" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </section>

    <form action="/logout" method="post" class="logout-form">
        <button type="submit" class="logout-button">Logout</button>
    </form>
</div>