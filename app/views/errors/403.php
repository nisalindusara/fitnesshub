<style>
    .error-page {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;

    }

    .error-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0 24px;
        gap: 32px;
        max-width: 542px;
    }

    .error-code {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-end;
        width: 100%;
    }

    .error-digit {
        font-weight: 600;
        font-size: 220px;
        line-height: 1;
        color: #1C1C1C;
        text-align: center;
    }

    .error-image-placeholder {
        width: 200px;
        height: 218px;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .logo-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .error-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        max-width: 420px;
        text-align: center;
    }

    .error-heading {
        margin: 0;
        font-weight: 600;
        font-size: 24px;
        line-height: 1.33;
        /* 32px */
        color: #1C1C1C;
    }

    .error-description {
        margin: 0;
        font-weight: 400;
        font-size: 14px;
        line-height: 1.64;
        /* ~23px */
        color: rgba(28, 28, 28, 0.5);
    }

    .error-actions {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 12px;
    }

    .btn {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;
        height: 40px;
        border-radius: 12px;
        border: none;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        line-height: 20px;
        cursor: pointer;
        transition: opacity 0.2s ease, transform 0.1s ease;
    }

    .btn:active {
        transform: scale(0.98);
    }

    .btn-primary {
        background: #1C1C1C;
        color: #FFFFFF;
        font-weight: 600;
        min-width: 96px;
    }

    .btn-secondary {
        background: rgba(28, 28, 28, 0.05);
        color: #1C1C1C;
        font-weight: 400;
        min-width: 150px;
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        opacity: 0.85;
    }
</style>

<main class="error-page">
    <div class="error-content">

        <div class="error-code">
            <span class="error-digit">4</span>
            <div class="error-image-placeholder">
                <img src="/assets/images/logo_bg_removed.png" alt="FitnessHub Logo Placeholder" class="logo-img">
            </div>
            <span class="error-digit">3</span>
        </div>

        <div class="error-text">
            <h1 class="error-heading">Access Forbidden.</h1>
            <p class="error-description">You don't have permission to view this page.</p>
        </div>

        <div class="error-actions">
            <button class="btn btn-primary" onclick="history.back()">Go Back</button>
            <button class="btn btn-secondary">Contact Support</button>
        </div>

    </div>
</main>