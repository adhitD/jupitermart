// Inisialisasi tahun di footer
document.addEventListener("DOMContentLoaded", () => {
  const yearSpan = document.getElementById("year");
  if (yearSpan) {
    yearSpan.textContent = new Date().getFullYear();
  }
});

// HERO SLIDER SEDERHANA
(function () {
  const slides = document.querySelectorAll(".hero-slide");
  const dots = document.querySelectorAll(".hero-dots .dot");
  const prevBtn = document.querySelector(".hero-prev");
  const nextBtn = document.querySelector(".hero-next");
  let currentIndex = 0;
  let intervalId = null;

  function showSlide(index) {
    if (!slides.length) return;

    slides.forEach((slide, i) => {
      slide.classList.toggle("active", i === index);
    });

    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });

    currentIndex = index;
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % slides.length;
    showSlide(nextIndex);
  }

  function prevSlide() {
    const prevIndex =
      (currentIndex - 1 + slides.length) % slides.length;
    showSlide(prevIndex);
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

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      nextSlide();
      startAutoPlay();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      prevSlide();
      startAutoPlay();
    });
  }

  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      const index = parseInt(dot.getAttribute("data-slide"), 10);
      showSlide(index);
      startAutoPlay();
    });
  });
})();

// BACK TO TOP BUTTON
(function () {
  const backToTopBtn = document.getElementById("backToTop");

  if (!backToTopBtn) return;

  window.addEventListener("scroll", () => {
    if (window.scrollY > 300) {
      backToTopBtn.style.display = "flex";
    } else {
      backToTopBtn.style.display = "none";
    }
  });

  backToTopBtn.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
})();

// FILTER PRODUK BERDASARKAN KATEGORI DI SIDEBAR
(function () {
  const categoryLinks = document.querySelectorAll(".category-link");
  const productCards = document.querySelectorAll(".product-card");

  if (!categoryLinks.length || !productCards.length) return;

  categoryLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();

      const category = link.getAttribute("data-category");

      // Active state di sidebar
      categoryLinks.forEach((l) => l.classList.remove("active"));
      link.classList.add("active");

      // Tampilkan / sembunyikan produk
      productCards.forEach((card) => {
        const cardCategory = card.getAttribute("data-category");

        if (category === "semua" || category === cardCategory) {
          card.style.display = "flex";
        } else {
          card.style.display = "none";
        }
      });
    });
  });
})();

// TIMER SEDERHANA UNTUK FLASH SALE (COUNTDOWN 1 JAM)
(function () {
  const timerSpan = document.getElementById("flash-timer");
  if (!timerSpan) return;

  // 1 jam dari sekarang (dalam detik)
  let remainingSeconds = 60 * 60;

  function formatTime(sec) {
    const h = String(Math.floor(sec / 3600)).padStart(2, "0");
    const m = String(Math.floor((sec % 3600) / 60)).padStart(2, "0");
    const s = String(sec % 60).padStart(2, "0");
    return `${h}:${m}:${s}`;
  }

  function tick() {
    if (remainingSeconds < 0) {
      timerSpan.textContent = "00:00:00";
      return;
    }
    timerSpan.textContent = formatTime(remainingSeconds);
    remainingSeconds -= 1;
  }

  tick();
  setInterval(tick, 1000);
})();
