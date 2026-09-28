// FitnessHub – Classes page: day tabs + type/coach filters
// Place at: /assets/js/classes.js
(function () {
  var root = document.querySelector(".cs");
  if (!root) return;

  var dayTabs = root.querySelectorAll(".cs-day");
  var chips = root.querySelectorAll(".cs-chip");
  var coachSel = root.querySelector("#cs-coach");
  var cards = root.querySelectorAll(".cs-card");
  var titleEl = root.querySelector("#cs-day-title");
  var countEl = root.querySelector("#cs-count");
  var emptyEl = root.querySelector("#cs-empty");
  var resetBtn = root.querySelector("#cs-reset");

  var activeTab = root.querySelector(".cs-day.is-active") || dayTabs[0];
  var state = {
    day: activeTab ? activeTab.dataset.day : "mon",
    type: "all",
    coach: "all",
  };

  function render() {
    var shown = 0;
    cards.forEach(function (card) {
      var match =
        card.dataset.day === state.day &&
        (state.type === "all" || card.dataset.type === state.type) &&
        (state.coach === "all" || card.dataset.coach === state.coach);
      card.hidden = !match;
      if (match) shown++;
    });
    countEl.textContent = shown === 1 ? "1 class" : shown + " classes";
    emptyEl.hidden = shown > 0;
  }

  function selectDay(tab, focus) {
    dayTabs.forEach(function (t) {
      var on = t === tab;
      t.classList.toggle("is-active", on);
      t.setAttribute("aria-selected", on ? "true" : "false");
      t.tabIndex = on ? 0 : -1;
    });
    state.day = tab.dataset.day;
    titleEl.textContent = tab.dataset.dayName;
    if (focus) tab.focus();
    tab.scrollIntoView({ block: "nearest", inline: "nearest" });
    render();
  }

  function selectType(chip) {
    chips.forEach(function (c) {
      var on = c === chip;
      c.classList.toggle("is-active", on);
      c.setAttribute("aria-pressed", on ? "true" : "false");
    });
    state.type = chip.dataset.type;
    render();
  }

  dayTabs.forEach(function (tab, i) {
    tab.tabIndex = tab === activeTab ? 0 : -1;
    tab.addEventListener("click", function () {
      selectDay(tab);
    });
    tab.addEventListener("keydown", function (e) {
      var next = null;
      if (e.key === "ArrowRight") next = dayTabs[(i + 1) % dayTabs.length];
      if (e.key === "ArrowLeft")
        next = dayTabs[(i - 1 + dayTabs.length) % dayTabs.length];
      if (e.key === "Home") next = dayTabs[0];
      if (e.key === "End") next = dayTabs[dayTabs.length - 1];
      if (next) {
        e.preventDefault();
        selectDay(next, true);
      }
    });
  });

  chips.forEach(function (chip) {
    chip.addEventListener("click", function () {
      selectType(chip);
    });
  });

  coachSel.addEventListener("change", function () {
    state.coach = coachSel.value;
    render();
  });

  resetBtn.addEventListener("click", function () {
    selectType(chips[0]);
    coachSel.value = "all";
    state.coach = "all";
    render();
  });

  render();
})();
