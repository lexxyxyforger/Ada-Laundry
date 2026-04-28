/* ===========================
   Modern Dashboard JS
   AdaLaundry Admin Dashboard
   =========================== */

document.addEventListener("DOMContentLoaded", () => {
    // Sidebar Navigation Active State
    const navItems = document.querySelectorAll(".nav-item");
    const contentSections = document.querySelectorAll(
        '[id="dashboard"], [id="orders"], [id="customers"], [id="reports"], [id="settings"]',
    );

    navItems.forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();

            // Remove active class from all items
            navItems.forEach((nav) => nav.classList.remove("active"));

            // Add active class to clicked item
            item.classList.add("active");

            // Handle section navigation
            const targetId = item.getAttribute("href")?.substring(1);
            if (targetId) {
                contentSections.forEach((section) => {
                    section.style.display =
                        section.id === targetId ? "block" : "none";
                });
            }
        });
    });

    // Hamburger Menu Toggle
    const hamburger = document.querySelector(".btn-hamburger");
    const sidebar = document.querySelector(".sidebar");

    if (hamburger) {
        hamburger.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });

        // Close sidebar when clicking on a nav item (mobile)
        navItems.forEach((item) => {
            item.addEventListener("click", () => {
                if (window.innerWidth <= 1024) {
                    sidebar.classList.remove("active");
                }
            });
        });

        // Close sidebar when clicking outside
        document.addEventListener("click", (e) => {
            if (!sidebar.contains(e.target) && !hamburger.contains(e.target)) {
                sidebar.classList.remove("active");
            }
        });
    }

    // Search Functionality
    const searchBox = document.querySelector(".search-box input");
    if (searchBox) {
        searchBox.addEventListener("input", (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const tableRows = document.querySelectorAll(".table-row");

            tableRows.forEach((row) => {
                const rowText = row.innerText.toLowerCase();
                row.style.display = rowText.includes(searchTerm) ? "" : "none";
            });
        });
    }

    // Table Row Hover Effects
    const tableRows = document.querySelectorAll(".table-row");
    tableRows.forEach((row) => {
        row.addEventListener("mouseenter", () => {
            row.style.backgroundColor = "rgba(20, 184, 166, 0.05)";
        });
        row.addEventListener("mouseleave", () => {
            row.style.backgroundColor = "";
        });
    });

    // Action Buttons in Table
    const actionButtons = document.querySelectorAll(".btn-action");
    actionButtons.forEach((button) => {
        button.addEventListener("click", (e) => {
            e.stopPropagation();
            showContextMenu(button);
        });
    });

    // Notification Badge Animation
    const notificationBadge = document.querySelector(".notification-badge");
    if (notificationBadge) {
        setInterval(() => {
            notificationBadge.style.animation = "none";
            setTimeout(() => {
                notificationBadge.style.animation = "scaleIn 0.3s ease-out";
            }, 10);
        }, 4000);
    }

    // Stat Cards Animation on Scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px",
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.animation =
                    "fadeInUp 0.6s ease-out forwards";
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll(".stat-card, .card").forEach((el) => {
        observer.observe(el);
    });

    // Smooth Number Counter for Stats
    const statValues = document.querySelectorAll(".stat-value");
    let hasAnimated = false;

    const animateCounters = () => {
        if (hasAnimated) return;
        hasAnimated = true;

        statValues.forEach((stat) => {
            const value = stat.textContent;

            // Skip non-numeric values
            if (!/\d/.test(value)) return;

            const isRupiah = value.includes("Rp");
            const numericValue = parseInt(value.replace(/[^\d]/g, ""));
            const originalText = value;
            let current = 0;
            const increment = numericValue / 50;

            const updateCounter = () => {
                current += increment;
                if (current < numericValue) {
                    if (isRupiah) {
                        stat.textContent =
                            "Rp " +
                            Math.ceil(current).toLocaleString("id-ID") +
                            (value.includes("M") ? "M" : "K");
                    } else {
                        stat.textContent =
                            Math.ceil(current).toLocaleString("id-ID");
                    }
                    requestAnimationFrame(updateCounter);
                } else {
                    stat.textContent = originalText;
                }
            };

            updateCounter();
        });
    };

    // Trigger counter animation when stats section is visible
    const statsGrid = document.querySelector(".stats-grid");
    if (statsGrid) {
        const statsObserver = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animateCounters();
                        statsObserver.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.5 },
        );

        statsObserver.observe(statsGrid);
    }

    // Filter Functionality
    const filterSelect = document.querySelector(".filter-select");
    if (filterSelect) {
        filterSelect.addEventListener("change", (e) => {
            const filterValue = e.target.value;
            console.log("Filtering by:", filterValue);
            // Implement filter logic here
            showNotification(`Filter changed to: ${filterValue}`, "info");
        });
    }

    // Notification Toast
    function showNotification(message, type = "info") {
        const toast = document.createElement("div");
        const bgColor =
            {
                success: "#10b981",
                error: "#ef4444",
                info: "#3b82f6",
                warning: "#f59e0b",
            }[type] || "#3b82f6";

        toast.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 16px 24px;
            background: ${bgColor};
            color: white;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            animation: slideInRight 0.3s ease-out;
            font-size: 14px;
            font-weight: 500;
        `;

        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => {
            toast.style.animation = "slideInLeft 0.3s ease-out reverse";
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Context Menu for Actions
    function showContextMenu(button) {
        // Remove existing context menus
        document
            .querySelectorAll(".context-menu")
            .forEach((menu) => menu.remove());

        const menu = document.createElement("div");
        menu.className = "context-menu";
        menu.style.cssText = `
            position: absolute;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            min-width: 150px;
            overflow: hidden;
        `;

        const options = [
            {
                label: "Lihat Detail",
                action: () =>
                    showNotification("Membuka detail pesanan...", "info"),
            },
            {
                label: "Edit Status",
                action: () =>
                    showNotification("Membuka editor status...", "info"),
            },
            {
                label: "Hapus",
                action: () => showNotification("Pesanan dihapus!", "warning"),
            },
        ];

        options.forEach((option) => {
            const item = document.createElement("a");
            item.href = "#";
            item.textContent = option.label;
            item.style.cssText = `
                display: block;
                padding: 10px 16px;
                color: #374151;
                text-decoration: none;
                font-size: 13px;
                transition: all 0.2s;
                border-bottom: 1px solid #f3f4f6;
            `;
            item.onmouseover = () => (item.style.backgroundColor = "#f3f4f6");
            item.onmouseout = () => (item.style.backgroundColor = "");
            item.onclick = (e) => {
                e.preventDefault();
                option.action();
                menu.remove();
            };
            menu.appendChild(item);
        });

        // Remove border from last item
        if (menu.lastChild) {
            menu.lastChild.style.borderBottom = "none";
        }

        document.body.appendChild(menu);

        // Position the menu
        const rect = button.getBoundingClientRect();
        menu.style.top = rect.bottom + 5 + "px";
        menu.style.right = window.innerWidth - rect.right + "px";

        // Close menu when clicking outside
        setTimeout(() => {
            document.addEventListener("click", closeMenu);
        }, 0);

        function closeMenu(e) {
            if (!menu.contains(e.target) && e.target !== button) {
                menu.remove();
                document.removeEventListener("click", closeMenu);
            }
        }
    }

    // Logout functionality
    const logoutBtn = document.querySelector(".btn-logout");
    if (logoutBtn) {
        logoutBtn.addEventListener("click", () => {
            if (confirm("Apakah Anda yakin ingin keluar?")) {
                showNotification("Logging out...", "info");
                setTimeout(() => {
                    // window.location.href = '/logout';
                }, 1500);
            }
        });
    }

    // Profile button
    const profileBtn = document.querySelector(".btn-profile");
    if (profileBtn) {
        profileBtn.addEventListener("click", () => {
            showNotification("Membuka profil pengguna...", "info");
        });
    }

    // Notification button
    const notificationBtn = document.querySelector(".btn-notification");
    if (notificationBtn) {
        notificationBtn.addEventListener("click", () => {
            showNotification("Membuka notifikasi...", "info");
        });
    }

    // Add animation to elements on page load
    function staggerAnimation(elements, delay = 0.1) {
        elements.forEach((el, index) => {
            el.style.animation = `fadeInUp 0.6s ease-out ${index * delay}s forwards`;
            el.style.opacity = "0";
        });
    }

    const cards = document.querySelectorAll(".card");
    staggerAnimation(cards, 0.1);

    // Responsive sidebar behavior
    function handleResize() {
        if (window.innerWidth > 1024) {
            sidebar.classList.remove("active");
        }
    }

    window.addEventListener("resize", handleResize);

    // Add touch support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    document.addEventListener(
        "touchstart",
        (e) => {
            touchStartX = e.changedTouches[0].screenX;
        },
        false,
    );

    document.addEventListener(
        "touchend",
        (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        },
        false,
    );

    function handleSwipe() {
        const threshold = 50;
        if (touchStartX - touchEndX > threshold) {
            // Swiped left
            sidebar?.classList.remove("active");
        }
        if (touchEndX - touchStartX > threshold) {
            // Swiped right
            if (window.innerWidth <= 1024) {
                sidebar?.classList.add("active");
            }
        }
    }

    // Add keyboard shortcuts
    document.addEventListener("keydown", (e) => {
        // Escape to close sidebar
        if (e.key === "Escape") {
            sidebar?.classList.remove("active");
        }
        // Ctrl+K or Cmd+K for search
        if ((e.ctrlKey || e.metaKey) && e.key === "k") {
            e.preventDefault();
            searchBox?.focus();
        }
    });
});
