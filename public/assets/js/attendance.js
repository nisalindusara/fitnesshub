const searchInput = document.querySelector(".attendance-search-input");
const resultsBox = document.querySelector(".attendance-search-results");
const memberPanel = document.querySelector(".attendance-member-panel");
const memberName = memberPanel.querySelector(".attendance-member-name");
const memberStatus = memberPanel.querySelector(".attendance-member-status");
const actionBtn = memberPanel.querySelector(".attendance-action-btn");
const checkedInCountEl = document.getElementById("attendance-checked-in-count");

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

  memberPanel.querySelector(".attendance-member-avatar").src =
    member.profile_image ?? "/assets/images/avatar-placeholder.png";
  memberName.textContent = `${member.first_name} ${member.last_name}`;

  if (member.is_checked_in) {
    memberStatus.textContent = `Checked in at ${formatTime(member.checked_in_at)}`;
    actionBtn.textContent = "Mark checkout";
    actionBtn.dataset.action = "check-out";
  } else {
    memberStatus.textContent = "Not currently checked in";
    actionBtn.textContent = "Mark attendance";
    actionBtn.dataset.action = "check-in";
  }

  memberPanel.hidden = false;
}

// ---- Button: check-in or check-out depending on current state ----

actionBtn.addEventListener("click", async () => {
  if (!selectedMemberId) return;

  const action = actionBtn.dataset.action; // 'check-in' | 'check-out'
  actionBtn.disabled = true;

  const response = await fetch(`/portal/attendance/${action}`, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `member_id=${selectedMemberId}`,
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
