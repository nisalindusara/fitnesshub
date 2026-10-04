<?php $pageStyles = ['landing/errors/_error-page']; ?>

<main class="error-page">
    <div class="error-content">

        <div class="error-code">
            <span class="error-digit">4</span>
            <div class="error-image-placeholder">
                <img src="/assets/images/logo_bg_removed.png" alt="FitnessHub Logo Placeholder" class="logo-img">
            </div>
            <span class="error-digit">4</span>
        </div>

        <div class="error-text">
            <h1 class="error-heading">Oops! We don’t have what you are looking for.</h1>
            <p class="error-description">The page you're looking for isn't on the schedule.</p>
        </div>

        <div class="error-actions">
            <button class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button class=" btn btn-secondary">Contact Support</button>
        </div>

    </div>
</main>