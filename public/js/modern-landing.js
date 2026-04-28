/* ===========================
   Modern Landing Page JS
   AdaLaundry Interactive Features
   =========================== */

document.addEventListener("DOMContentLoaded", () => {
    // Profile Dropdown Toggle
    const profileDropdown = document.querySelector(".profile-dropdown");
    const profileToggle = document.querySelector(".profile-toggle");

    if (profileToggle && profileDropdown) {
        profileToggle.addEventListener("click", (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle("active");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", (e) => {
            if (!profileDropdown.contains(e.target)) {
                profileDropdown.classList.remove("active");
            }
        });

        // Close dropdown when clicking on a dropdown item
        const dropdownItems =
            profileDropdown.querySelectorAll(".dropdown-item");
        dropdownItems.forEach((item) => {
            item.addEventListener("click", () => {
                profileDropdown.classList.remove("active");
            });
        });
    }

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", (e) => {
            e.preventDefault();
            const target = document.querySelector(anchor.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });

    // Active nav link on scroll
    const navLinks = document.querySelectorAll(".nav-link");
    window.addEventListener("scroll", () => {
        let current = "";
        const sections = document.querySelectorAll("section");
        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 60) {
                current = section.getAttribute("id");
            }
        });

        navLinks.forEach((link) => {
            link.classList.remove("active");
            if (link.getAttribute("href") === `#${current}`) {
                link.classList.add("active");
            }
        });
    });

    // Navbar shadow on scroll
    const navbar = document.querySelector(".navbar");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 10) {
            navbar.style.boxShadow = "var(--shadow-md)";
        } else {
            navbar.style.boxShadow = "none";
        }
    });

    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -100px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.animation =
                    "fadeInUp 0.8s ease-out forwards";
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document
        .querySelectorAll(".feature-card, .about-item, .stat")
        .forEach((el) => {
            observer.observe(el);
        });

    // CTA buttons interactions
    const ctaButtons = document.querySelectorAll(
        ".btn-primary, .btn-secondary",
    );
    ctaButtons.forEach((button) => {
        button.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-4px)";
        });
        button.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
        });
    });

    // Ripple effect on buttons
    ctaButtons.forEach((button) => {
        button.addEventListener("click", function (e) {
            const ripple = document.createElement("span");
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.width = ripple.style.height = size + "px";
            ripple.style.left = x + "px";
            ripple.style.top = y + "px";
            ripple.classList.add("ripple");

            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Counter animation
    const counters = document.querySelectorAll(".stat h3");
    const startCounters = () => {
        counters.forEach((counter) => {
            const target = parseInt(counter.textContent.replace(/\D/g, ""));
            const increment = target / 50;
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent =
                        Math.ceil(current) +
                        (counter.textContent.includes("K+") ? "K+" : "+");
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = counter.textContent;
                }
            };

            updateCounter();
        });
    };

    // Start counters when stats section is visible
    const statsObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = "true";
                    startCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 },
    );

    document
        .querySelector(".hero-stats")
        ?.forEach((stat) => statsObserver.observe(stat));

    // Mobile menu toggle (if needed)
    const menuToggle = document.querySelector(".menu-toggle");
    const mobileMenu = document.querySelector(".mobile-menu");

    if (menuToggle) {
        menuToggle.addEventListener("click", () => {
            mobileMenu.classList.toggle("active");
        });
    }

    // Form validation
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
        form.addEventListener("submit", (e) => {
            const inputs = form.querySelectorAll(
                "input[required], textarea[required]",
            );
            let isValid = true;

            inputs.forEach((input) => {
                if (!input.value.trim()) {
                    input.style.borderColor = "#ff6b6b";
                    isValid = false;
                } else {
                    input.style.borderColor = "#e5e7eb";
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });
    });

    // Parallax effect on scroll
    const parallaxElements = document.querySelectorAll("[data-parallax]");
    window.addEventListener("scroll", () => {
        parallaxElements.forEach((el) => {
            const scrollPosition = window.pageYOffset;
            const elementOffset = el.offsetTop;
            const distance = scrollPosition - elementOffset;
            el.style.transform = `translateY(${distance * 0.5}px)`;
        });
    });

    // Add hover effect to feature cards
    document.querySelectorAll(".feature-card").forEach((card) => {
        card.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-12px)";
            this.style.boxShadow = "var(--shadow-xl)";
        });
        card.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
            this.style.boxShadow = "var(--shadow-md)";
        });
    });

    // Toast notification function
    function showNotification(message, type = "success") {
        const toast = document.createElement("div");
        toast.className = `toast toast-${type}`;
        toast.textContent = message;
        toast.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${type === "success" ? "#14b8a6" : "#ff6b6b"};
            color: white;
            border-radius: 8px;
            box-shadow: var(--shadow-lg);
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
            max-width: 400px;
        `;

        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = "slideInLeft 0.3s ease-out reverse";
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Example: Handle CTA button clicks
    const primaryButtons = document.querySelectorAll(".btn-primary");
    primaryButtons.forEach((button, index) => {
        if (index === 0 || index === primaryButtons.length - 1) {
            button.addEventListener("click", () => {
                showNotification(
                    "Terima kasih! Silakan ikuti langkah berikutnya.",
                    "success",
                );
            });
        }
    });
});

// Utility function to add stagger animation
function staggerAnimation(elements, delay = 0.1) {
    elements.forEach((el, index) => {
        el.style.animationDelay = `${index * delay}s`;
    });
}

// Call on load
document.addEventListener("DOMContentLoaded", () => {
    const featureCards = document.querySelectorAll(".feature-card");
    staggerAnimation(featureCards, 0.1);
});
