<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
</head>

<body class="admin-dashboard">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-wrap">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="32" height="32" rx="10" fill="url(#logoGrad)" />
                    <path d="M9 13C9 11.3431 10.3431 10 12 10H20C21.6569 10 23 11.3431 23 13V19C23 20.6569 21.6569 22 20 22H12C10.3431 22 9 20.6569 9 19V13Z" stroke="white" stroke-width="1.5" fill="none" />
                    <circle cx="16" cy="16" r="2.5" fill="white" />
                    <path d="M13 10V8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M19 10V8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    <defs>
                        <linearGradient id="logoGrad" x1="0" y1="0" x2="32" y2="32" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#14b8a6"/>
                            <stop offset="1" stop-color="#0284c7"/>
                        </linearGradient>
                    </defs>
                </svg>
                <span>AdaLaundry</span>
            </div>
        </div>

        <div class="sidebar-label">MENU UTAMA</div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.index') }}" class="nav-item active" id="nav-dashboard" data-section="dashboard">
                <div class="nav-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                </div>
                <span>Dashboard</span>
            </a>

            <a href="#" class="nav-item" id="nav-profile" data-section="profile">
                <div class="nav-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <span>Profil Saya</span>
            </a>
        </nav>

        <div class="sidebar-divider"></div>

        <div class="sidebar-footer">
            <div class="user-card">
                <div class="user-avatar-sidebar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <div class="user-info-sidebar">
                    <p class="user-name-sidebar">{{ auth()->user()->name }}</p>
                    <p class="user-role-sidebar">Administrator</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn" title="Keluar">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Mobile Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Bar -->
        <div class="topbar">
            <div class="topbar-left">
                <button class="menu-toggle" id="menuToggle">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <div class="breadcrumb" id="breadcrumb">
                    <span class="breadcrumb-root">AdaLaundry</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    <span class="breadcrumb-current" id="breadcrumbCurrent">Dashboard</span>
                </div>
            </div>

            <div class="topbar-right">
                <div class="topbar-date">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span id="currentDate"></span>
                </div>
                <div class="topbar-avatar" id="topbarAvatar">
                    {{ substr(auth()->user()->name, 0, 1) }}
                    <div class="avatar-status"></div>
                </div>
            </div>
        </div>

        <!-- ========== DASHBOARD SECTION ========== -->
        <div data-section="dashboard" class="section-content active-section">
            <!-- Hero Welcome -->
            <div class="hero-welcome">
                <div class="hero-text">
                    <h1>Selamat Datang, <span class="hero-name">{{ auth()->user()->name }}</span> 👋</h1>
                    <p class="hero-sub">Pantau semua aktivitas laundry Anda dari satu tempat.</p>
                </div>
                <div class="hero-badge">
                    <div class="pulse-ring"></div>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                    <span>Sistem Aktif</span>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card stat-blue">
                    <div class="stat-icon-wrap">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="stat-body">
                        <p class="stat-label">Total Member</p>
                        <p class="stat-number" id="total-members">—</p>
                        <p class="stat-desc">Member aktif terdaftar</p>
                    </div>
                    <div class="stat-sparkline"></div>
                </div>

                <div class="stat-card stat-purple">
                    <div class="stat-icon-wrap">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                            <path d="M2 10h20"></path>
                        </svg>
                    </div>
                    <div class="stat-body">
                        <p class="stat-label">Total Transaksi</p>
                        <p class="stat-number" id="total-transactions">—</p>
                        <p class="stat-desc">Sepanjang waktu</p>
                    </div>
                    <div class="stat-sparkline"></div>
                </div>

                <div class="stat-card stat-green">
                    <div class="stat-icon-wrap">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <div class="stat-body">
                        <p class="stat-label">Pendapatan Bulan Ini</p>
                        <p class="stat-number" id="total-revenue">—</p>
                        <p class="stat-desc">Bulan berjalan</p>
                    </div>
                    <div class="stat-sparkline"></div>
                </div>

                <div class="stat-card stat-orange">
                    <div class="stat-icon-wrap">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                    <div class="stat-body">
                        <p class="stat-label">Transaksi Pending</p>
                        <p class="stat-number" id="pending-transactions">—</p>
                        <p class="stat-desc">Sedang diproses</p>
                    </div>
                    <div class="stat-sparkline"></div>
                </div>
            </div>

            <!-- Activity & Info Row -->
            <div class="dashboard-row">
                <!-- Recent Activity -->
                <div class="dash-card activity-card">
                    <div class="dash-card-header">
                        <h2>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            Aktivitas Terbaru
                        </h2>
                        <span class="badge-live">Live</span>
                    </div>
                    <div class="activity-list" id="activity-list">
                        <div class="activity-item">
                            <div class="act-dot act-green"></div>
                            <div class="act-info">
                                <p class="act-title">Sistem berjalan normal</p>
                                <p class="act-time">Baru saja</p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="act-dot act-blue"></div>
                            <div class="act-info">
                                <p class="act-title">Dashboard dimuat</p>
                                <p class="act-time" id="loadTime"></p>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="act-dot act-orange"></div>
                            <div class="act-info">
                                <p class="act-title">Data statistik diperbarui</p>
                                <p class="act-time">Otomatis setiap 30 detik</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Info -->
                <div class="dash-card info-card">
                    <div class="dash-card-header">
                        <h2>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            Info Sistem
                        </h2>
                    </div>
                    <div class="info-list">
                        <div class="info-item">
                            <span class="info-key">Nama Admin</span>
                            <span class="info-val">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-key">Email</span>
                            <span class="info-val">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-key">Role</span>
                            <span class="info-val"><span class="role-badge">Administrator</span></span>
                        </div>
                        <div class="info-item">
                            <span class="info-key">Status</span>
                            <span class="info-val"><span class="status-online">● Online</span></span>
                        </div>
                        <div class="info-item">
                            <span class="info-key">Waktu Login</span>
                            <span class="info-val" id="loginTime"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Transactions Table -->
            <div class="dash-card table-dash-card">
                <div class="dash-card-header">
                    <h2>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                        Transaksi Terbaru
                    </h2>
                    <a href="{{ route('admin.transactions.index') }}" class="view-all-link">Lihat Semua →</a>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Pelanggan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($ongoingTransactions) && $ongoingTransactions->count() > 0)
                                @foreach($ongoingTransactions->take(5) as $transaction)
                                <tr>
                                    <td>
                                        <div class="customer-cell">
                                            <div class="customer-avatar">{{ substr($transaction->member->name, 0, 1) }}</div>
                                            <div>
                                                <p class="font-medium">{{ $transaction->member->name }}</p>
                                                <p class="text-sm text-muted">#{{ $transaction->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="status-badge status-processing">Diproses</span></td>
                                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                                    <td class="font-medium">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="empty-state">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                        </svg>
                                        <p>Belum ada transaksi</p>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ========== PROFILE SECTION ========== -->
        <div data-section="profile" class="section-content">
            <div class="profile-hero">
                <div class="profile-cover"></div>
                <div class="profile-top">
                    <div class="profile-avatar-wrap">
                        <div class="profile-avatar-big">{{ substr(auth()->user()->name, 0, 1) }}</div>
                        <div class="profile-avatar-status"></div>
                    </div>
                    <div class="profile-hero-info">
                        <h1>{{ auth()->user()->name }}</h1>
                        <p>{{ auth()->user()->email }}</p>
                        <span class="profile-role-chip">Administrator</span>
                    </div>
                </div>
            </div>

            <div class="profile-body">
                <!-- Edit Profile Form -->
                <div class="profile-card">
                    <div class="profile-card-header">
                        <div class="pcard-icon blue-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div>
                            <h2>Informasi Profil</h2>
                            <p>Perbarui nama dan informasi akun Anda</p>
                        </div>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <div class="input-wrap">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" placeholder="Nama lengkap Anda">
                                </div>
                                @error('name') <p class="form-error">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <div class="input-wrap">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" placeholder="email@domain.com">
                                </div>
                                @error('email') <p class="form-error">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        @if(session('status') === 'profile-updated')
                            <div class="alert-success">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                Profil berhasil diperbarui!
                            </div>
                        @endif
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Form -->
                <div class="profile-card">
                    <div class="profile-card-header">
                        <div class="pcard-icon green-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                        </div>
                        <div>
                            <h2>Ubah Password</h2>
                            <p>Pastikan akun Anda menggunakan password yang kuat</p>
                        </div>
                    </div>
                    <form action="{{ route('profile.password.update') }}" method="POST" class="profile-form">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <div class="input-wrap">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input type="password" id="current_password" name="current_password" placeholder="Password lama">
                            </div>
                            @error('current_password') <p class="form-error">{{ $message }}</p> @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <div class="input-wrap">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input type="password" id="password" name="password" placeholder="Password baru">
                                </div>
                                @error('password') <p class="form-error">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <div class="input-wrap">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru">
                                </div>
                            </div>
                        </div>
                        @if(session('status') === 'password-updated')
                            <div class="alert-success">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                Password berhasil diperbarui!
                            </div>
                        @endif
                        <div class="form-actions">
                            <button type="submit" class="btn-primary btn-green">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                Perbarui Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>

    <script src="{{ asset('js/admin-dashboard.js') }}"></script>
</body>

</html>
