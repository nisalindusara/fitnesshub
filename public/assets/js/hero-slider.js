let currentSlide = 0;
const totalSlides = 2;
const slideDuration = 6000;
let slideTimer;

function setHeroSlide(index) {
  currentSlide = index;
  document
    .querySelectorAll(".hero-slide")
    .forEach((el, i) => (el.style.opacity = i === currentSlide ? "1" : "0"));
  document.querySelectorAll(".hero-content").forEach((el, i) => {
    if (i === currentSlide) {
      el.style.opacity = "1";
      el.style.transform = "translateY(0)";
      el.style.pointerEvents = "auto";
    } else {
      el.style.opacity = "0";
      el.style.transform = "translateY(1rem)";
      el.style.pointerEvents = "none";
    }
  });
  document.querySelectorAll(".hero-dot").forEach((el, i) => {
    el.style.width = i === currentSlide ? "2rem" : "0.375rem";
    el.style.backgroundColor =
      i === currentSlide ? "#E31837" : "rgba(255,255,255,0.3)";
  });
  document.getElementById("hero-current").innerText = "0" + (currentSlide + 1);
  animateProgress();
  resetTimer();
}

function nextHeroSlide(dir) {
  setHeroSlide((currentSlide + dir + totalSlides) % totalSlides);
}

function animateProgress() {
  const bar = document.getElementById("hero-progress");
  bar.style.transition = "none";
  bar.style.width = "0%";
  void bar.offsetWidth; // force reflow so the reset actually renders before the animation starts
  bar.style.transition = `width ${slideDuration}ms linear`;
  bar.style.width = "100%";
}

function resetTimer() {
  clearInterval(slideTimer);
  slideTimer = setInterval(() => nextHeroSlide(1), slideDuration);
}

animateProgress();
resetTimer();
