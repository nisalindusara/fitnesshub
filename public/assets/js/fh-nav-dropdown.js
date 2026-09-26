(function () {

    const byId = (id) => document.getElementById(id);


    /*
     * =====================================================
     * MEMBERSHIP PLAN FORM SUMMARY
     * =====================================================
     */

    function updateSummary() {

        const name = byId('plan_name');
        const duration = byId('duration');
        const unit = byId('duration_unit');
        const price = byId('price');
        const pt = byId('included_pt_sessions');

        const status = document.querySelector(
            'input[name="status"]:checked'
        );

        const summaryPlanName = byId('summaryPlanName');

        /*
         * List/details pages do not contain the form.
         */
        if (!name || !summaryPlanName) {
            return;
        }


        /* Plan name */

        summaryPlanName.textContent =
            name.value.trim() || 'Not set';


        /* Duration */

        const summaryDuration =
            byId('summaryDuration');

        if (summaryDuration) {

            const value =
                duration?.value || 0;

            const label =
                unit?.value === 'months'
                    ? 'Months'
                    : 'Days';

            summaryDuration.textContent =
                `${value} ${label}`;
        }


        /* Price */

        const summaryPrice =
            byId('summaryPrice');

        if (summaryPrice) {

            const numericPrice =
                Number(price?.value || 0);

            summaryPrice.textContent =
                `LKR ${numericPrice.toLocaleString(
                    'en-LK',
                    {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }
                )}`;
        }


        /* PT sessions */

        const summaryPt =
            byId('summaryPt');

        if (summaryPt) {

            summaryPt.textContent =
                pt?.value || 0;
        }


        /* Status */

        const summaryStatus =
            byId('summaryStatus');

        if (summaryStatus) {

            const isActive =
                (status?.value || 'ACTIVE')
                === 'ACTIVE';

            summaryStatus.textContent =
                isActive
                    ? 'Active'
                    : 'Inactive';

            summaryStatus.classList.toggle(
                'mp-badge--active',
                isActive
            );

            summaryStatus.classList.toggle(
                'mp-badge--inactive',
                !isActive
            );
        }
    }


    [
        'plan_name',
        'duration',
        'duration_unit',
        'price',
        'included_pt_sessions'

    ].forEach(function (id) {

        const element = byId(id);

        if (!element) {
            return;
        }

        element.addEventListener(
            'input',
            updateSummary
        );

        element.addEventListener(
            'change',
            updateSummary
        );
    });


    document
        .querySelectorAll(
            'input[name="status"]'
        )
        .forEach(function (element) {

            element.addEventListener(
                'change',
                updateSummary
            );
        });


    updateSummary();



    /*
     * =====================================================
     * ACTION POPUP MENU
     * =====================================================
     *
     * IMPORTANT:
     *
     * The dropdown is moved temporarily to document.body.
     *
     * This means table overflow cannot clip the popup.
     * It behaves like a real floating popup.
     */


    let activeMenu = null;
    let activeWrapper = null;


    function closeMenu() {

        if (!activeMenu) {
            return;
        }


        activeMenu.classList.remove(
            'is-open'
        );


        /*
         * Put the menu back inside its original wrapper.
         */
        if (activeWrapper) {

            activeWrapper.appendChild(
                activeMenu
            );
        }


        /*
         * Remove fixed coordinates.
         */
        activeMenu.style.top = '';
        activeMenu.style.left = '';
        activeMenu.style.right = '';


        activeMenu = null;
        activeWrapper = null;
    }



    
 {

        const wrapper =
            button.closest(
                '.mp-menu-wrap'
            );

        if (!wrapper) {
            return;
        }


        const menu =
            wrapper.querySelector(
                '[data-menu]'
            );

        if (!menu) {
            return;
        }


        /*
         * If this exact menu is already open,
         * clicking the button again closes it.
         */
        if (activeMenu === menu) {

            closeMenu();

            return;
        }


        /*
         * Close previously opened menu.
         */
        closeMenu();


        activeMenu = menu;
        activeWrapper = wrapper;


        /*
         * MOVE MENU TO BODY.
         *
         * This is the important fix.
         */
        document.body.appendChild(
            menu
        );


        menu.classList.add(
            'is-open'
        );


        /*
         * Get button position relative to browser viewport.
         */
        const buttonRect =
            button.getBoundingClientRect();


        /*
         * Measure menu after displaying it.
         */
        const menuWidth =
            menu.offsetWidth;

        const menuHeight =
            menu.offsetHeight;


        const gap = 6;

        const screenPadding = 10;


        /*
         * Horizontal position:
         * align popup right edge with three-dot button.
         */
        let left =
            buttonRect.right -
            menuWidth;


        /*
         * Prevent menu going outside right/left edge.
         */
        if (
            left < screenPadding
        ) {

            left =
                screenPadding;
        }


        if (
            left + menuWidth >
            window.innerWidth -
            screenPadding
        ) {

            left =
                window.innerWidth -
                menuWidth -
                screenPadding;
        }



        /*
         * Normally open below.
         */
        let top =
            buttonRect.bottom +
            gap;


        /*
         * If there isn't enough room below,
         * automatically open ABOVE the button.
         */
        if (
            top +
            menuHeight >
            window.innerHeight -
            screenPadding
        ) {

            top =
                buttonRect.top -
                menuHeight -
                gap;
        }


        /*
         * Safety check for top edge.
         */
        if (
            top <
            screenPadding
        ) {

            top =
                screenPadding;
        }


        menu.style.left =
            `${left}px`;

        menu.style.top =
            `${top}px`;
    }



    /*
     * Attach menu buttons.
     */

    document
        .querySelectorAll(
            '[data-menu-button]'
        )
        .forEach(function (button) {

            button.addEventListener(
                'click',
                function (event) {

                    event.preventDefault();

                    event.stopPropagation();

                    openMenu(button);
                }
            );
        });



    /*
     * Menu click must not close before
     * the selected View/Edit/Deactivate action runs.
     */

    document.addEventListener(
        'click',
        function (event) {

            if (
                activeMenu &&
                activeMenu.contains(
                    event.target
                )
            ) {

                return;
            }

            closeMenu();
        }
    );



    /*
     * If the user scrolls or resizes,
     * close the floating menu.
     */

    window.addEventListener(
        'scroll',
        closeMenu,
        true
    );


    window.addEventListener(
        'resize',
        closeMenu
    );



    /*
     * =====================================================
     * DEACTIVATE MODAL
     * =====================================================
     */

    const modal =
        byId('deactivateModal');



    function openDeactivate(button) {

        if (!modal) {
            return;
        }


        /*
         * Close action dropdown first.
         */
        closeMenu();


        const modalPlanId =
            byId('modalPlanId');

        const modalPlanName =
            byId('modalPlanName');

        const modalSummaryName =
            byId('modalSummaryName');

        const modalSummaryDuration =
            byId(
                'modalSummaryDuration'
            );

        const modalSummaryPrice =
            byId(
                'modalSummaryPrice'
            );

        const modalSummaryPt =
            byId(
                'modalSummaryPt'
            );



        if (modalPlanId) {

            modalPlanId.value =
                button.dataset.planId ||
                '';
        }


        if (modalPlanName) {

            modalPlanName.textContent =
                button.dataset.planName ||
                'This plan';
        }


        if (modalSummaryName) {

            modalSummaryName.textContent =
                button.dataset.planName ||
                'Plan';
        }


        if (modalSummaryDuration) {

            modalSummaryDuration.textContent =
                `${
                    button.dataset
                        .planDuration || 0
                } Days`;
        }


        if (modalSummaryPrice) {

            modalSummaryPrice.textContent =
                `LKR ${
                    button.dataset
                        .planPrice ||
                    '0.00'
                }`;
        }


        if (modalSummaryPt) {

            modalSummaryPt.textContent =
                `${
                    button.dataset
                        .planPt || 0
                } PT Sessions`;
        }


        modal.hidden = false;


        document.body.style.overflow =
            'hidden';
    }



    function closeDeactivate() {

        if (!modal) {
            return;
        }


        modal.hidden = true;


        document.body.style.overflow =
            '';
    }



    /*
     * Deactivate buttons.
     *
     * Event delegation is used because the
     * action menu is moved to <body>.
     */

    document.addEventListener(
        'click',
        function (event) {

            const button =
                event.target.closest(
                    '[data-deactivate-open]'
                );


            if (!button) {
                return;
            }


            event.preventDefault();

            event.stopPropagation();


            openDeactivate(
                button
            );
        }
    );



    /*
     * Modal Cancel
     */

    document
        .querySelectorAll(
            '[data-deactivate-close]'
        )
        .forEach(function (button) {

            button.addEventListener(
                'click',
                closeDeactivate
            );
        });



    /*
     * Click dark modal background.
     */

    if (modal) {

        modal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target === modal
                ) {

                    closeDeactivate();
                }
            }
        );
    }



    /*
     * ESC key.
     */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key !== 'Escape'
            ) {

                return;
            }


            closeMenu();

            closeDeactivate();
        }
    );

})();