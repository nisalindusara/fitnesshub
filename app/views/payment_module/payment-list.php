<style>
    /* Customer cell (not covered by portals.css) */
    .payments-customer {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .payments-customer img {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        object-fit: cover;
    }

    /* Two payment-specific status colors that don't already exist */
    .status-payment-pending {
        color: #2563eb;
    }

    .status-payment-progress {
        color: #6d28d9;
        background: #ede9fe;
        padding: 2px 10px;
        border-radius: 16px;
    }

    /* Toolbar buttons — no button styling exists in portals.css yet */
    #payments-record-btn {
        background: #1c1c1c;
        color: #fff;
        border: none;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
    }

    #payments-filter-btn,
    #payments-sort-btn {
        background: transparent;
        color: #1c1c1c;
        border: 1px solid rgba(28, 28, 28, 0.15);
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
        cursor: pointer;
    }

    /* Footer / pagination — page-specific, not in portals.css */
    #payments-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    #payments-footer-showing {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
    }

    #payments-footer-rows {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
    }

    #payments-rows-select {
        border: 1px solid rgba(28, 28, 28, 0.15);
        border-radius: 8px;
        padding: 4px 8px;
        font-size: 13px;
    }

    #payments-pagination {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    #payments-prev-btn,
    #payments-next-btn {
        background: #fff;
        border: 1px solid rgba(28, 28, 28, 0.15);
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 13px;
        color: #1c1c1c;
        cursor: pointer;
    }

    .page-btn {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        border: none;
        background: transparent;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        cursor: pointer;
    }

    .page-btn-active {
        background: #1c1c1c;
        color: #fff;
    }

    #payments-page-dots {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.3);
        padding: 0 4px;
    }
</style>

<div id="staff-payments-container">

    <div class="page-header">
        <span class="page-title">Payments</span>
    </div>

    <div class="content-body">

        <div class="toolbar">
            <div class="toolbar-actions">
                <button id="payments-record-btn" onclick="window.location.href='/portal/payments/record'">+ Record Payment</button>
                <button id="payments-filter-btn">&#9707; Filter</button>
                <button id="payments-sort-btn">&#8645; Sort</button>
            </div>
            <div class="search-box">
                <span>&#128269;</span>
                <input type="text" placeholder="Search payments...">
            </div>
        </div>

        <div class="card">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Payment ID</th>
                        <th>Date Time</th>
                        <th>Customer Name</th>
                        <th>Reason</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>#PR9801</td>
                        <td>&#128337; Just now</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=1" alt="">
                                <span>Natali Craig</span>
                            </div>
                        </td>
                        <td>Membership 1 Month</td>
                        <td>$400</td>
                        <td>Cash</td>
                        <td><span class="status-badge status-payment-progress"><span class="status-dot"></span>In Progress</span></td>
                    </tr>

                    <tr>
                        <td>#PR9802</td>
                        <td>&#128337; A minute ago</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=2" alt="">
                                <span>Kate Morrison</span>
                            </div>
                        </td>
                        <td>Membership 3 Months</td>
                        <td>$2,300</td>
                        <td>Card</td>
                        <td><span class="status-badge status-completed"><span class="status-dot"></span>Complete</span></td>
                    </tr>

                    <tr>
                        <td>#PR9803</td>
                        <td>&#128337; 1 hour ago</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=3" alt="">
                                <span>Drew Cano</span>
                            </div>
                        </td>
                        <td>Membership 3 Months</td>
                        <td>$2,300</td>
                        <td>Online</td>
                        <td><span class="status-badge status-payment-pending"><span class="status-dot"></span>Pending</span></td>
                    </tr>

                    <tr>
                        <td>#PR9804</td>
                        <td>&#128337; Yesterday</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=4" alt="">
                                <span>Drew Cano</span>
                            </div>
                        </td>
                        <td>One Day Pass</td>
                        <td>$4,000</td>
                        <td>Bank Transfer</td>
                        <td><span class="status-badge status-payment-pending"><span class="status-dot"></span>Pending</span></td>
                    </tr>

                    <tr>
                        <td>#PR9805</td>
                        <td>&#128337; A minute ago</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=5" alt="">
                                <span>Drew Cano</span>
                            </div>
                        </td>
                        <td>One Day Pass</td>
                        <td>$3,000</td>
                        <td>Bank Transfer</td>
                        <td><span class="status-badge status-ready_for_pickup"><span class="status-dot"></span>Approved</span></td>
                    </tr>

                    <tr>
                        <td>#PR9806</td>
                        <td>&#128337; 1 hour ago</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=6" alt="">
                                <span>Orlando Diggs</span>
                            </div>
                        </td>
                        <td>Store</td>
                        <td>$1,000</td>
                        <td>Bank Transfer</td>
                        <td><span class="status-badge status-payment-progress"><span class="status-dot"></span>In Progress</span></td>
                    </tr>

                    <tr>
                        <td>#PR9807</td>
                        <td>&#128337; Yesterday</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=7" alt="">
                                <span>Orlando Diggs</span>
                            </div>
                        </td>
                        <td>Store</td>
                        <td>$1,000</td>
                        <td>Bank Transfer</td>
                        <td><span class="status-badge status-completed"><span class="status-dot"></span>Complete</span></td>
                    </tr>

                    <tr>
                        <td>#CM9801</td>
                        <td>Feb 2, 2023</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=8" alt="">
                                <span>Natali Craig</span>
                            </div>
                        </td>
                        <td>Store</td>
                        <td>$1,000</td>
                        <td>Online</td>
                        <td><span class="status-badge status-completed"><span class="status-dot"></span>Complete</span></td>
                    </tr>

                    <tr>
                        <td>#CM9802</td>
                        <td>Feb 2, 2023</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=9" alt="">
                                <span>Natali Craig</span>
                            </div>
                        </td>
                        <td>Store</td>
                        <td>$1,000</td>
                        <td>Online</td>
                        <td><span class="status-badge status-payment-pending"><span class="status-dot"></span>Pending</span></td>
                    </tr>

                    <tr>
                        <td>#CM9803</td>
                        <td>Feb 2, 2023</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=10" alt="">
                                <span>Kate Morrison</span>
                            </div>
                        </td>
                        <td>Membership Renewal 1 Year</td>
                        <td>$2,000</td>
                        <td>Online</td>
                        <td><span class="status-badge status-ready_for_pickup"><span class="status-dot"></span>Approved</span></td>
                    </tr>

                    <tr>
                        <td>#CM9804</td>
                        <td>Feb 2, 2023</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=11" alt="">
                                <span>Drew Cano</span>
                            </div>
                        </td>
                        <td>Membership Renewal 3 Months</td>
                        <td>$3,500</td>
                        <td>Card</td>
                        <td><span class="status-badge status-ready_for_pickup"><span class="status-dot"></span>Approved</span></td>
                    </tr>

                    <tr>
                        <td>#CM9805</td>
                        <td>Feb 2, 2023</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=12" alt="">
                                <span>Orlando Diggs</span>
                            </div>
                        </td>
                        <td>Membership Renewal 1 Year</td>
                        <td>$700</td>
                        <td>Card</td>
                        <td><span class="status-badge status-ready_for_pickup"><span class="status-dot"></span>Approved</span></td>
                    </tr>

                    <tr>
                        <td>#CM9806</td>
                        <td>Feb 2, 2023</td>
                        <td>
                            <div class="payments-customer">
                                <img src="https://i.pravatar.cc/32?img=13" alt="">
                                <span>Andi Lane</span>
                            </div>
                        </td>
                        <td>Personal Training 10 Sessions</td>
                        <td>$3,200</td>
                        <td>Card</td>
                        <td><span class="status-badge status-ready_for_pickup"><span class="status-dot"></span>Approved</span></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div id="payments-footer">
            <span id="payments-footer-showing">Showing 1 to 13 of 48 payments</span>
            <div id="payments-footer-rows">
                <span>Rows</span>
                <select id="payments-rows-select">
                    <option>10</option>
                    <option selected>16</option>
                    <option>25</option>
                </select>
            </div>
            <div id="payments-pagination">
                <button id="payments-prev-btn">Previous</button>
                <button id="page-1" class="page-btn page-btn-active">1</button>
                <button id="page-2" class="page-btn">2</button>
                <button id="page-3" class="page-btn">3</button>
                <span id="payments-page-dots">...</span>
                <button id="page-4" class="page-btn">4</button>
                <button id="payments-next-btn">Next</button>
            </div>
        </div>

    </div>
</div>