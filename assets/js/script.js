(function () {
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-dots .dot");
  const prevBtn = document.querySelector(".hero-prev");
  const nextBtn = document.querySelector(".hero-next");
  let currentIndex = 0;
  let intervalId = null;

  function showSlide(index) {
    slides.forEach((slide, i) => slide.classList.toggle("active", i === index));
    dots.forEach((dot, i) => dot.classList.toggle("active", i === index));
    currentIndex = index;
  }

  function nextSlide() {
    showSlide((currentIndex + 1) % slides.length);
  }
  function prevSlide() {
    showSlide((currentIndex - 1 + slides.length) % slides.length);
  }

  function startAutoPlay() {
    stopAutoPlay();
    intervalId = setInterval(nextSlide, 6000);
  }
  function stopAutoPlay() {
    if (intervalId) clearInterval(intervalId);
  }

  if (slides.length) {
    showSlide(0);
    startAutoPlay();
  }

  nextBtn?.addEventListener("click", () => {
    nextSlide();
    startAutoPlay();
  });
  prevBtn?.addEventListener("click", () => {
    prevSlide();
    startAutoPlay();
  });
  dots.forEach((dot) =>
    dot.addEventListener("click", () => {
      showSlide(parseInt(dot.dataset.slide));
      startAutoPlay();
    })
  );
})();
