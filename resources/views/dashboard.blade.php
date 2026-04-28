<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AdaLaundry Admin</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
</head>

<body class="admin-dashboard">
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="32" height="32" rx="8" fill="#14b8a6" />
                <path
                    d="M10 12C10 10.8954 10.8954 10 12 10H20C21.1046 10 22 10.8954 22 12V20C22 21.1046 21.1046 22 20 22H12C10.8954 22 10 21.1046 10 20V12Z"
                    stroke="white" stroke-width="1.5" fill="none" />
                <circle cx="16" cy="16" r="2" fill="white" />
            </svg>
            <span>AdaLaundry</span>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.index') }}" class="nav-item {{ ($activeSection ?? 'dashboard') === 'dashboard' ? 'active' : '' }}" data-section="dashboard">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7"></rect>
                    <rect x="14" y="3" width="7" height="7"></rect>
                    <rect x="14" y="14" width="7" height="7"></rect>
                    <rect x="3" y="14" width="7" height="7"></rect>
                </svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.transactions.index') }}" class="nav-item {{ ($activeSection ?? 'dashboard') === 'transaksi' ? 'active' : '' }}" data-section="transaksi">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <polyline points="19 12 12 19 5 12"></polyline>
                </svg>
                <span>Transaksi</span>
            </a>
            <a href="{{ route('admin.members.index') }}" class="nav-item {{ ($activeSection ?? 'dashboard') === 'member' ? 'active' : '' }}" data-section="member">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Member</span>
            </a>
            <a href="{{ route('admin.price-lists.index') }}" class="nav-item {{ ($activeSection ?? 'dashboard') === 'harga' ? 'active' : '' }}" data-section="harga">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
                <span>Harga</span>
            </a>
            <a href="{{ route('admin.reports.index') }}" class="nav-item {{ ($activeSection ?? 'dashboard') === 'laporan' ? 'active' : '' }}" data-section="laporan">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 17"></polyline>
                    <polyline points="17 6 23 6 23 12"></polyline>
                </svg>
                <span>Laporan</span>
            </a>
            <a href="{{ route('admin.vouchers.index') }}" class="nav-item {{ ($activeSection ?? 'dashboard') === 'voucher' ? 'active' : '' }}" data-section="voucher">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="4" y1="4" x2="20" y2="4"></line>
                    <line x1="4" y1="20" x2="20" y2="20"></line>
                    <line x1="4" y1="12" x2="20" y2="12"></line>
                    <circle cx="12" cy="12" r="2"></circle>
                </svg>
                <span>Voucher</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="#" class="user-profile">
                <div class="user-avatar">{{ substr(auth()->user()->name, 0, 1) }}</div>
                <div class="user-info">
                    <p class="user-name">{{ auth()->user()->name }}</p>
                    <p class="user-role">Admin</p>
                </div>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Bar -->
        <div class="topbar" style="transition: opacity 0.3s ease;">
            <div class="topbar-left">
                <button class="menu-toggle">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>
                <div class="search-box">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" placeholder="Cari transaksi, member...">
                </div>
            </div>

            <div class="topbar-right">
                <button class="notification-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="notification-badge">3</span>
                </button>
                <div class="user-menu">
                    <div class="user-avatar-top">{{ substr(auth()->user()->name, 0, 1) }}</div>
                </div>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div data-section="dashboard" style="display: {{ ($activeSection ?? 'dashboard') === 'dashboard' ? 'block' : 'none' }}; opacity: 1; transition: opacity 0.3s ease;">
            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h1>Dashboard</h1>
                    <p class="text-muted">Selamat datang kembali, {{ auth()->user()->name }}!</p>
                </div>
                <div class="page-actions">
                    <select class="filter-select">
                        <option>Hari Ini</option>
                        <option>Minggu Ini</option>
                        <option>Bulan Ini</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <h3>Total Member</h3>
                    <div class="stat-icon member-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>
                <p class="stat-value">1,234</p>
                <p class="stat-change positive">+12% dari minggu lalu</p>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <h3>Total Transaksi</h3>
                    <div class="stat-icon transaction-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                            <path d="M2 10h20"></path>
                        </svg>
                    </div>
                </div>
                <p class="stat-value">2,847</p>
                <p class="stat-change positive">+8% dari bulan lalu</p>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <h3>Pendapatan Hari Ini</h3>
                    <div class="stat-icon revenue-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
                <p class="stat-value">Rp 2.4M</p>
                <p class="stat-change positive">+5% dari kemarin</p>
            </div>

            <div class="stat-card">
                <div class="stat-header">
                    <h3>Laundry Aktif</h3>
                    <div class="stat-icon active-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                        </svg>
                    </div>
                </div>
                <p class="stat-value">47</p>
                <p class="stat-change">Sedang diproses</p>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="charts-grid">
            <div class="chart-card">
                <div class="chart-header">
                    <h2>Transaksi Per Hari</h2>
                    <button class="chart-menu">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button>
                </div>
                <svg class="chart-svg" viewBox="0 0 600 300" preserveAspectRatio="xMidYMid meet">
                    <!-- Grid -->
                    <line x1="60" y1="250" x2="580" y2="250" stroke="#e5e7eb" stroke-width="1" />
                    <line x1="60" y1="200" x2="580" y2="200" stroke="#e5e7eb" stroke-width="1" stroke-dasharray="4" />
                    <line x1="60" y1="150" x2="580" y2="150" stroke="#e5e7eb" stroke-width="1" stroke-dasharray="4" />
                    <line x1="60" y1="100" x2="580" y2="100" stroke="#e5e7eb" stroke-width="1" stroke-dasharray="4" />
                    <line x1="60" y1="50" x2="580" y2="50" stroke="#e5e7eb" stroke-width="1" />
                    <!-- Line -->
                    <polyline points="60,180 120,120 180,140 240,90 300,110 360,70 420,95 480,60 540,80"
                        stroke="#14b8a6" stroke-width="2.5" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <!-- Axis -->
                    <line x1="60" y1="50" x2="60" y2="250" stroke="#9ca3af" stroke-width="1.5" />
                    <line x1="60" y1="250" x2="580" y2="250" stroke="#9ca3af" stroke-width="1.5" />
                </svg>
            </div>

            <div class="chart-card">
                <div class="chart-header">
                    <h2>Pendapatan Bulanan</h2>
                    <button class="chart-menu">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button>
                </div>
                <svg class="chart-svg" viewBox="0 0 600 300" preserveAspectRatio="xMidYMid meet">
                    <!-- Grid -->
                    <line x1="60" y1="250" x2="580" y2="250" stroke="#e5e7eb" stroke-width="1" />
                    <line x1="60" y1="200" x2="580" y2="200" stroke="#e5e7eb" stroke-width="1" stroke-dasharray="4" />
                    <line x1="60" y1="150" x2="580" y2="150" stroke="#e5e7eb" stroke-width="1" stroke-dasharray="4" />
                    <line x1="60" y1="100" x2="580" y2="100" stroke="#e5e7eb" stroke-width="1" stroke-dasharray="4" />
                    <!-- Bars -->
                    <rect x="80" y="150" width="40" height="100" fill="#14b8a6" rx="4" opacity="0.9" />
                    <rect x="140" y="120" width="40" height="130" fill="#14b8a6" rx="4" />
                    <rect x="200" y="100" width="40" height="150" fill="#14b8a6" rx="4" />
                    <rect x="260" y="130" width="40" height="120" fill="#14b8a6" rx="4" />
                    <rect x="320" y="80" width="40" height="170" fill="#14b8a6" rx="4" />
                    <rect x="380" y="110" width="40" height="140" fill="#14b8a6" rx="4" />
                    <rect x="440" y="90" width="40" height="160" fill="#14b8a6" rx="4" />
                    <rect x="500" y="120" width="40" height="130" fill="#14b8a6" rx="4" />
                    <!-- Axis -->
                    <line x1="60" y1="50" x2="60" y2="250" stroke="#9ca3af" stroke-width="1.5" />
                    <line x1="60" y1="250" x2="580" y2="250" stroke="#9ca3af" stroke-width="1.5" />
                </svg>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="table-card">
            <div class="table-header">
                <h2>Pesanan Terbaru</h2>
                <a href="#" class="link-primary">Lihat Semua →</a>
            </div>

            <div class="table-wrapper">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">A</div>
                                    <div>
                                        <p class="font-medium">Andi Wijaya</p>
                                        <p class="text-sm text-muted">ID: #1001</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="status-badge status-processing">Proses</span></td>
                            <td>24 Apr 2024</td>
                            <td class="font-medium">Rp 125.000</td>
                            <td>
                                <button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">S</div>
                                    <div>
                                        <p class="font-medium">Siti Nurhaliza</p>
                                        <p class="text-sm text-muted">ID: #1002</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="status-badge status-completed">Selesai</span></td>
                            <td>23 Apr 2024</td>
                            <td class="font-medium">Rp 250.000</td>
                            <td>
                                <button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">B</div>
                                    <div>
                                        <p class="font-medium">Budi Santoso</p>
                                        <p class="text-sm text-muted">ID: #1003</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="status-badge status-pickup">Diambil</span></td>
                            <td>22 Apr 2024</td>
                            <td class="font-medium">Rp 180.000</td>
                            <td>
                                <button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">R</div>
                                    <div>
                                        <p class="font-medium">Ratih Kusuma</p>
                                        <p class="text-sm text-muted">ID: #1004</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="status-badge status-processing">Proses</span></td>
                            <td>21 Apr 2024</td>
                            <td class="font-medium">Rp 320.000</td>
                            <td>
                                <button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="customer-cell">
                                    <div class="customer-avatar">D</div>
                                    <div>
                                        <p class="font-medium">Dewi Lestari</p>
                                        <p class="text-sm text-muted">ID: #1005</p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="status-badge status-completed">Selesai</span></td>
                            <td>20 Apr 2024</td>
                            <td class="font-medium">Rp 95.000</td>
                            <td>
                                <button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Transaksi Section -->
        <div data-section="transaksi" style="display: {{ ($activeSection ?? 'dashboard') === 'transaksi' ? 'block' : 'none' }}; opacity: 1; transition: opacity 0.3s ease;">
            <div class="page-header">
                <div>
                    <h1>Daftar Transaksi</h1>
                    <p class="text-muted">Kelola semua transaksi pelanggan Anda</p>
                </div>
                <div class="page-actions">
                    <button class="action-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        Tambah Transaksi
                    </button>
                </div>
            </div>
            <div class="table-card">
                <div class="table-header">
                    <h2>Semua Transaksi</h2>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="customer-cell">
                                        <div class="customer-avatar">A</div>
                                        <div>
                                            <p class="font-medium">Andi Wijaya</p>
                                            <p class="text-sm text-muted">ID: #1001</p>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="status-badge status-processing">Proses</span></td>
                                <td>24 Apr 2024</td>
                                <td class="font-medium">Rp 125.000</td>
                                <td><button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Member Section -->
        <div data-section="member" style="display: {{ ($activeSection ?? 'dashboard') === 'member' ? 'block' : 'none' }}; opacity: 1; transition: opacity 0.3s ease;">
            <div class="page-header">
                <div>
                    <h1>Daftar Member</h1>
                    <p class="text-muted">Kelola member dan pelanggan Anda</p>
                </div>
                <div class="page-actions">
                    <button class="action-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                            <path d="M16 11h6M19 8v6"></path>
                        </svg>
                        Tambah Member
                    </button>
                </div>
            </div>
            <div class="table-card">
                <div class="table-header">
                    <h2>Semua Member</h2>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Member</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="customer-cell">
                                        <div class="customer-avatar">A</div>
                                        <div>
                                            <p class="font-medium">Andi Wijaya</p>
                                            <p class="text-sm text-muted">Member aktif</p>
                                        </div>
                                    </div>
                                </td>
                                <td>andi@email.com</td>
                                <td>081234567890</td>
                                <td><span class="font-medium">24 transaksi</span></td>
                                <td><button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Harga Section -->
        <div data-section="harga" style="display: {{ ($activeSection ?? 'dashboard') === 'harga' ? 'block' : 'none' }}; opacity: 1; transition: opacity 0.3s ease;">
            <div class="page-header">
                <div>
                    <h1>Daftar Harga</h1>
                    <p class="text-muted">Kelola harga layanan laundry Anda</p>
                </div>
                <div class="page-actions">
                    <button class="action-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        Tambah Harga
                    </button>
                </div>
            </div>
            <div class="table-card">
                <div class="table-header">
                    <h2>Daftar Harga Layanan</h2>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nama Layanan</th>
                                <th>Tipe</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><p class="font-medium">Cuci Reguler</p></td>
                                <td>Reguler</td>
                                <td class="font-medium">Rp 5.000/kg</td>
                                <td><span class="status-badge status-completed">Aktif</span></td>
                                <td><button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Laporan Section -->
        <div data-section="laporan" style="display: {{ ($activeSection ?? 'dashboard') === 'laporan' ? 'block' : 'none' }}; opacity: 1; transition: opacity 0.3s ease;">
            <div class="page-header">
                <div>
                    <h1>Laporan</h1>
                    <p class="text-muted">Analisis dan laporan bisnis Anda</p>
                </div>
                <div class="page-actions">
                    <select class="filter-select">
                        <option>Bulan Ini</option>
                        <option>Bulan Lalu</option>
                        <option>3 Bulan Terakhir</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <h3>Total Pendapatan</h3>
                        <div class="stat-icon revenue-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="stat-value">Rp 24.5M</p>
                    <p class="stat-change positive">+18% dari bulan lalu</p>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <h3>Total Transaksi</h3>
                        <div class="stat-icon transaction-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                <path d="M2 10h20"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="stat-value">847</p>
                    <p class="stat-change positive">+25% dari bulan lalu</p>
                </div>
            </div>
        </div>

        <!-- Voucher Section -->
        <div data-section="voucher" style="display: {{ ($activeSection ?? 'dashboard') === 'voucher' ? 'block' : 'none' }}; opacity: 1; transition: opacity 0.3s ease;">
            <div class="page-header">
                <div>
                    <h1>Daftar Voucher</h1>
                    <p class="text-muted">Kelola voucher dan promosi Anda</p>
                </div>
                <div class="page-actions">
                    <button class="action-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"></path>
                        </svg>
                        Tambah Voucher
                    </button>
                </div>
            </div>
            <div class="table-card">
                <div class="table-header">
                    <h2>Daftar Voucher</h2>
                </div>
                <div class="table-wrapper">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Kode Voucher</th>
                                <th>Diskon</th>
                                <th>Periode</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><p class="font-medium">LAUNDRY2024</p></td>
                                <td>20%</td>
                                <td>01-30 Apr 2024</td>
                                <td><span class="status-badge status-completed">Aktif</span></td>
                                <td><button class="action-btn">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                        <circle cx="12" cy="5" r="2"></circle>
                                        <circle cx="12" cy="12" r="2"></circle>
                                        <circle cx="12" cy="19" r="2"></circle>
                                    </svg>
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="quick-actions">
            <button class="action-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M12 5v14M5 12h14"></path>
                </svg>
                Tambah Transaksi
            </button>
            <button class="action-secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M16 11h6M19 8v6"></path>
                </svg>
                Tambah Member
            </button>
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('js/admin-dashboard.js') }}"></script>
</body>

</html>