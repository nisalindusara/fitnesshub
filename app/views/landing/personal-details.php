<?php
// Default register page view for FitnessHub
?>

<div style="min-height: 100vh; display: flex; background-color: #0a0a0a; padding-top: 4rem;">
    <!-- Left panel — image -->
    <div style="display: none; position: relative; overflow: hidden; width: 50%;" id="register-left-panel">
        <img src="https://images.unsplash.com/photo-1541534741688-6078c6bfb5c5?w=800&h=1200&fit=crop&auto=format" alt="Gym training" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;" />
        <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.6), rgba(0,0,0,0.3), transparent);"></div>
        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent, rgba(0,0,0,0.4));"></div>
        
        <!-- Stats overlay -->
        <div style="position: absolute; bottom: 4rem; left: 2.5rem; right: 2.5rem; display: flex; flex-direction: column; gap: 1.25rem;">
            <div style="display: flex; align-items: baseline; gap: 1rem; border-left: 2px solid #E31837; padding-left: 1.25rem;">
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 2.25rem; font-weight: 900; color: white;">500+</span>
                <span style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.5); font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">Active Members</span>
            </div>
            <div style="display: flex; align-items: baseline; gap: 1rem; border-left: 2px solid #E31837; padding-left: 1.25rem;">
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 2.25rem; font-weight: 900; color: white;">12+</span>
                <span style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.5); font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">Certified Trainers</span>
            </div>
            <div style="display: flex; align-items: baseline; gap: 1rem; border-left: 2px solid #E31837; padding-left: 1.25rem;">
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 2.25rem; font-weight: 900; color: white;">30+</span>
                <span style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.5); font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">Weekly Classes</span>
            </div>
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
    <style>@media (min-width: 1024px) { #register-left-panel { display: block !important; } }</style>

    <!-- Right panel — form -->
    <div style="flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 4rem 2rem; position: relative; overflow-y: auto;">
        <!-- Mobile logo -->
        <div style="margin-bottom: 2.5rem; display: block;" id="register-mobile-logo">
            <a href="/" style="display: flex; align-items: center; gap: 0.625rem; text-decoration: none;">
                <img src="/assets/images/Logo_Background_Removed.png" alt="Logo" style="width: 40px; height: 40px; object-fit: contain;" />
                <span style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; letter-spacing: 0.05em; color: white; text-transform: uppercase;">
                    The Fitness <span style="color: #E31837;">Hub</span>
                </span>
            </a>
        </div>
        <style>@media (min-width: 1024px) { #register-mobile-logo { display: none !important; } }</style>

        <div style="max-width: 28rem; width: 100%; margin: 0 auto;">
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 0.75rem; margin-top: 0;">
                New Member
            </p>
            <h1 style="font-family: 'Barlow Condensed', sans-serif; font-size: 3rem; font-weight: 900; text-transform: uppercase; color: white; line-height: 0.9; letter-spacing: -0.02em; margin-bottom: 0.5rem; margin-top: 0;">
                Create Account
            </h1>
            <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.4); font-size: 0.875rem; font-weight: 500; margin-bottom: 2.5rem; margin-top: 0;">
                Fill in your details to get started with FitnessHub.
            </p>

            <!-- Form -->
            <form onsubmit="event.preventDefault(); window.location.href='/dashboard';" style="display: flex; flex-direction: column; gap: 1.25rem;">
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                    <div>
                        <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                            First Name
                        </label>
                        <input type="text" placeholder="Kasun" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                    </div>
                    <div>
                        <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                            Last Name
                        </label>
                        <input type="text" placeholder="Perera" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                    </div>
                </div>

                <div>
                    <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                        Email Address
                    </label>
                    <input type="email" placeholder="kasun@example.com" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                </div>

                <div>
                    <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                        Phone Number
                    </label>
                    <input type="tel" placeholder="+94 77 123 4567" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                </div>

                <div>
                    <label style="display: block; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 0.5rem;">
                        Password
                    </label>
                    <div style="position: relative;">
                        <input type="password" id="register-password" placeholder="Min 8 characters" required style="width: 100%; box-sizing: border-box; background-color: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: white; padding: 0.875rem 3rem 0.875rem 1rem; font-family: 'Barlow', sans-serif; font-size: 0.875rem; font-weight: 500; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='#E31837'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                        <button type="button" onclick="var input=document.getElementById('register-password'); if(input.type==='password'){input.type='text';}else{input.type='password';}" style="position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: none; border: none; padding: 0; cursor: pointer; color: rgba(255,255,255,0.3); transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.3)'">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div style="margin-top: 0.5rem; display: flex; flex-direction: column; gap: 0.75rem;">
                    <button type="submit" style="width: 100%; font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; border: none; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                        Create My Account <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    
                    <a href="/login?action=welcome" style="display: flex; align-items: center; justify-content: center; width: 100%; box-sizing: border-box; background-color: transparent; border: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.4); font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.875rem; font-size: 0.875rem; cursor: pointer; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.borderColor='rgba(255,255,255,0.3)'; this.style.color='white'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)'; this.style.color='rgba(255,255,255,0.4)'">
                        Back
                    </a>
                </div>
            </form>

            <p style="font-family: 'Barlow', sans-serif; text-align: center; color: rgba(255,255,255,0.3); font-size: 0.875rem; font-weight: 500; margin-top: 2rem; margin-bottom: 0;">
                Already have an account?{' '}
                <a href="/login" style="color: #E31837; font-weight: 700; text-decoration: none; letter-spacing: 0.025em; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.8'" onmouseout="this.style.opacity='1'">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</div>
