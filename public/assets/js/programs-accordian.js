function toggleAccordion(id) {
  document.querySelectorAll(".accordion-content").forEach((el) => {
    if (el.id === id)
      el.style.display = el.style.display === "none" ? "grid" : "none";
    else el.style.display = "none";
  });
  document
    .querySelectorAll(".accordion-btn > span:nth-child(2)")
    .forEach((el) => {
      el.style.color =
        el.parentElement.nextElementSibling.style.display === "grid"
          ? "white"
          : "rgba(255,255,255,0.6)";
    });
  document
    .querySelectorAll(".accordion-btn > span:nth-child(3)")
    .forEach((el) => {
      let isOpen = el.parentElement.nextElementSibling.style.display === "grid";
      el.style.transform = isOpen ? "rotate(180deg)" : "rotate(0deg)";
      el.style.color = isOpen ? "#E31837" : "rgba(255,255,255,0.4)";
    });
}
