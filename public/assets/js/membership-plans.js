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
