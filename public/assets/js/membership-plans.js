(function () {
  const byId = (id) => document.getElementById(id);

  function updateSummary() {
    const name = byId('plan_name');
    const duration = byId('duration');
    const unit = byId('duration_unit');
    const price = byId('price');
    const pt = byId('included_pt_sessions');
    const status = document.querySelector('input[name="status"]:checked');
    if (!name || !byId('summaryPlanName')) return;

    byId('summaryPlanName').textContent = name.value.trim() || 'Not set';
    byId('summaryDuration').textContent = `${duration?.value || 0} ${unit?.value === 'months' ? 'Months' : 'Days'}`;
    byId('summaryPrice').textContent = `LKR ${Number(price?.value || 0).toLocaleString('en-LK', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    byId('summaryPt').textContent = pt?.value || 0;
    const statusEl = byId('summaryStatus');
    const active = (status?.value || 'ACTIVE') === 'ACTIVE';
    statusEl.textContent = active ? 'Active' : 'Inactive';
    statusEl.classList.toggle('mp-badge--active', active);
    statusEl.classList.toggle('mp-badge--inactive', !active);
  }

  ['plan_name','duration','duration_unit','price','included_pt_sessions'].forEach(id => {
    const el = byId(id);
    if (el) el.addEventListener('input', updateSummary);
    if (el) el.addEventListener('change', updateSummary);
  });
  document.querySelectorAll('input[name="status"]').forEach(el => el.addEventListener('change', updateSummary));
  updateSummary();

  document.querySelectorAll('[data-menu-button]').forEach(button => {
    button.addEventListener('click', (e) => {
      e.stopPropagation();
      const menu = button.parentElement.querySelector('[data-menu]');
      document.querySelectorAll('[data-menu].is-open').forEach(open => { if (open !== menu) open.classList.remove('is-open'); });
      menu?.classList.toggle('is-open');
    });
  });
  document.addEventListener('click', () => document.querySelectorAll('[data-menu].is-open').forEach(menu => menu.classList.remove('is-open')));

  const modal = byId('deactivateModal');
  function openDeactivate(button) {
    if (!modal) return;
    if (byId('modalPlanId')) byId('modalPlanId').value = button.dataset.planId || '';
    if (byId('modalPlanName')) byId('modalPlanName').textContent = button.dataset.planName || 'This plan';
    if (byId('modalSummaryName')) byId('modalSummaryName').textContent = button.dataset.planName || 'Plan';
    if (byId('modalSummaryDuration')) byId('modalSummaryDuration').textContent = `${button.dataset.planDuration || 0} Days`;
    if (byId('modalSummaryPrice')) byId('modalSummaryPrice').textContent = `LKR ${button.dataset.planPrice || '0.00'}`;
    if (byId('modalSummaryPt')) byId('modalSummaryPt').textContent = `${button.dataset.planPt || 0} PT Sessions`;
    modal.hidden = false;
  }
  function closeDeactivate() { if (modal) modal.hidden = true; }
  document.querySelectorAll('[data-deactivate-open]').forEach(btn => btn.addEventListener('click', () => openDeactivate(btn)));
  document.querySelectorAll('[data-deactivate-close]').forEach(btn => btn.addEventListener('click', closeDeactivate));
  if (modal) modal.addEventListener('click', e => { if (e.target === modal) closeDeactivate(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeDeactivate(); });
})();
function openMenu(button) {

    const wrapper = button.closest('.mp-menu-wrap');

    if (!wrapper) {
        return;
    }

    const menu = wrapper.querySelector('[data-menu]');

    if (!menu) {
        return;
    }

    if (activeMenu === menu) {
        closeMenu();
        return;
    }

    closeMenu();

    activeMenu = menu;
    activeWrapper = wrapper;

    document.body.appendChild(menu);

    menu.classList.add('is-open');

    requestAnimationFrame(function () {

        const buttonRect = button.getBoundingClientRect();
        const menuRect = menu.getBoundingClientRect();

        const menuWidth = menuRect.width;
        const menuHeight = menuRect.height;

        const gap = 8;
        const padding = 12;
        const viewportWidth =
            window.visualViewport
                ? window.visualViewport.width
                : window.innerWidth;

        const viewportHeight =
            window.visualViewport
                ? window.visualViewport.height
                : window.innerHeight;

        const viewportTop =
            window.visualViewport
                ? window.visualViewport.offsetTop
                : 0;

        let left =
            buttonRect.right -
            menuWidth;
        if (
            left + menuWidth >
            viewportWidth - padding
        ) {
            left =
                viewportWidth -
                menuWidth -
                padding;
        }
        if (left < padding) {
            left = padding;
        }


        const availableBelow =
            viewportHeight -
            buttonRect.bottom -
            padding;

        const availableAbove =
            buttonRect.top -
            viewportTop -
            padding;

        let top;
        if (
            availableBelow >=
            menuHeight + gap
        ) {

            top =
                buttonRect.bottom +
                gap;

        } else if (
            availableAbove >=
            menuHeight + gap
        ) {

            top =
                buttonRect.top -
                menuHeight -
                gap;

        } else {


            top =
                viewportTop +
                viewportHeight -
                menuHeight -
                padding;
        }
        const minimumTop =
            viewportTop + padding;

        const maximumTop =
            viewportTop +
            viewportHeight -
            menuHeight -
            padding;

        top = Math.max(
            minimumTop,
            Math.min(top, maximumTop)
        );


        menu.style.left =
            `${Math.round(left)}px`;

        menu.style.top =
            `${Math.round(top)}px`;

        menu.style.right = 'auto';
        menu.style.bottom = 'auto';
    });
}