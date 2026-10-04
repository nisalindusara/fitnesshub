<?php $pageStyles = ['staff/payment_module/review-bank-transfers']; ?>

<div id="staff-bank-transfer-queue-container">

    <div class="page-header">
        <button class="icon-btn" id="bank-queue-back-btn" aria-label="Back to payments" onclick="window.location.href='<?= Gate::allows('view_payments_overview') ? '/portal/payments' : '/portal' ?>'">
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