document.addEventListener("DOMContentLoaded", () => {
    if (!window.gsap) {
        return;
    }

    const select = (selector) => gsap.utils.toArray(selector);

    const has = (selector) => document.querySelector(selector);

    const animateOnView = (selector, animation = {}) => {
        const elements = select(selector);

        if (!elements.length) {
            return;
        }

        const runAnimation = (element) => {
            if (element.dataset.gsapAnimated) {
                return;
            }

            element.dataset.gsapAnimated = "true";

            gsap.from(element, {
                opacity: animation.opacity ?? 0,
                y: animation.y ?? 28,
                scale: animation.scale ?? 1,
                duration: animation.duration ?? 0.75,
                delay: animation.delay ?? 0,
                ease: animation.ease ?? "power3.out",
                clearProps: "transform,opacity",
            });
        };

        if (!("IntersectionObserver" in window)) {
            elements.forEach(runAnimation);
            return;
        }

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        runAnimation(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            },
            {
                threshold: 0.12,
                rootMargin: "0px 0px -40px 0px",
            }
        );

        elements.forEach((element) => observer.observe(element));
    };

    function initLenis() {
        if (!window.Lenis) {
            return;
        }

        const lenis = new Lenis({
            duration: 1.2,
            easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
            smoothWheel: true,
        });

        function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
        }

        requestAnimationFrame(raf);
    }

    function initAos() {
        if (!window.AOS) {
            return;
        }

        AOS.init({
            duration: 900,
            once: true,
            offset: 120,
            easing: "ease-out-cubic",
        });
    }

    function initNavbarGsap() {
        if (!has(".site-header")) {
            return;
        }

        gsap.from(".site-header", {
            opacity: 0,
            y: -18,
            duration: 0.65,
            ease: "power3.out",
        });

        gsap.from(".nav li", {
            opacity: 0,
            y: -10,
            stagger: 0.06,
            duration: 0.45,
            ease: "power2.out",
        });
    }

    function initHeroGsap() {
        if (!has(".portfolio-content")) {
            return;
        }

        const heroTimeline = gsap.timeline({ defaults: { ease: "power3.out" } });

        heroTimeline
            .from(".portfolio-content", { opacity: 0, y: 40, duration: 1.1 })
            .from(".portfolio-content h1", { opacity: 0, y: 24, duration: 0.8 }, "-=0.7")
            .from(".portfolio-content h2, .portfolio-content p", {
                opacity: 0,
                y: 18,
                stagger: 0.12,
                duration: 0.7,
            }, "-=0.45")
            .from(".portfolio-actions a", { opacity: 0, y: 20, stagger: 0.15, duration: 0.6 }, "-=0.35")
            .from(".portfolio-social a", { opacity: 0, scale: 0.85, stagger: 0.1, duration: 0.5 }, "-=0.25")
            .from(".portfolio-visual", { opacity: 0, scale: 0.9, rotate: -8, duration: 0.9 }, "-=0.55");

        gsap.to(".portfolio-visual i", {
            y: [-6, 6],
            duration: 2.4,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
        });
    }

    function initProjectsGsap() {
        animateOnView(".projects-section .projects-kicker, .projects-section .projects-title", {
            y: 20,
            duration: 0.65,
        });

        animateOnView(".project-card", {
            y: 34,
            duration: 0.75,
        });
    }

    function initProjectFoldersGsap() {
        animateOnView(".project-folders__header", {
            y: 24,
            duration: 0.7,
        });

        const grid = document.getElementById("foldersGrid");

        if (!grid || !("MutationObserver" in window)) {
            animateOnView(".folder-wrapper", { y: 24, scale: 0.96, duration: 0.65 });
            return;
        }

        const observer = new MutationObserver(() => {
            select(".folder-wrapper").forEach((folder, index) => {
                if (folder.dataset.gsapAnimated) {
                    return;
                }

                folder.dataset.gsapAnimated = "true";

                gsap.from(folder, {
                    opacity: 0,
                    y: 24,
                    scale: 0.96,
                    delay: index * 0.04,
                    duration: 0.55,
                    ease: "power3.out",
                    clearProps: "transform,opacity",
                });
            });
        });

        observer.observe(grid, { childList: true });
    }

    function initTestimonialsGsap() {
        animateOnView(".testimonials-heading > *", {
            y: 20,
            duration: 0.65,
        });

        animateOnView(".testimonial-card", {
            y: 30,
            duration: 0.7,
        });
    }

    function initPricingGsap() {
        animateOnView(".pricing-heading > *", {
            y: 22,
            duration: 0.65,
        });

        animateOnView(".pricing-card", {
            y: 34,
            duration: 0.75,
        });

        animateOnView(".pricing-tags span", {
            y: 12,
            scale: 0.96,
            duration: 0.45,
        });
    }

    function initTeamGsap() {
        animateOnView(".team-heading > *", {
            y: 22,
            duration: 0.65,
        });

        animateOnView(".team-card", {
            y: 34,
            duration: 0.75,
        });

        animateOnView(".team-avatar", {
            y: 12,
            scale: 0.92,
            duration: 0.55,
        });
    }

    function initContactGsap() {
        animateOnView(".contact-hero__inner", {
            y: 34,
            duration: 0.85,
        });

        animateOnView(".channel-card", {
            y: 26,
            duration: 0.62,
        });

        animateOnView(".form-wrap", {
            y: 30,
            duration: 0.75,
        });
    }

    function initAboutGsap() {
        if (!has(".about-page")) {
            return;
        }

        gsap.from(".about-page .hero__copy > *", {
            opacity: 0,
            y: 34,
            stagger: 0.12,
            duration: 0.85,
            ease: "power3.out",
            clearProps: "transform,opacity",
        });

        gsap.from(".about-page .hero__logo-card", {
            opacity: 0,
            y: 26,
            scale: 0.92,
            rotate: -4,
            duration: 0.9,
            delay: 0.18,
            ease: "power3.out",
            clearProps: "transform,opacity",
        });

        gsap.to(".about-page .hero__logo-card img", {
            y: [-5, 5],
            duration: 2.6,
            repeat: -1,
            yoyo: true,
            ease: "sine.inOut",
        });

        animateOnView(".about-page .text-block", {
            y: 32,
            duration: 0.72,
        });

        animateOnView(".about-page .section-number", {
            y: 12,
            scale: 0.9,
            duration: 0.5,
        });

        animateOnView(".about-page .value-card", {
            y: 30,
            scale: 0.98,
            duration: 0.68,
        });

        animateOnView(".about-page .process > .eyebrow, .about-page .process > h2", {
            y: 24,
            duration: 0.65,
        });

        animateOnView(".about-page .step", {
            y: 24,
            scale: 0.97,
            duration: 0.58,
        });
    }

    function initServicesGsap() {
        animateOnView(".card-hover", {
            y: 30,
            duration: 0.7,
        });
    }

    function initDiagnosticoGsap() {
        animateOnView(".diagnostico-nav, .diagnostico-header > *, .progress-wrap, .diagnostico-card", {
            y: 26,
            duration: 0.7,
        });

        animateOnView(".opt", {
            y: 16,
            scale: 0.98,
            duration: 0.48,
        });
    }

    function initFooterGsap() {
        animateOnView("footer", {
            y: 30,
            duration: 0.75,
        });

        animateOnView("footer .space-y-4", {
            y: 22,
            duration: 0.65,
        });
    }

    function initParallaxGsap() {
        const parallaxItems = document.querySelectorAll(
            ".portfolio-visual, .page-card, .dash-about-card, .dash-service-card, .hero__logo-card"
        );

        if (!parallaxItems.length) {
            return;
        }

        window.addEventListener("scroll", () => {
            const scrollY = window.scrollY;

            parallaxItems.forEach((item, index) => {
                const depth = 0.08 + index * 0.015;

                gsap.to(item, {
                    y: scrollY * depth,
                    duration: 0.6,
                    overwrite: true,
                    ease: "power2.out",
                });
            });
        }, { passive: true });
    }

    function initHoverGsap() {
        const interactiveElements = document.querySelectorAll(
            ".portfolio-btn, .portfolio-social a, .portfolio-visual, .team-social a"
        );

        interactiveElements.forEach((element) => {
            if (element.dataset.gsapHover) {
                return;
            }

            element.dataset.gsapHover = "true";

            element.addEventListener("mouseenter", () => {
                gsap.to(element, { y: -6, scale: 1.03, duration: 0.25, ease: "power2.out" });
            });

            element.addEventListener("mouseleave", () => {
                gsap.to(element, { y: 0, scale: 1, duration: 0.25, ease: "power2.out" });
            });
        });
    }

    initLenis();
    initAos();
    initNavbarGsap();
    initHeroGsap();
    initProjectsGsap();
    initProjectFoldersGsap();
    initTestimonialsGsap();
    initPricingGsap();
    initTeamGsap();
    initContactGsap();
    initAboutGsap();
    initServicesGsap();
    initDiagnosticoGsap();
    initFooterGsap();
    initParallaxGsap();
    initHoverGsap();
});
