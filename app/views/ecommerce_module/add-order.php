<?php
$pageStyles = ['staff/ecommerce_module/add-order'];

/**
 * Create-order form. Static HTML/CSS is unchanged from your original,
 * except: wrapped in a real <form>, added hidden inputs for everything
 * JS needs to submit, made the toggle/method buttons interactive, and
 * added a live cart + summary calculation.
 */
?>

<form method="POST" action="/portal/orders/create" id="order-form">

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
                fetch('/api/members/search?q=' + encodeURIComponent(term))
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
                fetch('/api/products/search?q=' + encodeURIComponent(term))
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