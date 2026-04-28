document.addEventListener("DOMContentLoaded", function () {

    // ===== DATE =====
    const dateEl = document.getElementById("currentDate");
    if (dateEl) {
        const now = new Date();
        dateEl.textContent = now.toLocaleDateString("id-ID", { weekday: "short", day: "numeric", month: "short", year: "numeric" });
    }
    const loginEl = document.getElementById("loginTime");
    if (loginEl) {
        loginEl.textContent = new Date().toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" });
    }
    const loadEl = document.getElementById("loadTime");
    if (loadEl) loadEl.textContent = "Pukul " + new Date().toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" });

    // ===== DASHBOARD STATS =====
    async function updateStats() {
        try {
            const res = await fetch("/api/admin/dashboard-stats", { headers: { "X-Requested-With": "XMLHttpRequest" } });
            if (res.ok) {
                const d = await res.json();
                setText("total-members", d.totalMembers);
                setText("total-transactions", d.totalTransactions);
                setText("total-revenue", "Rp " + Number(d.totalRevenue).toLocaleString("id-ID"));
                setText("pending-transactions", d.pendingTransactions);
            }
        } catch (e) { console.error("Stats error:", e); }
    }

    function setText(id, val) {
        const el = document.getElementById(id);
        if (el) {
            el.style.opacity = "0";
            setTimeout(() => { el.textContent = val; el.style.transition = "opacity 0.4s"; el.style.opacity = "1"; }, 150);
        }
    }

    updateStats();
    setInterval(updateStats, 30000);

    // ===== NAVIGATION =====
    const navItems = document.querySelectorAll(".sidebar .nav-item[data-section]");
    const sections = document.querySelectorAll(".section-content[data-section]");
    const breadcrumb = document.getElementById("breadcrumbCurrent");

    const labels = { dashboard: "Dashboard", profile: "Profil Saya" };

    navItems.forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            const sec = item.getAttribute("data-section");

            navItems.forEach(n => n.classList.remove("active"));
            item.classList.add("active");

            sections.forEach(s => {
                if (s.getAttribute("data-section") === sec) {
                    s.classList.add("active-section");
                } else {
                    s.classList.remove("active-section");
                }
            });

            if (breadcrumb) breadcrumb.textContent = labels[sec] || sec;

            // close mobile sidebar
            if (window.innerWidth <= 1024) {
                document.getElementById("sidebar")?.classList.remove("active");
                document.getElementById("sidebarOverlay")?.classList.remove("active");
            }
        });
    });

    // ===== MOBILE TOGGLE =====
    const toggle = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");

    if (toggle && sidebar) {
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("active");
            overlay?.classList.toggle("active");
        });
        overlay?.addEventListener("click", () => {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    }

    // ===== KEYBOARD SHORTCUT =====
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            sidebar?.classList.remove("active");
            overlay?.classList.remove("active");
        }
    });

    // ===== STAT CARD ANIMATION =====
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = "fadeUp 0.5s ease forwards";
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll(".stat-card").forEach((c, i) => {
        c.style.animationDelay = (i * 0.08) + "s";
        observer.observe(c);
    });
});
