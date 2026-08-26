/**
 * <fh-nav-dropdown label="Payments" icon="credit-card" current-route="payments.add">
 *   <fh-nav-item slot="child" ...></fh-nav-item>
 *   <fh-nav-item slot="child" ...></fh-nav-item>
 * </fh-nav-dropdown>
 *
 * Light DOM (not Shadow DOM) — same reasoning as fh-sidebar: global CSS
 * (--brand-red, --ink-black, etc.) must cascade into this component without
 * needing ::part() or CSS custom property piping through a shadow boundary.
 *
 * Expand/collapse is pure client-side UI state (not server-rendered), but
 * INITIAL expand state is derived from current-route so a hard page load
 * on an active child route opens the dropdown correctly without a flash
 * of collapsed-then-expanding content.
 */
class FhNavDropdown extends HTMLElement {
  connectedCallback() {
    this.classList.add("fh-nav-dropdown");

    const label = this.getAttribute("label") ?? "";
    const icon = this.getAttribute("icon") ?? "";
    const currentRoute = this.getAttribute("current-route") ?? "";

    // Children were declared as <fh-nav-item slot="child"> in the light DOM
    // already — grab them before we rebuild our own markup around them.
    const children = Array.from(this.querySelectorAll('[slot="child"]'));

    // Auto-expand if any child is the active route.
    const hasActiveChild = children.some(
      (child) => child.getAttribute("route") === currentRoute,
    );

    this.innerHTML = "";

    const trigger = document.createElement("button");
    trigger.type = "button";
    trigger.className = "fh-nav-dropdown__trigger";
    trigger.setAttribute("aria-expanded", hasActiveChild ? "true" : "false");
    trigger.innerHTML = `
            <svg class="fh-nav-dropdown__icon" width="20" height="20">
                <use href="#icon-${icon}"></use>
            </svg>
            <span class="fh-nav-dropdown__label">${label}</span>
            <svg class="fh-nav-dropdown__chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg>
        `;

    const childList = document.createElement("div");
    childList.className = "fh-nav-dropdown__children";
    childList.hidden = !hasActiveChild;
    children.forEach((child) => childList.appendChild(child));

    trigger.addEventListener("click", () => {
      const expanded = trigger.getAttribute("aria-expanded") === "true";
      trigger.setAttribute("aria-expanded", String(!expanded));
      childList.hidden = expanded;
    });

    this.append(trigger, childList);
  }
}

customElements.define("fh-nav-dropdown", FhNavDropdown);
