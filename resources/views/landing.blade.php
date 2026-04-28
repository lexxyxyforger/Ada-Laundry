<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdaLaundry - Laundry Jadi Lebih Mudah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/modern-landing.css') }}">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container navbar-container">
            <div class="navbar-brand">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="32" height="32" rx="8" fill="#14b8a6" />
                    <path
                        d="M10 12C10 10.8954 10.8954 10 12 10H20C21.1046 10 22 10.8954 22 12V20C22 21.1046 21.1046 22 20 22H12C10.8954 22 10 21.1046 10 20V12Z"
                        stroke="white" stroke-width="1.5" fill="none" />
                    <circle cx="16" cy="16" r="2" fill="white" />
                </svg>
                <span class="brand-text">AdaLaundry</span>
            </div>

            <div class="navbar-menu">
                <a href="#home" class="nav-link active">Home</a>
                <a href="#fitur" class="nav-link">Fitur</a>
                <a href="#tentang" class="nav-link">Tentang</a>
                <a href="#kontak" class="nav-link">Kontak</a>
            </div>

            <div class="navbar-actions">
                @auth
                <div class="profile-dropdown">
                    <button class="profile-toggle">
                        <div class="profile-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                        <span class="profile-name">{{ auth()->user()->name }}</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">
                            <div class="dropdown-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                            <div class="dropdown-user-info">
                                <p class="dropdown-user-name">{{ auth()->user()->name }}</p>
                                <p class="dropdown-user-email">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <hr class="dropdown-divider">
                        <a href="/dashboard" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="8" height="8" rx="1" stroke="currentColor" stroke-width="2" />
                                <rect x="13" y="3" width="8" height="8" rx="1" stroke="currentColor" stroke-width="2" />
                                <rect x="3" y="13" width="8" height="8" rx="1" stroke="currentColor" stroke-width="2" />
                                <rect x="13" y="13" width="8" height="8" rx="1" stroke="currentColor"
                                    stroke-width="2" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                        <a href="#profile" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2" />
                                <path d="M4 20C4 16.1 7.6 13 12 13C16.4 13 20 16.1 20 20" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <span>Profile</span>
                        </a>
                        <a href="#settings" class="dropdown-item">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" />
                                <path
                                    d="M12 1V3M12 21V23M23 12H21M3 12H1M20.485 3.515L19.071 4.929M4.929 19.071L3.515 20.485M20.485 20.485L19.071 19.071M4.929 4.929L3.515 3.515"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <span>Pengaturan</span>
                        </a>
                        <hr class="dropdown-divider">
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="dropdown-item logout-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17 16L21 12M21 12L17 8M21 12H7M13 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H13"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <button class="btn-login" onclick="location.href='{{ route('login.show') }}'">Login</button>
                <button class="btn-signup" onclick="location.href='{{ route('register.show') }}'">Daftar</button>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container hero-container">
            <div class="hero-content">
                <h1 class="hero-title">Laundry Tanpa Ribet</h1>
                <p class="hero-subtitle">Kelola order, pelanggan, dan pembayaran dalam satu sistem terpadu</p>

                <div class="hero-buttons">
                    <button class="btn-primary btn-lg">
                        <span>Mulai Sekarang</span>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 10H13M13 10L10 7M13 10L10 13" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="btn-secondary btn-lg">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2C5.58 2 2 5.58 2 10C2 14.42 5.58 18 10 18C14.42 18 18 14.42 18 10C18 5.58 14.42 2 10 2ZM10 16C6.69 16 4 13.31 4 10C4 6.69 6.69 4 10 4C13.31 4 16 6.69 16 10C16 13.31 13.31 16 10 16ZM9.5 7V11L13.2 13.9L14 12.6L11 10.3V7H9.5Z"
                                fill="currentColor" />
                        </svg>
                        Lihat Demo
                    </button>
                </div>

                <div class="hero-stats">
                    <div class="stat">
                        <h3>1000+</h3>
                        <p>Bisnis Laundry</p>
                    </div>
                    <div class="stat">
                        <h3>50K+</h3>
                        <p>Pengguna Aktif</p>
                    </div>
                    <div class="stat">
                        <h3>4.9⭐</h3>
                        <p>Rating</p>
                    </div>
                </div>
            </div>

            <div class="hero-illustration">
                <div class="illustration-wrapper">
                    <svg viewBox="0 0 400 400" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Washing Machine -->
                        <rect x="80" y="60" width="240" height="260" rx="20" fill="#f0f0f0" stroke="#e5e7eb"
                            stroke-width="2" />
                        <rect x="100" y="80" width="200" height="160" rx="16" fill="#14b8a6" />
                        <circle cx="200" cy="160" r="60" fill="#ffffff" opacity="0.3" />
                        <circle cx="200" cy="160" r="40" fill="#ffffff" opacity="0.5" />

                        <!-- Clothes -->
                        <g class="floating-clothes">
                            <circle cx="200" cy="100" r="8" fill="#ff6b6b" />
                            <circle cx="180" cy="120" r="6" fill="#4ecdc4" />
                            <circle cx="220" cy="110" r="7" fill="#ffd93d" />
                        </g>

                        <!-- Control Panel -->
                        <rect x="120" y="260" width="160" height="40" rx="8" fill="#e5e7eb" />
                        <circle cx="150" cy="280" r="6" fill="#14b8a6" />
                        <circle cx="200" cy="280" r="6" fill="#d1d5db" />
                        <circle cx="250" cy="280" r="6" fill="#d1d5db" />

                        <!-- Decorative Elements -->
                        <g class="floating-bubbles">
                            <circle cx="320" cy="80" r="4" fill="#14b8a6" opacity="0.3" />
                            <circle cx="350" cy="150" r="3" fill="#14b8a6" opacity="0.2" />
                            <circle cx="60" cy="200" r="5" fill="#14b8a6" opacity="0.25" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Floating Cards Animation -->
        <div class="floating-cards">
            <div class="float-card" style="animation-delay: 0s">
                <div class="card-icon">✓</div>
                <span>Cepat & Mudah</span>
            </div>
            <div class="float-card" style="animation-delay: 1s">
                <div class="card-icon">💰</div>
                <span>Hemat Biaya</span>
            </div>
            <div class="float-card" style="animation-delay: 2s">
                <div class="card-icon">📊</div>
                <span>Terukur</span>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="fitur">
        <div class="container">
            <div class="section-header">
                <h2>Fitur Unggulan</h2>
                <p>Solusi lengkap untuk bisnis laundry modern Anda</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#14b8a6" opacity="0.1" />
                            <path
                                d="M20 10C14.5 10 10 14.5 10 20C10 25.5 14.5 30 20 30C25.5 30 30 25.5 30 20C30 14.5 25.5 10 20 10ZM18 24L14 20L15.4 18.6L18 21.2L24.6 14.6L26 16L18 24Z"
                                fill="#14b8a6" />
                        </svg>
                    </div>
                    <h3>Manajemen Order</h3>
                    <p>Kelola semua order laundry pelanggan dengan mudah dan terorganisir</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#14b8a6" opacity="0.1" />
                            <path
                                d="M20 12C15.6 12 12 15.6 12 20C12 24.4 15.6 28 20 28C24.4 28 28 24.4 28 20C28 15.6 24.4 12 20 12ZM20 26C16.7 26 14 23.3 14 20C14 16.7 16.7 14 20 14C23.3 14 26 16.7 26 20C26 23.3 23.3 26 20 26ZM20.5 16H19V21L23.2 23.5L23.9 22.1L20.5 20.1V16Z"
                                fill="#14b8a6" />
                        </svg>
                    </div>
                    <h3>Tracking Status</h3>
                    <p>Pantau status order: Cuci, Kering, Selesai, dan Pengambilan</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#14b8a6" opacity="0.1" />
                            <path
                                d="M28 14H26V12C26 11.4 25.6 11 25 11C24.4 11 24 11.4 24 12V14H16V12C16 11.4 15.6 11 15 11C14.4 11 14 11.4 14 12V14H12C10.9 14 10 14.9 10 16V28C10 29.1 10.9 30 12 30H28C29.1 30 30 29.1 30 28V16C30 14.9 29.1 14 28 14ZM28 28H12V19H28V28Z"
                                fill="#14b8a6" />
                        </svg>
                    </div>
                    <h3>Dashboard Admin</h3>
                    <p>Dashboard intuitif untuk mengelola semua aspek bisnis laundry</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#14b8a6" opacity="0.1" />
                            <path
                                d="M25 12H24V10C24 9.4 23.6 9 23 9C22.4 9 22 9.4 22 10V12H18V10C18 9.4 17.6 9 17 9C16.4 9 16 9.4 16 10V12H15C13.3 12 12 13.3 12 15V26C12 27.7 13.3 29 15 29H25C26.7 29 28 27.7 28 26V15C28 13.3 26.7 12 25 12ZM25 26H15V18H25V26Z"
                                fill="#14b8a6" />
                        </svg>
                    </div>
                    <h3>Laporan Keuangan</h3>
                    <p>Analisis mendalam tentang pendapatan dan pengeluaran bisnis</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#14b8a6" opacity="0.1" />
                            <path
                                d="M20 10C14.5 10 10 14.5 10 20C10 25.5 14.5 30 20 30C25.5 30 30 25.5 30 20C30 14.5 25.5 10 20 10ZM20 28C15.6 28 12 24.4 12 20C12 15.6 15.6 12 20 12C24.4 12 28 15.6 28 20C28 24.4 24.4 28 20 28ZM20.5 15H19V20.5H24V19H20.5V15Z"
                                fill="#14b8a6" />
                        </svg>
                    </div>
                    <h3>Manajemen Pelanggan</h3>
                    <p>Kelola data pelanggan dan riwayat transaksi dengan aman</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="8" fill="#14b8a6" opacity="0.1" />
                            <path
                                d="M26 14H24C23.4 14 23 13.6 23 13V11C23 10.4 23.4 10 24 10H26C26.6 10 27 10.4 27 11V13C27 13.6 26.6 14 26 14ZM20 14H18C17.4 14 17 13.6 17 13V11C17 10.4 17.4 10 18 10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM14 14H12C11.4 14 11 13.6 11 13V11C11 10.4 11.4 10 12 10H14C14.6 10 15 10.4 15 11V13C15 13.6 14.6 14 14 14ZM28 16H12C10.9 16 10 16.9 10 18V28C10 29.1 10.9 30 12 30H28C29.1 30 30 29.1 30 28V18C30 16.9 29.1 16 28 16ZM28 28H12V20H28V28Z"
                                fill="#14b8a6" />
                        </svg>
                    </div>
                    <h3>Integrasi Pembayaran</h3>
                    <p>Terima pembayaran melalui berbagai metode dengan aman</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="tentang">
        <div class="container about-container">
            <div class="about-content">
                <h2>Mengapa Pilih AdaLaundry?</h2>
                <p>AdaLaundry adalah solusi manajemen laundry digital yang dirancang khusus untuk memenuhi kebutuhan
                    bisnis laundry modern di Indonesia.</p>

                <div class="about-grid">
                    <div class="about-item">
                        <div class="about-number">1</div>
                        <h4>Mudah Digunakan</h4>
                        <p>Interface yang intuitif membuat siapa saja bisa menggunakannya tanpa pelatihan khusus</p>
                    </div>
                    <div class="about-item">
                        <div class="about-number">2</div>
                        <h4>Hemat Waktu</h4>
                        <p>Otomatisasi proses bisnis hingga 80% sehingga tim Anda bisa fokus pada layanan</p>
                    </div>
                    <div class="about-item">
                        <div class="about-number">3</div>
                        <h4>Tingkatkan Penjualan</h4>
                        <p>Kelola pelanggan lebih baik dan tingkatkan retention hingga 3x lipat</p>
                    </div>
                </div>
            </div>

            <div class="about-image">
                <div class="image-placeholder">
                    <svg viewBox="0 0 300 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="300" height="300" rx="20" fill="#f0fdf4" />
                        <g class="animate-float">
                            <circle cx="150" cy="80" r="40" fill="#14b8a6" opacity="0.2" />
                            <circle cx="150" cy="80" r="35" fill="#14b8a6" opacity="0.3" />
                            <path d="M130 80L140 90L170 60" stroke="#14b8a6" stroke-width="3" stroke-linecap="round"
                                stroke-linejoin="round" fill="none" />
                        </g>
                        <g class="animate-pulse">
                            <rect x="60" y="150" width="180" height="100" rx="12" fill="#f3f4f6" stroke="#e5e7eb"
                                stroke-width="2" />
                            <circle cx="80" cy="170" r="6" fill="#14b8a6" />
                            <line x1="95" y1="170" x2="220" y2="170" stroke="#d1d5db" stroke-width="2"
                                stroke-linecap="round" />
                            <line x1="95" y1="190" x2="220" y2="190" stroke="#d1d5db" stroke-width="2"
                                stroke-linecap="round" />
                            <line x1="95" y1="210" x2="180" y2="210" stroke="#d1d5db" stroke-width="2"
                                stroke-linecap="round" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container cta-container">
            <h2>Siap Mengembangkan Bisnis Laundry Anda?</h2>
            <p>Bergabunglah dengan ribuan bisnis laundry yang telah mempercayai AdaLaundry</p>
            <button class="btn-primary btn-lg">Mulai Gratis Hari Ini</button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-brand">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="8" fill="#14b8a6" />
                            <path
                                d="M10 12C10 10.8954 10.8954 10 12 10H20C21.1046 10 22 10.8954 22 12V20C22 21.1046 21.1046 22 20 22H12C10.8954 22 10 21.1046 10 20V12Z"
                                stroke="white" stroke-width="1.5" fill="none" />
                            <circle cx="16" cy="16" r="2" fill="white" />
                        </svg>
                        <span>AdaLaundry</span>
                    </div>
                    <p>Solusi manajemen laundry digital untuk bisnis Anda</p>
                </div>

                <div class="footer-section">
                    <h4>Produk</h4>
                    <a href="#fitur">Fitur</a>
                    <a href="#pricing">Harga</a>
                    <a href="#docs">Dokumentasi</a>
                </div>

                <div class="footer-section">
                    <h4>Perusahaan</h4>
                    <a href="#about">Tentang</a>
                    <a href="#blog">Blog</a>
                    <a href="#contact">Kontak</a>
                </div>

                <div class="footer-section">
                    <h4>Legal</h4>
                    <a href="#privacy">Privasi</a>
                    <a href="#terms">Syarat</a>
                    <a href="#security">Keamanan</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 AdaLaundry. Semua hak dilindungi.</p>
                <div class="social-links">
                    <a href="#" aria-label="Twitter">𝕏</a>
                    <a href="#" aria-label="Facebook">f</a>
                    <a href="#" aria-label="Instagram">📷</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/modern-landing.js') }}"></script>
</body>

</html>