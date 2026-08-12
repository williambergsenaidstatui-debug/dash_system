document.addEventListener("DOMContentLoaded", () => {
  const selectors = [
    ".projects-grid",
    ".services-card-grid",
    ".testimonials-grid",
    ".pricing-grid",
    ".team-grid",
    ".content-grid",
    ".values",
    ".steps",
    ".folders-container"
  ];

  selectors.forEach((selector) => {
    document.querySelectorAll(selector).forEach((carousel, carouselIndex) => {
      const cards = Array.from(carousel.children);
      if (cards.length < 2 || carousel.dataset.mobileCarousel === "true") {
        return;
      }

      carousel.dataset.mobileCarousel = "true";
      carousel.classList.add("mobile-card-carousel");
      carousel.setAttribute("role", "region");
      carousel.setAttribute("aria-label", `Carrossel de cards ${carouselIndex + 1}`);
      carousel.setAttribute("tabindex", "0");

      cards.forEach((card) => card.classList.add("mobile-carousel-card"));
    });
  });
});
