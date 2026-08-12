document.addEventListener("DOMContentLoaded", () => {
  const header = document.getElementById("nav");
  const nav = document.getElementById("mainNavigation");
  const toggle = header?.querySelector(".mobile-nav-toggle");
  const closeButton = header?.querySelector(".mobile-nav-close");
  const backdrop = header?.querySelector(".mobile-nav-backdrop");

  if (!header || !nav || !toggle || !closeButton || !backdrop) {
    return;
  }

  const openMenu = () => {
    header.classList.add("mobile-nav-open");
    document.body.classList.add("mobile-menu-active");
    toggle.setAttribute("aria-expanded", "true");
    toggle.setAttribute("aria-label", "Fechar menu");
    closeButton.focus();
  };

  const closeMenu = ({ restoreFocus = true } = {}) => {
    header.classList.remove("mobile-nav-open");
    document.body.classList.remove("mobile-menu-active");
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-label", "Abrir menu");
    if (restoreFocus) {
      toggle.focus();
    }
  };

  toggle.addEventListener("click", () => {
    if (header.classList.contains("mobile-nav-open")) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  closeButton.addEventListener("click", () => closeMenu());
  backdrop.addEventListener("click", () => closeMenu());
  nav.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => closeMenu({ restoreFocus: false }));
  });

  window.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && header.classList.contains("mobile-nav-open")) {
      closeMenu();
    }
  });

  const desktopQuery = window.matchMedia("(min-width: 769px)");
  const handleDesktopChange = (event) => {
    if (event.matches) {
      closeMenu({ restoreFocus: false });
    }
  };

  if (desktopQuery.addEventListener) {
    desktopQuery.addEventListener("change", handleDesktopChange);
  } else {
    desktopQuery.addListener(handleDesktopChange);
  }
});
