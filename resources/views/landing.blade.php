<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AdaLaundry — Sistem manajemen laundry modern untuk bisnis Anda. Kelola transaksi, member, dan laporan dalam satu dashboard.">
    <title>AdaLaundry — Laundry Jadi Lebih Mudah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/modern-landing.css') }}">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar" id="navbar">
    <div class="container nbc">
        <a href="#home" class="brand">
            <svg width="34" height="34" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="10" fill="url(#ng)"/>
                <path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/>
                <circle cx="16" cy="16" r="2.2" fill="white"/>
                <path d="M13 10V8M19 10V8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <defs><linearGradient id="ng" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs>
            </svg>
            AdaLaundry
        </a>

        <div class="nav-links">
            <a href="#home" class="active">Beranda</a>
            <a href="#fitur">Fitur</a>
            <a href="#cara-kerja">Cara Kerja</a>
            <a href="#harga">Harga</a>
            <a href="#testimoni">Testimoni</a>
        </div>

        <div class="nav-acts">
            @auth
            <div class="pdrop" id="pdrop">
                <button class="ptoggle" id="ptoggle">
                    <div class="pava">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <span>{{ auth()->user()->name }}</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <div class="dmenu" id="dmenu">
                    <div class="dhead">
                        <div class="dava">{{ substr(auth()->user()->name, 0, 1) }}</div>
                        <div>
                            <p class="duname">{{ auth()->user()->name }}</p>
                            <p class="duemail">{{ auth()->user()->email }}</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.index') }}" class="ditem">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('profile.index') }}" class="ditem">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Profil Saya
                    </a>
                    <hr class="dhr">
                    <form action="{{ route('logout') }}" method="POST" style="margin:0">
                        @csrf
                        <button type="submit" class="ditem red" style="width:100%">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
            @else
            <button class="btn-login" onclick="location.href='{{ route('login.show') }}'">Masuk</button>
            <button class="btn-signup" onclick="location.href='{{ route('register.show') }}'">Daftar Gratis</button>
            @endauth
            <button class="burger" id="burger">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
        </div>
    </div>
</nav>

<!-- MOBILE MENU -->
<div class="mob-menu" id="mobMenu">
    <a href="#home">Beranda</a>
    <a href="#fitur">Fitur</a>
    <a href="#cara-kerja">Cara Kerja</a>
    <a href="#harga">Harga</a>
    <a href="#testimoni">Testimoni</a>
    <div class="mob-divider"></div>
    @auth
    <a href="{{ route('admin.index') }}">→ Dashboard</a>
    @else
    <a href="{{ route('login.show') }}" class="hbtn-sec">Masuk</a>
    <a href="{{ route('register.show') }}" class="hbtn-main">Daftar Gratis</a>
    @endauth
</div>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-bg">
        <div class="hblob hb1"></div>
        <div class="hblob hb2"></div>
        <div class="hblob hb3"></div>
        <div class="grid-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-tag">
                    <span class="hero-tag-dot"></span>
                    Platform Laundry #1 di Indonesia
                </div>
                <h1 class="hero-title">Kelola Laundry<br><span class="hl">Lebih Cerdas</span><br>& Efisien</h1>
                <p class="hero-sub">Sistem manajemen laundry all-in-one. Transaksi, member, laporan keuangan, dan voucher — semua dalam satu dashboard yang realtime.</p>
                <div class="hero-btns">
                    <a href="{{ route('register.show') }}" class="hbtn-main">
                        Mulai Gratis Sekarang
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="#fitur" class="hbtn-sec">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Lihat Fitur
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hstat">
                        <p class="hstat-num" data-count="1000">0</p>
                        <p class="hstat-lbl">Bisnis Laundry</p>
                    </div>
                    <div class="hstat-div"></div>
                    <div class="hstat">
                        <p class="hstat-num" data-count="50000">0</p>
                        <p class="hstat-lbl">Pengguna Aktif</p>
                    </div>
                    <div class="hstat-div"></div>
                    <div class="hstat">
                        <p class="hstat-num" data-target="4.9">4.9 ⭐</p>
                        <p class="hstat-lbl">Rating Pengguna</p>
                    </div>
                </div>
            </div>

            <!-- DASHBOARD MOCKUP -->
            <div class="hero-visual">
                <div class="float-badge fb1">
                    <div class="fb-ic" style="background:#dcfce7">✅</div>
                    Order Selesai +12
                </div>
                <div class="hw-card" style="width:320px">
                    <div class="hw-top">
                        <div class="hw-brand">
                            <svg width="20" height="20" viewBox="0 0 32 32" fill="none"><rect width="32" height="32" rx="8" fill="#14b8a6"/><circle cx="16" cy="16" r="5" fill="white"/></svg>
                            AdaLaundry
                        </div>
                        <span class="hw-live">● LIVE</span>
                    </div>
                    <div class="hw-stats">
                        <div class="hw-stat">
                            <p class="hw-sl">Member</p>
                            <p class="hw-sv">248</p>
                            <p class="hw-sc">↑ +8 bulan ini</p>
                        </div>
                        <div class="hw-stat">
                            <p class="hw-sl">Pendapatan</p>
                            <p class="hw-sv">4.2Jt</p>
                            <p class="hw-sc">↑ +12% vs lalu</p>
                        </div>
                    </div>
                    <div class="hw-chart">
                        <p class="hw-cl">Transaksi 6 Bulan</p>
                        <div class="hw-bars">
                            <div class="hbar" style="--h:30px"></div>
                            <div class="hbar" style="--h:42px"></div>
                            <div class="hbar" style="--h:28px"></div>
                            <div class="hbar" style="--h:48px"></div>
                            <div class="hbar" style="--h:38px"></div>
                            <div class="hbar" style="--h:50px"></div>
                        </div>
                    </div>
                    <div class="hw-txs">
                        <p class="hw-txl">Transaksi Terbaru</p>
                        <div class="hw-tx">
                            <div class="hw-txa">B</div>
                            <div><p class="hw-txn">Budi Santoso</p><p class="hw-txs2">Kiloan — Selesai</p></div>
                            <span class="hw-txamt">Rp 35K</span>
                        </div>
                        <div class="hw-tx">
                            <div class="hw-txa">S</div>
                            <div><p class="hw-txn">Sari Dewi</p><p class="hw-txs2">Satuan — Proses</p></div>
                            <span class="hw-txamt">Rp 80K</span>
                        </div>
                    </div>
                </div>
                <div class="float-badge fb2">
                    <div class="fb-ic" style="background:#dbeafe">💰</div>
                    Pendapatan +23%
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-sec">
    <div class="container">
        <div class="stats-inner">
            <div class="sstat"><p class="sstat-num">1,000+</p><p class="sstat-lbl">Bisnis Laundry</p></div>
            <div class="sstat"><p class="sstat-num">50K+</p><p class="sstat-lbl">Pengguna Aktif</p></div>
            <div class="sstat"><p class="sstat-num">99.9%</p><p class="sstat-lbl">Uptime Sistem</p></div>
            <div class="sstat"><p class="sstat-num">4.9 ⭐</p><p class="sstat-lbl">Rating App</p></div>
        </div>
    </div>
</div>

<!-- FEATURES -->
<section class="features" id="fitur">
    <div class="container">
        <div class="sec-head">
            <div class="sec-tag">✦ Fitur Unggulan</div>
            <h2 class="sec-title">Semua yang Anda Butuhkan</h2>
            <p class="sec-sub">Solusi lengkap untuk mengelola bisnis laundry modern dari satu platform terintegrasi</p>
        </div>
        <div class="feat-grid">
            <div class="fc">
                <div class="fic">📋</div>
                <h3>Manajemen Transaksi</h3>
                <p>Kelola order masuk, pantau status cucian, dan catat pembayaran dengan mudah dan terorganisir.</p>
            </div>
            <div class="fc">
                <div class="fic">👥</div>
                <h3>Database Member</h3>
                <p>Simpan data pelanggan, riwayat transaksi, dan poin reward untuk meningkatkan loyalitas.</p>
            </div>
            <div class="fc">
                <div class="fic">💰</div>
                <h3>Daftar Harga Fleksibel</h3>
                <p>Atur harga layanan satuan dan kiloan dengan kategori yang bisa dikustomisasi sesuai kebutuhan.</p>
            </div>
            <div class="fc">
                <div class="fic">📊</div>
                <h3>Laporan Realtime</h3>
                <p>Analisis pendapatan, jumlah transaksi, dan tren bisnis dengan grafik yang diperbarui otomatis.</p>
            </div>
            <div class="fc">
                <div class="fic">🎫</div>
                <h3>Sistem Voucher</h3>
                <p>Buat dan kelola voucher diskon berbasis poin untuk mempertahankan pelanggan setia Anda.</p>
            </div>
            <div class="fc">
                <div class="fic">⚡</div>
                <h3>Dashboard Realtime</h3>
                <p>Semua data diperbarui otomatis setiap 15 detik — tidak perlu refresh halaman secara manual.</p>
            </div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="how" id="cara-kerja">
    <div class="container">
        <div class="how-inner">
            <div>
                <div class="sec-tag">⚙️ Cara Kerja</div>
                <h2 class="sec-title">Mulai dalam 3 Langkah Mudah</h2>
                <p class="sec-sub">Tidak perlu keahlian teknis. Setup cepat, langsung bisa digunakan.</p>
                <div class="how-steps">
                    <div class="hstep">
                        <div class="hstep-num">1</div>
                        <div>
                            <h4>Daftar Akun</h4>
                            <p>Buat akun gratis dalam hitungan menit. Tidak perlu kartu kredit.</p>
                        </div>
                    </div>
                    <div class="hstep">
                        <div class="hstep-num">2</div>
                        <div>
                            <h4>Atur Layanan & Harga</h4>
                            <p>Tambahkan layanan laundry, daftar harga, dan data member Anda.</p>
                        </div>
                    </div>
                    <div class="hstep">
                        <div class="hstep-num">3</div>
                        <div>
                            <h4>Kelola & Pantau</h4>
                            <p>Mulai terima order dan pantau semua aktivitas bisnis dari dashboard realtime.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="how-visual">
                <div class="how-card">
                    <div class="hvc-head">
                        <div class="hvc-ava">A</div>
                        <div>
                            <p class="hvc-name">Admin Dashboard</p>
                            <p class="hvc-role">Hari ini, {{ date('d M Y') }}</p>
                        </div>
                    </div>
                    <div class="hvc-items">
                        <div class="hvi">
                            <div class="hvi-l">
                                <div class="hvi-ic" style="background:#dcfce7">🧺</div>
                                <div><p class="hvi-n">Budi Santoso</p><p class="hvi-s">Kiloan • 2.5 kg</p></div>
                            </div>
                            <span class="badge-sm bs-green">Selesai</span>
                        </div>
                        <div class="hvi">
                            <div class="hvi-l">
                                <div class="hvi-ic" style="background:#fef3c7">👕</div>
                                <div><p class="hvi-n">Sari Dewi</p><p class="hvi-s">Satuan • 5 item</p></div>
                            </div>
                            <span class="badge-sm bs-yellow">Diproses</span>
                        </div>
                        <div class="hvi">
                            <div class="hvi-l">
                                <div class="hvi-ic" style="background:#dbeafe">🧤</div>
                                <div><p class="hvi-n">Ahmad Rizki</p><p class="hvi-s">Prioritas • 3 kg</p></div>
                            </div>
                            <span class="badge-sm bs-blue">Antrian</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PRICING -->
<section class="pricing" id="harga">
    <div class="container">
        <div class="sec-head">
            <div class="sec-tag">💳 Pilihan Paket</div>
            <h2 class="sec-title">Harga Jujur, Tanpa Biaya Tersembunyi</h2>
            <p class="sec-sub">Pilih paket yang paling sesuai dengan kebutuhan dan skala bisnis laundry Anda saat ini</p>
        </div>
        <div class="pricing-grid">
            <!-- Paket Basic -->
            <div class="pc">
                <h3 class="pc-title">Basic</h3>
                <p class="pc-desc">Cocok untuk laundry pemula dengan skala kecil.</p>
                <div class="pc-price">Rp 0<span class="pc-period">/bulan</span></div>
                <a href="{{ route('checkout', 'basic') }}" class="pc-btn pc-btn-outline">Daftar Basic</a>
                <div class="pc-features">
                    <div class="pcf"><span class="pcf-ic">✓</span> Maksimal 50 Transaksi/bulan</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Pencatatan Transaksi Dasar</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> 1 Akun Kasir</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Laporan Standar</div>
                </div>
            </div>

            <!-- Paket Pro -->
            <div class="pc popular">
                <div class="pc-badge">Paling Laris</div>
                <h3 class="pc-title">Pro (Member)</h3>
                <p class="pc-desc">Fitur lengkap untuk bisnis yang sedang berkembang pesat.</p>
                <div class="pc-price">Rp 99k<span class="pc-period">/bulan</span></div>
                <a href="{{ route('checkout', 'pro') }}" class="pc-btn pc-btn-solid">Langganan Pro</a>
                <div class="pc-features">
                    <div class="pcf"><span class="pcf-ic">✓</span> Transaksi Tanpa Batas</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Fitur Member & Poin Reward</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Pembuatan Voucher Diskon</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Dashboard Analitik Realtime</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Modul Saran & Komplain</div>
                </div>
            </div>

            <!-- Paket Enterprise -->
            <div class="pc">
                <h3 class="pc-title">Enterprise</h3>
                <p class="pc-desc">Untuk laundry skala besar dengan banyak cabang.</p>
                <div class="pc-price">Rp 249k<span class="pc-period">/bulan</span></div>
                <a href="{{ route('checkout', 'enterprise') }}" class="pc-btn pc-btn-outline">Pilih Enterprise</a>
                <div class="pc-features">
                    <div class="pcf"><span class="pcf-ic">✓</span> Semua Fitur Pro</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Manajemen Multi-Cabang</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Laporan Konsolidasi</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Dedicated Support 24/7</div>
                    <div class="pcf"><span class="pcf-ic">✓</span> Custom Domain</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testi" id="testimoni">
    <div class="container">
        <div class="sec-head">
            <div class="sec-tag">💬 Testimoni</div>
            <h2 class="sec-title">Dipercaya Ribuan Pemilik Laundry</h2>
            <p class="sec-sub">Dengarkan pengalaman nyata dari para pengguna AdaLaundry di seluruh Indonesia</p>
        </div>
        <div class="testi-grid">
            <div class="tc">
                <div class="tc-stars">★★★★★</div>
                <p class="tc-text">"AdaLaundry benar-benar mengubah cara saya mengelola bisnis. Sekarang semua tercatat rapi dan saya bisa pantau pendapatan kapan saja."</p>
                <div class="tc-author">
                    <div class="tc-ava">B</div>
                    <div>
                        <p class="tc-name">Budi Hartono</p>
                        <p class="tc-loc">Laundry Express, Surabaya</p>
                    </div>
                </div>
            </div>
            <div class="tc">
                <div class="tc-stars">★★★★★</div>
                <p class="tc-text">"Dashboard realtimenya sangat membantu. Saya tidak perlu menunggu akhir bulan untuk tahu kondisi keuangan laundry saya."</p>
                <div class="tc-author">
                    <div class="tc-ava">S</div>
                    <div>
                        <p class="tc-name">Siti Rahayu</p>
                        <p class="tc-loc">Clean & Fresh Laundry, Bandung</p>
                    </div>
                </div>
            </div>
            <div class="tc">
                <div class="tc-stars">★★★★★</div>
                <p class="tc-text">"Fitur voucher dan member sangat membantu meningkatkan pelanggan setia. Omzet naik 40% dalam 3 bulan pertama pakai AdaLaundry."</p>
                <div class="tc-author">
                    <div class="tc-ava">A</div>
                    <div>
                        <p class="tc-name">Ahmad Fauzi</p>
                        <p class="tc-loc">Bersih Laundry, Jakarta</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <div class="container cta-inner">
        <div class="sec-tag" style="margin:0 auto 20px;width:fit-content">🚀 Mulai Sekarang</div>
        <h2>Siap Mengembangkan Bisnis Laundry Anda?</h2>
        <p>Bergabunglah dengan 1,000+ pemilik laundry yang telah mempercayai AdaLaundry</p>
        <div class="cta-btns">
            <a href="{{ route('register.show') }}" class="hbtn-main">Daftar Gratis Sekarang</a>
            <a href="{{ route('login.show') }}" class="hbtn-sec">Sudah Punya Akun? Masuk</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="fg-brand">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"><rect width="32" height="32" rx="10" fill="url(#fg1)"/><path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/><circle cx="16" cy="16" r="2.2" fill="white"/><defs><linearGradient id="fg1" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs></svg>
                    AdaLaundry
                </div>
                <p class="fg-desc">Solusi manajemen laundry digital all-in-one untuk bisnis modern Indonesia. Realtime, mudah, dan terpercaya.</p>
            </div>
            <div>
                <p class="fg-title">Produk</p>
                <div class="fg-links">
                    <a href="#fitur">Fitur</a>
                    <a href="#cara-kerja">Cara Kerja</a>
                    <a href="{{ route('register.show') }}">Daftar Gratis</a>
                    <a href="{{ route('login.show') }}">Login</a>
                </div>
            </div>
            <div>
                <p class="fg-title">Perusahaan</p>
                <div class="fg-links">
                    <a href="#tentang">Tentang Kami</a>
                    <a href="#testimoni">Testimoni</a>
                    <a href="#">Blog</a>
                    <a href="#">Kontak</a>
                </div>
            </div>
            <div>
                <p class="fg-title">Legal</p>
                <div class="fg-links">
                    <a href="#">Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Keamanan</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© {{ date('Y') }} AdaLaundry. Semua hak dilindungi.</p>
            <div class="social-links">
                <a href="#" class="sl-a" aria-label="Twitter">𝕏</a>
                <a href="#" class="sl-a" aria-label="Instagram">📷</a>
                <a href="#" class="sl-a" aria-label="Facebook">f</a>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/modern-landing.js') }}"></script>
</body>
</html>