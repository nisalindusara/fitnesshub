<?php

/**
 * Create-order form. Static HTML/CSS is unchanged from your original,
 * except: wrapped in a real <form>, added hidden inputs for everything
 * JS needs to submit, made the toggle/method buttons interactive, and
 * added a live cart + summary calculation.
 */
?>
<style>
    /* --- original styles unchanged --- */
    .add-order-view {
        display: flex;
        flex-direction: column;
        width: 100%;
        background: #FFFFFF;
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    .view-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 28px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.1);
        box-sizing: border-box;
    }

    .header-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .icon-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        border-radius: 8px;
        cursor: pointer;
    }

    .breadcrumb-text {
        font-weight: 400;
        font-size: 14px;
        color: #000000;
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-cancel {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 8px 16px;
        height: 36px;
        background: transparent;
        border: 0.8px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-family: 'Inter';
        font-weight: 400;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.6);
        cursor: pointer;
        text-decoration: none;
    }

    .btn-complete {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px 20px;
        height: 36px;
        background: #1C1C1C;
        border: none;
        border-radius: 8px;
        font-family: 'Inter';
        font-weight: 500;
        font-size: 14px;
        color: #FFFFFF;
        cursor: pointer;
    }

    .btn-complete:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }

    .view-body {
        display: flex;
        flex-direction: column;
        padding: 16px 24px;
        overflow-y: auto;
        box-sizing: border-box;
        gap: 0;
    }

    .section-card {
        display: flex;
        flex-direction: column;
        padding: 20px;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.08);
        border-radius: 12px;
        box-sizing: border-box;
        width: 100%;
    }

    .section-label {
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.4);
        margin-bottom: 12px;
    }

    .mt-12 {
        margin-top: 12px;
    }

    .mt-16 {
        margin-top: 16px;
    }

    .mt-20 {
        margin-top: 20px;
    }

    .flex-1 {
        flex: 1;
    }

    .toggle-group {
        display: inline-flex;
        padding: 4px;
        gap: 4px;
        background: rgba(28, 28, 28, 0.05);
        border-radius: 8px;
    }

    .toggle-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 6px 16px;
        height: 32px;
        background: transparent;
        border: none;
        border-radius: 6px;
        font-family: 'Inter';
        font-weight: 500;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
        cursor: pointer;
    }

    .toggle-active {
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.08);
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1), 0px 1px 2px -1px rgba(0, 0, 0, 0.1);
        color: #1C1C1C;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        gap: 4px;
        width: 100%;
        position: relative;
    }

    .field-label {
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.55);
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
    }

    .text-input,
    .dropdown-select,
    .textarea-input {
        box-sizing: border-box;
        width: 100%;
        padding: 8px 12px;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-family: 'Inter';
        font-weight: 400;
        font-size: 14px;
        color: #1C1C1C;
        outline: none;
    }

    .text-input::placeholder,
    .textarea-input::placeholder {
        color: rgba(28, 28, 28, 0.3);
    }

    .search-icon {
        position: absolute;
        right: 12px;
        pointer-events: none;
    }

    .textarea-input {
        resize: vertical;
        min-height: 57px;
    }

    .empty-state {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 32px 0px;
        width: 100%;
        border: 0.8px dashed rgba(28, 28, 28, 0.12);
        border-radius: 12px;
        box-sizing: border-box;
    }

    .empty-state-text {
        font-weight: 400;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.3);
    }

    .grid-2-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        width: 100%;
    }

    .payment-methods-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    .shipping-methods-flex {
        display: flex;
        gap: 8px;
        width: 100%;
    }

    .method-btn {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 8px 12px;
        height: 37.6px;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.1);
        border-radius: 8px;
        font-family: 'Inter';
        font-weight: 400;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.6);
        cursor: pointer;
        box-sizing: border-box;
    }

    .active-method {
        background: rgba(28, 28, 28, 0.04);
        border: 0.8px solid #1C1C1C;
        font-weight: 500;
        color: #1C1C1C;
    }

    .dropdown-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1L5 5L9 1' stroke='%231C1C1C' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        padding-right: 32px;
    }

    .helper-text {
        font-weight: 400;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.35);
        margin-top: 2px;
    }

    .summary-list {
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0px;
    }

    .summary-label {
        font-weight: 400;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
    }

    .summary-val {
        font-weight: 400;
        font-size: 14px;
        color: #1C1C1C;
    }

    .total-row {
        border-top: 0.8px solid rgba(28, 28, 28, 0.07);
        margin-top: 4px;
        padding-top: 14px;
    }

    .total-label {
        font-weight: 600;
        font-size: 14px;
        color: #1C1C1C;
    }

    .total-val {
        font-weight: 600;
        font-size: 18px;
        color: #1C1C1C;
    }

    /* --- additions --- */
    .search-results {
        position: absolute;
        top: calc(100% + 4px);
        left: 0;
        right: 0;
        background: #FFF;
        border: 0.8px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        max-height: 220px;
        overflow-y: auto;
        z-index: 10;
        display: none;
    }

    .search-results.open {
        display: block;
    }

    .search-result-item {
        padding: 8px 12px;
        font-size: 14px;
        cursor: pointer;
    }

    .search-result-item:hover {
        background: rgba(28, 28, 28, 0.04);
    }

    .search-result-item.disabled {
        color: rgba(28, 28, 28, 0.3);
        cursor: not-allowed;
    }

    .search-result-item .meta {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.4);
    }

    .cart-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 16px;
    }

    .cart-table th,
    .cart-table td {
        text-align: left;
        padding: 8px 4px;
        font-size: 13px;
        border-bottom: 0.8px solid rgba(28, 28, 28, 0.06);
    }

    .cart-table th {
        color: rgba(28, 28, 28, 0.4);
        font-weight: 500;
        text-transform: uppercase;
        font-size: 11px;
    }

    .cart-qty-input {
        width: 50px;
        padding: 4px 6px;
        border: 0.8px solid rgba(28, 28, 28, 0.12);
        border-radius: 6px;
    }

    .cart-remove {
        color: #ED1C24;
        cursor: pointer;
        font-size: 12px;
        background: none;
        border: none;
    }

    .field-error {
        font-size: 12px;
        color: #ED1C24;
        margin-top: 2px;
        display: none;
    }

    .field-error.show {
        display: block;
    }

    .hidden-field {
        display: none;
    }
</style>

<form method="POST" action="/portal/orders" id="order-form">

    <div class="add-order-view">
        <header class="view-header">
            <div class="header-breadcrumb">
                <a href="/portal/orders" class="icon-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </a>
                <span class="breadcrumb-text">New Order</span>
            </div>
            <div class="header-actions">
                <a href="/portal/orders" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-complete" id="submit-btn" disabled>
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M2.5 7.5L5.5 10.5L11.5 3.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Complete Order
                </button>
            </div>
        </header>

        <div class="view-body">

            <!-- Customer -->
            <section class="section-card">
                <div class="section-label">CUSTOMER</div>
                <div class="toggle-group">
                    <button type="button" class="toggle-btn toggle-active" data-customer-type="member">Member</button>
                    <button type="button" class="toggle-btn" data-customer-type="guest">Guest</button>
                </div>

                <div id="member-fields" class="input-group mt-20">
                    <label class="field-label">Search by name or phone</label>
                    <div class="input-wrapper">
                        <input type="text" class="text-input" id="member-search" placeholder="Search members...">
                    </div>
                    <div class="search-results" id="member-results"></div>
                    <div class="field-error" id="member-error">Please select a member.</div>
                </div>

                <div id="guest-fields" class="input-group mt-20 hidden-field">
                    <label class="field-label">Guest Name</label>
                    <input type="text" class="text-input" id="guest_name_input" placeholder="Guest full name">
                    <label class="field-label mt-12">Guest Phone</label>
                    <input type="text" class="text-input" id="guest_phone_input" placeholder="07XXXXXXXX">
                </div>

                <input type="hidden" name="customer_type" id="customer_type" value="member">
                <input type="hidden" name="member_id" id="member_id">
                <input type="hidden" name="guest_name" id="guest_name">
                <input type="hidden" name="guest_phone" id="guest_phone">
            </section>

            <!-- Products -->
            <section class="section-card mt-16">
                <div class="section-label">PRODUCTS</div>
                <div class="input-group mt-12">
                    <label class="field-label">Search product by name or SKU</label>
                    <div class="input-wrapper">
                        <input type="text" class="text-input" id="product-search" placeholder="Search products...">
                    </div>
                    <div class="search-results" id="product-results"></div>
                </div>

                <div class="empty-state mt-16" id="cart-empty">
                    <span class="empty-state-text">No items added yet</span>
                </div>
                <table class="cart-table hidden-field" id="cart-table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Line Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cart-body"></tbody>
                </table>
                <div class="field-error" id="cart-error">Add at least one item.</div>
            </section>

            <!-- Payment & Fulfillment -->
            <section class="section-card mt-16">
                <div class="section-label">PAYMENT & FULFILLMENT</div>
                <div class="grid-2-col mt-12">
                    <div class="input-group">
                        <label class="field-label">Payment Method</label>
                        <div class="payment-methods-grid">
                            <button type="button" class="method-btn active-method" data-payment="cash">Cash</button>
                            <button type="button" class="method-btn" data-payment="card">Card</button>
                            <button type="button" class="method-btn" data-payment="bank_transfer">Bank Transfer</button>
                            <button type="button" class="method-btn" data-payment="other">Other</button>
                        </div>
                        <div id="payment-confirm-wrap" class="input-group mt-12 hidden-field">
                            <label class="field-label" style="display:flex; align-items:center; gap:6px; font-weight:400;">
                                <input type="checkbox" id="payment_confirmed">
                                I've confirmed this payment was received
                            </label>
                        </div>
                    </div>
                    <div class="input-group">
                        <label class="field-label">Order Status</label>
                        <select class="dropdown-select" name="status" id="status-select">
                            <option value="pending" selected>Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                        <span class="helper-text">Walk-in orders paid in full can be marked Completed directly.</span>
                    </div>
                </div>
                <div class="input-group mt-16">
                    <label class="field-label">Internal Notes (optional)</label>
                    <textarea class="textarea-input" name="notes" placeholder="e.g. member requested gift wrapping"></textarea>
                </div>

                <input type="hidden" name="payment_method" id="payment_method" value="cash">
                <input type="hidden" name="payment_confirmed" id="payment_confirmed_hidden" value="">
            </section>

            <!-- Shipping -->
            <section class="section-card mt-16">
                <div class="section-label">SELECT SHIPPING METHOD</div>
                <div class="input-group mt-12">
                    <label class="field-label">Shipping Method</label>
                    <div class="shipping-methods-flex" id="shipping-methods">
                        <?php foreach ($shippingMethods as $i => $method): ?>
                            <button type="button"
                                class="method-btn flex-1 <?= $i === 0 ? 'active-method' : '' ?>"
                                data-method-id="<?= (int) $method['id'] ?>"
                                data-key="<?= htmlspecialchars($method['key']) ?>"
                                data-cost="<?= (float) $method['base_cost'] ?>"
                                data-requires-address="<?= (int) $method['requires_address'] ?>">
                                <?= htmlspecialchars($method['name']) ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="input-group mt-16 hidden-field" id="address-field-wrap">
                    <label class="field-label">Shipping Address</label>
                    <textarea class="textarea-input" id="delivery_address" placeholder="Enter shipping address here"></textarea>
                    <div class="field-error" id="address-error">Delivery address is required for this shipping method.</div>
                </div>

                <input type="hidden" name="shipping_method_id" id="shipping_method_id"
                    value="<?= !empty($shippingMethods) ? (int) $shippingMethods[0]['id'] : '' ?>">
                <input type="hidden" name="delivery_address" id="delivery_address_hidden">
            </section>

            <!-- Summary -->
            <section class="section-card mt-16">
                <div class="summary-list">
                    <div class="summary-row"><span class="summary-label">Subtotal</span><span class="summary-val" id="sum-subtotal">Rs. 0.00</span></div>
                    <div class="summary-row"><span class="summary-label">Shipping</span><span class="summary-val" id="sum-shipping">Rs. 0.00</span></div>
                    <div class="summary-row"><span class="summary-label">Discount</span><span class="summary-val">Rs. 0.00</span></div>
                    <div class="summary-row"><span class="summary-label">Tax</span><span class="summary-val">Rs. 0.00</span></div>
                    <div class="summary-row total-row"><span class="total-label">Total</span><span class="total-val" id="sum-total">Rs. 0.00</span></div>
                </div>
            </section>

        </div>
    </div>

    <input type="hidden" name="items_json" id="items_json" value="[]">
</form>

<script>
    (function() {
        let cart = [];
        let selectedMemberId = null;

        // ---------- Customer type toggle ----------
        const customerToggleBtns = document.querySelectorAll('[data-customer-type]');
        customerToggleBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                customerToggleBtns.forEach(b => b.classList.remove('toggle-active'));
                btn.classList.add('toggle-active');
                const type = btn.dataset.customerType;
                document.getElementById('customer_type').value = type;
                document.getElementById('member-fields').classList.toggle('hidden-field', type !== 'member');
                document.getElementById('guest-fields').classList.toggle('hidden-field', type !== 'guest');
                validateForm();
            });
        });

        // ---------- Member search ----------
        const memberSearch = document.getElementById('member-search');
        const memberResults = document.getElementById('member-results');
        let memberDebounce;

        memberSearch.addEventListener('input', () => {
            clearTimeout(memberDebounce);
            const term = memberSearch.value.trim();
            if (term.length < 2) {
                memberResults.classList.remove('open');
                return;
            }

            memberDebounce = setTimeout(() => {
                fetch('/portal/members/search?q=' + encodeURIComponent(term))
                    .then(r => r.json())
                    .then(data => {
                        memberResults.innerHTML = '';
                        if (data.length === 0) {
                            memberResults.innerHTML = '<div class="search-result-item disabled">No members found</div>';
                        } else {
                            data.forEach(m => {
                                const el = document.createElement('div');
                                el.className = 'search-result-item';
                                el.textContent = m.display_name;
                                el.addEventListener('click', () => {
                                    selectedMemberId = m.member_id;
                                    document.getElementById('member_id').value = m.member_id;
                                    memberSearch.value = m.display_name;
                                    memberResults.classList.remove('open');
                                    validateForm();
                                });
                                memberResults.appendChild(el);
                            });
                        }
                        memberResults.classList.add('open');
                    });
            }, 250);
        });

        document.getElementById('guest_name_input').addEventListener('input', e => {
            document.getElementById('guest_name').value = e.target.value;
            validateForm();
        });
        document.getElementById('guest_phone_input').addEventListener('input', e => {
            document.getElementById('guest_phone').value = e.target.value;
            validateForm();
        });

        // ---------- Product search + cart ----------
        const productSearch = document.getElementById('product-search');
        const productResults = document.getElementById('product-results');
        let productDebounce;

        productSearch.addEventListener('input', () => {
            clearTimeout(productDebounce);
            const term = productSearch.value.trim();
            if (term.length < 2) {
                productResults.classList.remove('open');
                return;
            }

            productDebounce = setTimeout(() => {
                fetch('/portal/products/search?q=' + encodeURIComponent(term))
                    .then(r => r.json())
                    .then(data => {
                        productResults.innerHTML = '';
                        if (data.length === 0) {
                            productResults.innerHTML = '<div class="search-result-item disabled">No products found</div>';
                        } else {
                            data.forEach(p => {
                                const el = document.createElement('div');
                                el.className = 'search-result-item' + (p.in_stock ? '' : ' disabled');
                                el.innerHTML = p.display_name + '<div class="meta">' +
                                    (p.in_stock ? 'Rs. ' + p.price.toFixed(2) + ' — ' + p.stock_quantity + ' in stock' : 'Out of stock') +
                                    '</div>';
                                if (p.in_stock) {
                                    el.addEventListener('click', () => {
                                        addToCart(p);
                                        productResults.classList.remove('open');
                                        productSearch.value = '';
                                    });
                                }
                                productResults.appendChild(el);
                            });
                        }
                        productResults.classList.add('open');
                    });
            }, 250);
        });

        function addToCart(product) {
            const existing = cart.find(i => i.variant_id === product.variant_id);
            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({
                    variant_id: product.variant_id,
                    display_name: product.display_name,
                    price: product.price,
                    quantity: 1,
                    stock_quantity: product.stock_quantity,
                });
            }
            renderCart();
        }

        function renderCart() {
            const empty = document.getElementById('cart-empty');
            const table = document.getElementById('cart-table');
            const body = document.getElementById('cart-body');

            if (cart.length === 0) {
                empty.classList.remove('hidden-field');
                table.classList.add('hidden-field');
            } else {
                empty.classList.add('hidden-field');
                table.classList.remove('hidden-field');
            }

            body.innerHTML = '';
            cart.forEach((item, idx) => {
                const row = document.createElement('tr');
                row.innerHTML =
                    '<td>' + item.display_name + '</td>' +
                    '<td>Rs. ' + item.price.toFixed(2) + '</td>' +
                    '<td><input type="number" min="1" max="' + item.stock_quantity + '" value="' + item.quantity + '" class="cart-qty-input" data-idx="' + idx + '"></td>' +
                    '<td>Rs. ' + (item.price * item.quantity).toFixed(2) + '</td>' +
                    '<td><button type="button" class="cart-remove" data-idx="' + idx + '">Remove</button></td>';
                body.appendChild(row);
            });

            body.querySelectorAll('.cart-qty-input').forEach(input => {
                input.addEventListener('change', e => {
                    const idx = parseInt(e.target.dataset.idx, 10);
                    let qty = parseInt(e.target.value, 10) || 1;
                    qty = Math.max(1, Math.min(qty, cart[idx].stock_quantity));
                    cart[idx].quantity = qty;
                    renderCart();
                    updateSummary();
                });
            });

            body.querySelectorAll('.cart-remove').forEach(btn => {
                btn.addEventListener('click', e => {
                    const idx = parseInt(e.target.dataset.idx, 10);
                    cart.splice(idx, 1);
                    renderCart();
                    updateSummary();
                });
            });

            document.getElementById('items_json').value = JSON.stringify(
                cart.map(i => ({
                    variant_id: i.variant_id,
                    quantity: i.quantity
                }))
            );

            updateSummary();
            validateForm();
        }

        // ---------- Payment method ----------
        document.querySelectorAll('[data-payment]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('[data-payment]').forEach(b => b.classList.remove('active-method'));
                btn.classList.add('active-method');
                const method = btn.dataset.payment;
                document.getElementById('payment_method').value = method;

                const needsConfirm = method === 'bank_transfer' || method === 'other';
                document.getElementById('payment-confirm-wrap').classList.toggle('hidden-field', !needsConfirm);
                if (!needsConfirm) document.getElementById('payment_confirmed').checked = false;
            });
        });

        document.getElementById('payment_confirmed').addEventListener('change', e => {
            document.getElementById('payment_confirmed_hidden').value = e.target.checked ? '1' : '';
        });

        // ---------- Shipping method ----------
        let currentShippingCost = 0;
        let currentRequiresAddress = false;

        document.querySelectorAll('#shipping-methods [data-method-id]').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('#shipping-methods [data-method-id]').forEach(b => b.classList.remove('active-method'));
                btn.classList.add('active-method');
                document.getElementById('shipping_method_id').value = btn.dataset.methodId;
                currentShippingCost = parseFloat(btn.dataset.cost);
                currentRequiresAddress = btn.dataset.requiresAddress === '1';
                document.getElementById('address-field-wrap').classList.toggle('hidden-field', !currentRequiresAddress);
                updateSummary();
                validateForm();
            });
        });

        // Initialize from the default-active button on load
        const defaultShippingBtn = document.querySelector('#shipping-methods .active-method');
        if (defaultShippingBtn) {
            currentShippingCost = parseFloat(defaultShippingBtn.dataset.cost);
            currentRequiresAddress = defaultShippingBtn.dataset.requiresAddress === '1';
        }

        document.getElementById('delivery_address').addEventListener('input', e => {
            document.getElementById('delivery_address_hidden').value = e.target.value;
            validateForm();
        });

        // ---------- Summary ----------
        function updateSummary() {
            const subtotal = cart.reduce((sum, i) => sum + i.price * i.quantity, 0);
            const total = subtotal + currentShippingCost;
            document.getElementById('sum-subtotal').textContent = 'Rs. ' + subtotal.toFixed(2);
            document.getElementById('sum-shipping').textContent = 'Rs. ' + currentShippingCost.toFixed(2);
            document.getElementById('sum-total').textContent = 'Rs. ' + total.toFixed(2);
        }

        // ---------- Validation gating the submit button ----------
        function validateForm() {
            const customerType = document.getElementById('customer_type').value;
            const customerOk = customerType === 'member' ?
                !!document.getElementById('member_id').value :
                (document.getElementById('guest_name').value.trim() !== '' && document.getElementById('guest_phone').value.trim() !== '');

            const cartOk = cart.length > 0;
            const addressOk = !currentRequiresAddress || document.getElementById('delivery_address').value.trim() !== '';

            document.getElementById('member-error').classList.toggle('show', customerType === 'member' && !customerOk && memberSearch.value !== '');
            document.getElementById('cart-error').classList.toggle('show', !cartOk);
            document.getElementById('address-error').classList.toggle('show', currentRequiresAddress && !addressOk);

            document.getElementById('submit-btn').disabled = !(customerOk && cartOk && addressOk);
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', e => {
            if (!memberSearch.contains(e.target)) memberResults.classList.remove('open');
            if (!productSearch.contains(e.target)) productResults.classList.remove('open');
        });

        renderCart();
    })();
</script>