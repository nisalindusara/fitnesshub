const searchInput = document.querySelector(".attendance-search-input");
const resultsBox = document.querySelector(".attendance-search-results");
const memberPanel = document.querySelector(".attendance-member-panel");
const memberName = memberPanel.querySelector(".attendance-member-name");
const memberStatus = memberPanel.querySelector(".attendance-member-status");
const actionBtn = memberPanel.querySelector(".attendance-action-btn");
const checkedInCountEl = document.getElementById("attendance-checked-in-count");

// Force a clean slate on every page load — no stale member card,
// no leftover search results, regardless of browser reload behavior.
memberPanel.hidden = true;
memberPanel.querySelector(".attendance-member-avatar").src = "";
memberName.textContent = "";
memberStatus.textContent = "";
searchInput.value = "";
resultsBox.hidden = true;
resultsBox.innerHTML = "";

let selectedMemberId = null;
let debounceTimer = null;

// ---- Search (reuses the existing member search endpoint) ----

searchInput.addEventListener("input", () => {
  clearTimeout(debounceTimer);
  const term = searchInput.value.trim();

  if (term === "") {
    hideResults();
    return;
  }

  debounceTimer = setTimeout(() => runSearch(term), 250);
});

async function runSearch(term) {
  const response = await fetch(
    `/portal/members/search?q=${encodeURIComponent(term)}`,
  );
  const members = await response.json();
  renderResults(members);
}

function renderResults(members) {
  if (members.length === 0) {
    resultsBox.innerHTML =
      '<div class="attendance-search-empty">No members found</div>';
    resultsBox.hidden = false;
    return;
  }

  resultsBox.innerHTML = members
    .map(
      (m) => `
            <div class="attendance-search-result" data-member-id="${m.member_id}">
                <img class="attendance-result-avatar" src="${m.profile_image ?? "/assets/images/avatar-placeholder.png"}" alt="">
                <div class="attendance-result-info">
                    <span class="attendance-result-name">${escapeHtml(m.first_name + " " + m.last_name)}</span>
                    <span class="attendance-result-phone">${escapeHtml(m.phone_number)}</span>
                </div>
            </div>
        `,
    )
    .join("");

  resultsBox.hidden = false;
}

resultsBox.addEventListener("click", (e) => {
  const row = e.target.closest(".attendance-search-result");
  if (!row) return;

  selectMember(Number(row.dataset.memberId));
});

function hideResults() {
  resultsBox.hidden = true;
  resultsBox.innerHTML = "";
}

// ---- Selecting a member: fetch status, show details + correct button ----

async function selectMember(memberId) {
  hideResults();
  searchInput.value = "";

  const response = await fetch(
    `/portal/attendance/member-status?member_id=${memberId}`,
  );

  if (!response.ok) {
    alert("Could not load member details.");
    return;
  }

  const member = await response.json();
  selectedMemberId = member.member_id;

  const avatarEl = memberPanel.querySelector(".attendance-member-avatar");
  const statusDotEl = memberPanel.querySelector(".attendance-status-dot");
  const phoneEl = memberPanel.querySelector(".attendance-member-phone");
  const statusCardEl = memberPanel.querySelector(".attendance-status-card");
  const checkedInTimeEl = memberPanel.querySelector(
    ".attendance-checked-in-time",
  );
  const durationEl = memberPanel.querySelector(".attendance-status-duration");
  const emptyStateEl = memberPanel.querySelector(".attendance-empty-state");
  const checkinOptionsEl = memberPanel.querySelector(
    ".attendance-checkin-options",
  );

  avatarEl.src =
    member.profile_image ?? "/assets/images/avatar-placeholder.png";
  memberName.textContent = `${member.first_name} ${member.last_name}`;
  memberPanel.querySelector(".attendance-member-badges").innerHTML = `
        <span class="attendance-badge attendance-badge-id">${member.member_code}</span>
        ${
          member.membership_plan
            ? `
                <span class="attendance-badge attendance-badge-membership attendance-badge-${member.membership_status.toLowerCase()}">
                    ${escapeHtml(member.membership_plan)} · ${member.membership_status}
                </span>
            `
            : ""
        }
    `;
  phoneEl.textContent = member.phone_number ? `📞 ${member.phone_number}` : "";

  const options = member.checkin_options ?? [];
  const canCheckIn = options.length > 0;

  if (member.is_checked_in) {
    // Rich checked-in view
    statusDotEl.hidden = false;
    memberStatus.hidden = true;
    statusCardEl.hidden = false;
    emptyStateEl.hidden = true;
    checkinOptionsEl.hidden = true;
    checkinOptionsEl.innerHTML = "";

    checkedInTimeEl.textContent = formatTime(member.checked_in_at);
    durationEl.textContent = formatDuration(member.checked_in_at);

    actionBtn.textContent = "↩ Check Out Member";
    actionBtn.dataset.action = "check-out";
    actionBtn.disabled = false;
  } else if (!canCheckIn) {
    // No active membership and no class today — blocked
    statusDotEl.hidden = true;
    memberStatus.hidden = true;
    statusCardEl.hidden = true;
    emptyStateEl.hidden = false;
    checkinOptionsEl.hidden = true;
    checkinOptionsEl.innerHTML = "";

    actionBtn.textContent = "Mark attendance";
    actionBtn.dataset.action = "check-in";
    actionBtn.disabled = true;
  } else {
    // Not checked in, at least one valid reason to check in
    statusDotEl.hidden = true;
    memberStatus.hidden = false;
    statusCardEl.hidden = true;
    emptyStateEl.hidden = true;

    memberStatus.textContent = "Not currently checked in";
    actionBtn.textContent = "Mark attendance";
    actionBtn.dataset.action = "check-in";
    actionBtn.disabled = false;

    if (options.length > 1) {
      checkinOptionsEl.innerHTML = options
        .map(
          (opt, i) => `
                    <label class="attendance-checkin-option">
                        <input type="radio" name="checkin-reason" value="${opt.class_id ?? ""}" ${i === 0 ? "checked" : ""}>
                        ${escapeHtml(opt.label)}
                    </label>
                `,
        )
        .join("");
      checkinOptionsEl.hidden = false;
    } else {
      // Exactly one option — still keep a hidden radio so the click
      // handler can read the right class_id (or none) without a visible picker.
      checkinOptionsEl.innerHTML = `<input type="radio" name="checkin-reason" value="${options[0].class_id ?? ""}" checked hidden>`;
      checkinOptionsEl.hidden = true;
    }
  }

  memberPanel.hidden = false;
}

// ---- Button: check-in or check-out depending on current state ----

actionBtn.addEventListener("click", async () => {
  if (!selectedMemberId) return;

  const action = actionBtn.dataset.action; // 'check-in' | 'check-out'
  actionBtn.disabled = true;

  const body = new URLSearchParams({ member_id: selectedMemberId });

  if (action === "check-in") {
    const checkinOptionsEl = memberPanel.querySelector(
      ".attendance-checkin-options",
    );
    const selected = checkinOptionsEl.querySelector(
      'input[name="checkin-reason"]:checked',
    );
    if (selected && selected.value !== "") {
      body.set("class_id", selected.value);
    }
  }

  const response = await fetch(`/portal/attendance/${action}`, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: body.toString(),
  });

  const result = await response.json();
  actionBtn.disabled = false;

  if (!response.ok) {
    alert(result.error || "Something went wrong.");
    return;
  }

  // Refresh the panel to flip the button and status text
  selectMember(selectedMemberId);
  updateCheckedInCount(action);
});

// ---- Helpers ----

function updateCheckedInCount(action) {
  const current = Number(checkedInCountEl.textContent.match(/\d+/)?.[0] ?? 0);
  const next = action === "check-in" ? current + 1 : Math.max(0, current - 1);
  checkedInCountEl.textContent = `${next} checked in`;
}

function formatDuration(checkedInIso) {
  const minutesTotal = Math.floor(
    (Date.now() - new Date(checkedInIso).getTime()) / 60000,
  );
  const hours = Math.floor(minutesTotal / 60);
  const minutes = minutesTotal % 60;
  return hours > 0
    ? `Duration: ${hours}h ${minutes}m`
    : `Duration: ${minutes}m`;
}

function formatTime(isoString) {
  return new Date(isoString).toLocaleTimeString([], {
    hour: "2-digit",
    minute: "2-digit",
  });
}

function escapeHtml(str) {
  const div = document.createElement("div");
  div.textContent = str;
  return div.innerHTML;
}
