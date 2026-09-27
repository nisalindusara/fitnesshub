<style>
    /* Icon base (shared, but re-stated here explicitly) */
    .icon-svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        color: #1c1c1c;
    }

    .icon-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border: none;
        background: transparent;
        border-radius: 8px;
        cursor: pointer;
        padding: 0;
    }

    .icon-btn:hover {
        background: rgba(28, 28, 28, 0.05);
    }

    /* Toolbar above the list (title repeated inline per mock, pending count + refresh) */
    .queue-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        background: #f7f9fb;
        border-radius: 12px;
        margin-bottom: 16px;
    }

    .queue-title {
        font-size: 16px;
        font-weight: 700;
        color: #1c1c1c;
    }

    .queue-toolbar-right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pending-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        font-weight: 500;
        color: #e31837;
    }

    .pending-icon-svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .btn-refresh {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: rgba(28, 28, 28, 0.06);
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-family: "Inter", sans-serif;
        color: #1c1c1c;
        cursor: pointer;
    }

    .btn-refresh:hover {
        background: rgba(28, 28, 28, 0.1);
    }

    .refresh-icon-svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* List of queue rows */
    .queue-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .queue-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 20px;
        background: #fff;
        border: 1px solid rgba(28, 28, 28, 0.08);
        border-radius: 12px;
    }

    .queue-row-left {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
    }

    .queue-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }

    .queue-name {
        font-size: 14px;
        font-weight: 600;
        color: #1c1c1c;
        white-space: nowrap;
    }

    .queue-meta {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.4);
        white-space: nowrap;
    }

    .queue-time {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.3);
        white-space: nowrap;
    }

    .time-icon-svg {
        width: 12px;
        height: 12px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    /* Review button */
    .btn-review {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: #1c1c1c;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-family: "Inter", sans-serif;
        color: #fff;
        cursor: pointer;
        flex-shrink: 0;
    }

    .btn-review:hover {
        background: #2c2c2c;
    }

    .review-icon-svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .review-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.4);
        align-items: center;
        justify-content: center;
        z-index: 1000;
    }

    .review-modal-overlay.review-modal-overlay-open {
        display: flex;
    }

    .review-modal {
        width: 480px;
        height: 640px;
        overflow-y: auto;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        display: flex;
        flex-direction: column;
    }

    .review-modal-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 18px 20px;
    }

    .review-modal-title {
        font-size: 15px;
        font-weight: 700;
        color: #1c1c1c;
        margin: 0 0 4px;
    }

    .review-modal-subtitle {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.4);
        margin: 0;
    }

    .review-modal-close {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        border: none;
        background: rgba(28, 28, 28, 0.06);
        border-radius: 8px;
        cursor: pointer;
        flex-shrink: 0;
    }

    .review-modal-close:hover {
        background: rgba(28, 28, 28, 0.1);
    }

    .close-icon-svg {
        width: 14px;
        height: 14px;
        stroke: #1c1c1c;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .review-modal-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: #f7f9fb;
        display: block;
    }

    .review-modal-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    /* Rejection panel (hidden until Reject is clicked) */
    .rejection-panel {
        display: none;
        margin: 0 20px 16px;
        padding: 14px;
        background: #fdecec;
        border: 1px solid rgba(227, 24, 55, 0.2);
        border-radius: 10px;
    }

    .rejection-panel.rejection-panel-open {
        display: block;
    }

    .rejection-label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: #e31837;
        margin-bottom: 8px;
    }

    .rejection-textarea {
        width: 100%;
        min-height: 70px;
        padding: 10px 12px;
        border: 1px solid rgba(227, 24, 55, 0.25);
        border-radius: 8px;
        font-size: 13px;
        font-family: "Inter", sans-serif;
        color: #1c1c1c;
        background: #fff;
        resize: vertical;
        box-sizing: border-box;
    }

    .rejection-textarea:focus {
        outline: none;
        border-color: #e31837;
    }

    .rejection-panel-footer {
        display: flex;
        justify-content: flex-end;
        margin-top: 10px;
    }

    .btn-submit-rejection {
        padding: 8px 16px;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-family: "Inter", sans-serif;
        cursor: pointer;
        background: #f3a9ac;
        color: #fff;
    }

    .btn-submit-rejection:disabled {
        cursor: not-allowed;
        opacity: 0.85;
    }

    .btn-submit-rejection.btn-submit-rejection-active {
        background: #e31837;
    }

    .btn-submit-rejection.btn-submit-rejection-active:hover {
        background: #c21430;
    }

    /* Footer */
    .review-modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 20px;
        border-top: 1px solid rgba(28, 28, 28, 0.08);
    }

    .footer-icon-svg {
        width: 14px;
        height: 14px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .btn-reject {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: #fdecec;
        border: 1px solid rgba(227, 24, 55, 0.2);
        border-radius: 8px;
        font-size: 13px;
        font-family: "Inter", sans-serif;
        color: #e31837;
        cursor: pointer;
    }

    .btn-reject:hover {
        background: #fbd8d9;
    }

    .btn-approve {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: #1a9c5c;
        border: none;
        border-radius: 8px;
        font-size: 13px;
        font-family: "Inter", sans-serif;
        color: #fff;
        cursor: pointer;
    }

    .btn-approve:hover {
        background: #158049;
    }
</style>

<div id="staff-bank-transfer-queue-container">

    <div class="page-header">
        <button class="icon-btn" id="bank-queue-back-btn">
            <svg class="icon-svg" viewBox="0 0 24 24">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </button>
        <span class="page-title">Bank Transfer Queue</span>
    </div>

    <div class="content-body">

        <div class="queue-toolbar">
            <span class="queue-title">Bank Transfer Queue</span>
            <div class="queue-toolbar-right">
                <span class="pending-badge">
                    <svg class="pending-icon-svg" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" />
                        <path d="M12 7v5l3 3" />
                    </svg>
                    5 Pending
                </span>
                <button class="btn-refresh">
                    <svg class="refresh-icon-svg" viewBox="0 0 24 24">
                        <path d="M21 12a9 9 0 1 1-3-6.7" />
                        <path d="M21 4v6h-6" />
                    </svg>
                    Refresh
                </button>
            </div>
        </div>

        <div class="queue-list">

            <div class="queue-row">
                <div class="queue-row-left">
                    <img class="queue-avatar" src="https://i.pravatar.cc/40?img=14" alt="">
                    <span class="queue-name">Nipuna Fernando</span>
                    <span class="queue-meta">Membership — 3 months renewal</span>
                    <span class="queue-time">
                        <svg class="time-icon-svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7v5l3 3" />
                        </svg>
                        Submitted 2h ago
                    </span>
                </div>
                <button class="btn-review">
                    <svg class="review-icon-svg" viewBox="0 0 24 24">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    Review
                </button>
            </div>

            <div class="queue-row">
                <div class="queue-row-left">
                    <img class="queue-avatar" src="https://i.pravatar.cc/40?img=25" alt="">
                    <span class="queue-name">Sanduni Perera</span>
                    <span class="queue-meta">One Day Pass</span>
                    <span class="queue-time">
                        <svg class="time-icon-svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7v5l3 3" />
                        </svg>
                        Submitted 40m ago
                    </span>
                </div>
                <button class="btn-review">
                    <svg class="review-icon-svg" viewBox="0 0 24 24">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    Review
                </button>
            </div>

            <div class="queue-row">
                <div class="queue-row-left">
                    <img class="queue-avatar" src="https://i.pravatar.cc/40?img=33" alt="">
                    <span class="queue-name">Ashan Jayasuriya</span>
                    <span class="queue-meta">Personal Training — 10 sessions</span>
                    <span class="queue-time">
                        <svg class="time-icon-svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7v5l3 3" />
                        </svg>
                        Submitted 3h ago
                    </span>
                </div>
                <button class="btn-review">
                    <svg class="review-icon-svg" viewBox="0 0 24 24">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    Review
                </button>
            </div>

            <div class="queue-row">
                <div class="queue-row-left">
                    <img class="queue-avatar" src="https://i.pravatar.cc/40?img=48" alt="">
                    <span class="queue-name">Chamari Silva</span>
                    <span class="queue-meta">Membership — 1 year renewal</span>
                    <span class="queue-time">
                        <svg class="time-icon-svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7v5l3 3" />
                        </svg>
                        Submitted 5h ago
                    </span>
                </div>
                <button class="btn-review">
                    <svg class="review-icon-svg" viewBox="0 0 24 24">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    Review
                </button>
            </div>

            <div class="queue-row">
                <div class="queue-row-left">
                    <img class="queue-avatar" src="https://i.pravatar.cc/40?img=52" alt="">
                    <span class="queue-name">Dilshan Rathnayake</span>
                    <span class="queue-meta">Store — equipment purchase</span>
                    <span class="queue-time">
                        <svg class="time-icon-svg" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7v5l3 3" />
                        </svg>
                        Submitted 1d ago
                    </span>
                </div>
                <button class="btn-review">
                    <svg class="review-icon-svg" viewBox="0 0 24 24">
                        <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>
                    Review
                </button>
            </div>

            <!-- Review Model Overlay -->
            <div id="review-modal-overlay" class="review-modal-overlay">
                <div class="review-modal">

                    <div class="review-modal-header">
                        <div>
                            <h3 class="review-modal-title">Uploaded bank transfer</h3>
                            <p class="review-modal-subtitle">Nipuna Fernando &middot; Premium Plan &middot; 3 months renewal</p>
                        </div>
                        <button class="review-modal-close" id="review-modal-close-btn">
                            <svg class="close-icon-svg" viewBox="0 0 24 24">
                                <path d="M18 6 6 18M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="review-modal-image-wrap">
                        <img class="review-modal-image" src="/uploads/payments/1.jpg" alt="Uploaded bank transfer slip">
                    </div>

                    <div class="rejection-panel" id="rejection-panel">
                        <label class="rejection-label">Reason for rejection</label>
                        <textarea class="rejection-textarea" placeholder="Tell the member why this transfer was rejected..."></textarea>
                        <div class="rejection-panel-footer">
                            <button class="btn-submit-rejection" id="submit-rejection-btn" disabled>Submit rejection</button>
                        </div>
                    </div>

                    <div class="review-modal-footer">
                        <button class="btn-reject" id="reject-btn">
                            <svg class="footer-icon-svg" viewBox="0 0 24 24">
                                <path d="M18 6 6 18M6 6l12 12" />
                            </svg>
                            Reject
                        </button>
                        <button class="btn-approve" id="approve-btn">
                            <svg class="footer-icon-svg" viewBox="0 0 24 24">
                                <path d="M20 6 9 17l-5-5" />
                            </svg>
                            Approve
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    (function() {
        const overlay = document.getElementById('review-modal-overlay');
        const closeBtn = document.getElementById('review-modal-close-btn');
        const rejectBtn = document.getElementById('reject-btn');
        const rejectionPanel = document.getElementById('rejection-panel');
        const textarea = rejectionPanel.querySelector('.rejection-textarea');
        const submitRejectionBtn = document.getElementById('submit-rejection-btn');

        // Open modal from any .btn-review button in the queue list
        document.querySelectorAll('.btn-review').forEach(function(btn) {
            btn.addEventListener('click', function() {
                overlay.classList.add('review-modal-overlay-open');
            });
        });

        closeBtn.addEventListener('click', function() {
            overlay.classList.remove('review-modal-overlay-open');
        });

        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) {
                overlay.classList.remove('review-modal-overlay-open');
            }
        });

        // Reveal rejection panel when footer Reject is clicked
        rejectBtn.addEventListener('click', function() {
            rejectionPanel.classList.add('rejection-panel-open');
        });

        // Enable Submit rejection only once a reason is typed
        textarea.addEventListener('input', function() {
            const hasText = textarea.value.trim().length > 0;
            submitRejectionBtn.disabled = !hasText;
            submitRejectionBtn.classList.toggle('btn-submit-rejection-active', hasText);
        });
    })();
</script>