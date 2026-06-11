const initScrollAnimation = () => {
  const animatedSections = document.querySelectorAll(".section-animate");

  if (!animatedSections.length) return;

  if (!("IntersectionObserver" in window)) {
    animatedSections.forEach((section) => section.classList.add("is-visible"));
    return;
  }

  const reveal = (section) => {
    section.classList.add("is-visible");
  };

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          reveal(entry.target);
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.08,
      rootMargin: "0px 0px -40px 0px",
    }
  );

  animatedSections.forEach((section) => {
    observer.observe(section);

    const rect = section.getBoundingClientRect();
    if (rect.top < window.innerHeight && rect.bottom > 0) {
      requestAnimationFrame(() => reveal(section));
    }
  });
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", initScrollAnimation, { once: true });
} else {
  initScrollAnimation();
}
