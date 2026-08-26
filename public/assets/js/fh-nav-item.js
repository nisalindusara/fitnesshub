/**
 * <fh-nav-item icon="users" label="Members" route="/dashboard/members" active="true"></fh-nav-item>
 *
 * Leaf nav link — used both as a top-level sidebar item and as a child
 * inside <fh-nav-dropdown>. Same component either way; the dropdown just
 * places these inside its collapsible child list.
 *
 * Light DOM (not Shadow DOM) — same reasoning as fh-sidebar and
 * fh-nav-dropdown: global tokens.css must cascade in directly.
 *
 * `active` is set server-side (from PHP, based on $currentRoute) rather
 * than computed client-side, per the existing sidebar active-state
 * convention — guarantees correct state on a hard page load.
 */
class FhNavItem extends HTMLElement {
  connectedCallback() {
    this.classList.add("fh-nav-item");

    const icon = this.getAttribute("icon") ?? "";
    const label = this.getAttribute("label") ?? "";
    const route = this.getAttribute("route") ?? "#";
    const isActive = this.getAttribute("active") === "true";

    this.classList.toggle("fh-nav-item--active", isActive);

    this.innerHTML = `
            <a href="${route}" class="fh-nav-item__link">
                <svg class="fh-nav-item__icon" width="20" height="20">
                    <use href="#icon-${icon}"></use>
                </svg>
                <span class="fh-nav-item__label">${label}</span>
            </a>
        `;
  }
}

customElements.define("fh-nav-item", FhNavItem);
