<?php
// Default login page view for FitnessHub
?>

<div style="min-height: 100vh; display: flex; background-color: #0a0a0a; padding-top: 4rem;">
    <!-- Left panel — image -->
    <div style="display: none; position: relative; overflow: hidden; width: 50%;" id="login-left-panel">
        <img src="https://images.unsplash.com/photo-1554284126-aa88f22d8b74?w=800&h=1200&fit=crop&auto=format" alt="Gym training" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;" />
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.3), transparent);"></div>
        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent, rgba(0,0,0,0.4));"></div>
        
        <!-- Quote overlay -->
        <div style="position: absolute; bottom: 4rem; left: 2.5rem; right: 2.5rem;">
            <p style="font-family: 'Barlow Condensed', sans-serif; color: white; font-size: 1.875rem; font-weight: 900; text-transform: uppercase; line-height: 1.25; letter-spacing: -0.02em; margin-bottom: 0.75rem; margin-top: 0;">
                "Every rep counts.<br />Every session matters."
            </p>
            <div style="display: flex; gap: 0.25rem; margin-bottom: 0.5rem;" id="login-stars">
                <!-- Stars rendered via CSS classes in main file or inline SVG here -->
                <svg width="18" height="18" viewBox="0 0 18 18" fill="#E31837"><path d="M9 1.5l2.09 4.26 4.7.68-3.4 3.32.8 4.69L9 12.27l-4.19 2.18.8-4.69-3.4-3.32 4.7-.68L9 1.5z" /></svg>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="#E31837"><path d="M9 1.5l2.09 4.26 4.7.68-3.4 3.32.8 4.69L9 12.27l-4.19 2.18.8-4.69-3.4-3.32 4.7-.68L9 1.5z" /></svg>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="#E31837"><path d="M9 1.5l2.09 4.26 4.7.68-3.4 3.32.8 4.69L9 12.27l-4.19 2.18.8-4.69-3.4-3.32 4.7-.68L9 1.5z" /></svg>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="#E31837"><path d="M9 1.5l2.09 4.26 4.7.68-3.4 3.32.8 4.69L9 12.27l-4.19 2.18.8-4.69-3.4-3.32 4.7-.68L9 1.5z" /></svg>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="#E31837"><path d="M9 1.5l2.09 4.26 4.7.68-3.4 3.32.8 4.69L9 12.27l-4.19 2.18.8-4.69-3.4-3.32 4.7-.68L9 1.5z" /></svg>
            </div>
            <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.5); font-size: 0.875rem; font-weight: 500; margin: 0;">
                Rated 5/5 by 500+ members across Sri Lanka
            </p>
        </div>
        
        <!-- Logo -->
        <div style="position: absolute; top: 2rem; left: 2.5rem; background-color: rgba(255,255,255,0.9); padding: 0.5rem 0.75rem; backdrop-filter: blur(4px);">
            <a href="/" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
                <img src="/assets/images/Logo_Background_Removed.png" alt="Logo" style="width: 36px; height: 36px; object-fit: contain;" />
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; letter-spacing: 0.05em; color: #0a0a0a; text-transform: uppercase;">
                    The Fitness <span style="color: #E31837;">Hub</span>
                </span>
            </a>
        </div>
    </div>
    <style>@media (min-width: 1024px) { #login-left-panel { display: block !important; } }</style>

    <!-- Right panel — form -->
    <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 4rem 2rem; position: relative;">
        <!-- Mobile logo -->
        <div style="margin-bottom: 2.5rem; display: block;" id="login-mobile-logo">
            <a href="/" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
                <img src="/assets/images/Logo_Background_Removed.png" alt="Logo" style="width: 40px; height: 40px; object-fit: contain;" />
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; letter-spacing: 0.05em; color: white; text-transform: uppercase;">
                    The Fitness <span style="color: #E31837;">Hub</span>
                </span>
            </a>
        </div>
        <style>@media (min-width: 1024px) { #login-mobile-logo { display: none !important; } }</style>

        <div style="max-width: 28rem; width: 100%; margin: 0 auto;">
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 0.75rem; margin-top: 0;">
                Welcome Back
            </p>
            <h1 style="font-family: 'Barlow Condensed', sans-serif; font-size: 3rem; font-weight: 900; text-transform: uppercase; color: white; line-height: 0.9; letter-spacing: -0.02em; margin-bottom: 0.5rem; margin-top: 0;">
                Sign In
            </h1>
            <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.4); font-size: 0.875rem; font-weight: 500; margin-bottom: 2.5rem; margin-top: 0;">
                Access your training dashboard, classes, and progress.
            </p>

            <!-- Form -->
            <form style="display: flex; flex-direction: column; gap: 1.25rem;" action="/login" method="POST">
                <div>
                    <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                        Email Address
                    </label>
                    <input type="email" name="email" placeholder="you@example.com" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                </div>

                <div>
                    <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                        Password
                    </label>
                    <div style="position: relative;">
                        <input type="password" name="password" id="login-password" placeholder="••••••••" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 3rem 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <button type="button" onclick="var input=document.getElementById('login-password'); if(input.type==='password'){input.type='text';}else{input.type='password';}" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0; cursor: pointer; color: rgba(255,255,255,0.3); transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </button>
                    </div>
                    <div style="display: flex; justify-content: flex-end; margin-top: 0.5rem;">
                        <a href="/login?action=forgot-password" style="font-family: 'Barlow', sans-serif; font-size: 0.75rem; color: #E31837; font-weight: 600; text-decoration: none; letter-spacing: 0.025em; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <?php if (!empty($error)): ?>
                    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
                
                <button type="submit" style="width: 100%; font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; border: none; cursor: pointer; margin-top: 0.5rem; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                    Sign In <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </button>
            </form>

            <!-- Divider -->
            <div style="display: flex; align-items: center; gap: 1rem; margin: 2rem 0;">
                <div style="flex: 1; height: 1px; background-color: rgba(255,255,255,0.1);"></div>
                <span style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.2); font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">or</span>
                <div style="flex: 1; height: 1px; background-color: rgba(255,255,255,0.1);"></div>
            </div>

            <!-- Social login -->
            <button type="button" style="width: 100%; font-family: 'Barlow', sans-serif; background-color: transparent; border: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.6); font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.875rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.borderColor='rgba(255,255,255,0.3)'; this.style.color='white'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='rgba(255,255,255,0.6)'">
                <svg width="18" height="18" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                Continue with Google
            </button>

            <p style="font-family: 'Barlow', sans-serif; text-align: center; color: rgba(255,255,255,0.3); font-size: 0.875rem; font-weight: 500; margin-top: 2rem; margin-bottom: 0;">
                Don't have an account?{' '}
                <a href="/login?action=welcome" style="color: #E31837; font-weight: 700; text-decoration: none; letter-spacing: 0.025em; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                    Create one
                </a>
            </p>
        </div>
    </div>
</div>
