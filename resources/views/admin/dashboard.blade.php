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
            <svg width="34" height="34" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="10" fill="url(#lg1)"/>
                <path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/>
                <circle cx="16" cy="16" r="2" fill="white"/>
                <defs><linearGradient id="lg1" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs>
            </svg>
            <span>AdaLaundry</span>
        </div>
    </div>

    <p class="nav-label">MENU UTAMA</p>
    <nav class="sidebar-nav">
        <a href="#" class="nav-item active" data-section="dashboard">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg></div>
            <span>Dashboard</span>
        </a>
        <a href="#" class="nav-item" data-section="transaksi">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg></div>
            <span>Transaksi</span>
            <span class="nav-badge" id="badge-transaksi">0</span>
        </a>
        <a href="#" class="nav-item" data-section="member">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
            <span>Member</span>
            <span class="nav-badge" id="badge-member">0</span>
        </a>
        <a href="#" class="nav-item" data-section="harga">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
            <span>Harga</span>
        </a>
        <a href="#" class="nav-item" data-section="laporan">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 17"/><polyline points="17 6 23 6 23 12"/></svg></div>
            <span>Laporan</span>
        </a>
        <a href="#" class="nav-item" data-section="voucher">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
            <span>Voucher</span>
        </a>
    </nav>

    <p class="nav-label">AKUN</p>
    <nav class="sidebar-nav">
        <a href="#" class="nav-item" data-section="profile">
            <div class="ni"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <span>Profil Saya</span>
        </a>
    </nav>

    <div class="sidebar-bottom">
        <div class="sb-user">
            <div class="sb-avatar">{{ substr(auth()->user()->name,0,1) }}</div>
            <div class="sb-info">
                <p class="sb-name">{{ auth()->user()->name }}</p>
                <p class="sb-role">Administrator</p>
            </div>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Keluar
            </button>
        </form>
    </div>
</aside>
<div class="overlay" id="overlay"></div>

<!-- Main -->
<main class="main-content">
    <!-- Topbar -->
    <div class="topbar">
        <div class="topbar-l">
            <button class="burger" id="burger">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            </button>
            <div class="breadcrumb">
                <span class="bc-root">AdaLaundry</span>
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                <span class="bc-cur" id="bcCur">Dashboard</span>
            </div>
        </div>
        <div class="topbar-r">
            <div class="rt-clock" id="rtClock"></div>
            <div class="rt-dot" title="Realtime aktif">
                <span class="rt-pulse"></span>
                <span>Live</span>
            </div>
            <div class="top-ava" id="topAva">{{ substr(auth()->user()->name,0,1) }}<div class="ava-dot"></div></div>
        </div>
    </div>

    <!-- ===== DASHBOARD ===== -->
    <div data-section="dashboard" class="sec active-sec">
        <div class="hero">
            <div>
                <h1>Selamat Datang, <span class="hl">{{ auth()->user()->name }}</span> 👋</h1>
                <p class="hero-sub">Monitor seluruh aktivitas laundry Anda secara realtime.</p>
            </div>
            <div class="hero-badge"><span class="hb-dot"></span>Sistem Live</div>
        </div>

        <div class="stats-grid">
            <div class="sc blue"><div class="sc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div><div><p class="sc-lbl">Total Member</p><p class="sc-val" id="stat-members">—</p><p class="sc-sub">Member aktif</p></div></div>
            <div class="sc purple"><div class="sc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/></svg></div><div><p class="sc-lbl">Total Transaksi</p><p class="sc-val" id="stat-transactions">—</p><p class="sc-sub">Sepanjang waktu</p></div></div>
            <div class="sc green"><div class="sc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div><div><p class="sc-lbl">Pendapatan Bulan Ini</p><p class="sc-val" id="stat-revenue">—</p><p class="sc-sub">Bulan berjalan</p></div></div>
            <div class="sc orange"><div class="sc-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div><div><p class="sc-lbl">Pending</p><p class="sc-val" id="stat-pending">—</p><p class="sc-sub">Sedang diproses</p></div></div>
        </div>

        <div class="dash-row">
            <div class="card">
                <div class="card-head"><h2><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> Transaksi Terbaru</h2><span class="live-tag">Live</span></div>
                <div class="tbl-wrap"><table class="dtbl" id="dash-tx-table">
                    <thead><tr><th>Pelanggan</th><th>Layanan</th><th>Status</th><th>Total</th></tr></thead>
                    <tbody id="dash-tx-body"><tr><td colspan="4" class="empty-td">Memuat data...</td></tr></tbody>
                </table></div>
            </div>
            <div class="card">
                <div class="card-head"><h2><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg> Info Sistem</h2></div>
                <div class="info-list">
                    <div class="ii"><span class="ik">Nama Admin</span><span class="iv">{{ auth()->user()->name }}</span></div>
                    <div class="ii"><span class="ik">Email</span><span class="iv">{{ auth()->user()->email }}</span></div>
                    <div class="ii"><span class="ik">Role</span><span class="iv"><span class="chip-role">Administrator</span></span></div>
                    <div class="ii"><span class="ik">Status</span><span class="iv"><span class="chip-online">● Online</span></span></div>
                    <div class="ii"><span class="ik">Update Terakhir</span><span class="iv" id="lastUpdate">—</span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== TRANSAKSI ===== -->
    <div data-section="transaksi" class="sec">
        <div class="sec-head">
            <div><h1>Transaksi</h1><p class="sub">Data realtime — diperbarui otomatis</p></div>
            <div class="sec-actions">
                <select id="tx-month" class="fsel">
                    @foreach(range(1,12) as $m)<option value="{{ $m }}" {{ date('m')==$m?'selected':'' }}>{{ DateTime::createFromFormat('!m',$m)->format('F') }}</option>@endforeach
                </select>
                <select id="tx-year" class="fsel">
                    @foreach(range(date('Y')-2, date('Y')) as $y)<option value="{{ $y }}" {{ date('Y')==$y?'selected':'' }}>{{ $y }}</option>@endforeach
                </select>
                <a href="{{ route('admin.transactions.create') }}" class="btn-primary">+ Tambah</a>
            </div>
        </div>
        <div class="card">
            <div class="card-head"><h2>Daftar Transaksi</h2><span class="live-tag">Live</span></div>
            <div class="tbl-wrap"><table class="dtbl">
                <thead><tr><th>#</th><th>Pelanggan</th><th>Layanan</th><th>Tanggal</th><th>Status</th><th>Total</th></tr></thead>
                <tbody id="tx-body"><tr><td colspan="6" class="empty-td">Memuat...</td></tr></tbody>
            </table></div>
        </div>
    </div>

    <!-- ===== MEMBER ===== -->
    <div data-section="member" class="sec">
        <div class="sec-head">
            <div><h1>Member</h1><p class="sub">Data realtime — diperbarui otomatis</p></div>
            <div class="sec-actions">
                <div class="search-wrap"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg><input type="text" id="member-search" placeholder="Cari member..." class="sinput"></div>
            </div>
        </div>
        <div class="member-grid" id="member-grid">
            <div class="empty-td" style="grid-column:1/-1;text-align:center;padding:40px">Memuat...</div>
        </div>
    </div>

    <!-- ===== HARGA ===== -->
    <div data-section="harga" class="sec">
        <div class="sec-head">
            <div><h1>Daftar Harga</h1><p class="sub">Data realtime — diperbarui otomatis</p></div>
            <span class="live-tag">Live</span>
        </div>
        <div class="tabs">
            <button class="tab active" data-tab="satuan">Satuan</button>
            <button class="tab" data-tab="kiloan">Kiloan</button>
        </div>
        <div class="card">
            <div class="tbl-wrap"><table class="dtbl">
                <thead><tr><th>Layanan</th><th>Item</th><th>Kategori</th><th>Harga</th></tr></thead>
                <tbody id="price-body"><tr><td colspan="4" class="empty-td">Memuat...</td></tr></tbody>
            </table></div>
        </div>
    </div>

    <!-- ===== LAPORAN ===== -->
    <div data-section="laporan" class="sec">
        <div class="sec-head">
            <div><h1>Laporan</h1><p class="sub">Analisis bisnis realtime</p></div>
            <div class="sec-actions">
                <select id="rpt-month" class="fsel">
                    @foreach(range(1,12) as $m)<option value="{{ $m }}" {{ date('m')==$m?'selected':'' }}>{{ DateTime::createFromFormat('!m',$m)->format('F') }}</option>@endforeach
                </select>
                <select id="rpt-year" class="fsel">
                    @foreach(range(date('Y')-2, date('Y')) as $y)<option value="{{ $y }}" {{ date('Y')==$y?'selected':'' }}>{{ $y }}</option>@endforeach
                </select>
                <span class="live-tag">Live</span>
            </div>
        </div>
        <div class="report-stats" id="report-stats">
            <div class="rsc green"><p class="rsc-lbl">Total Pendapatan</p><p class="rsc-val" id="rpt-revenue">—</p></div>
            <div class="rsc blue"><p class="rsc-lbl">Total Transaksi</p><p class="rsc-val" id="rpt-total">—</p></div>
            <div class="rsc purple"><p class="rsc-lbl">Selesai</p><p class="rsc-val" id="rpt-done">—</p></div>
            <div class="rsc orange"><p class="rsc-lbl">Pending</p><p class="rsc-val" id="rpt-pending">—</p></div>
        </div>
        <div class="card">
            <div class="card-head"><h2>Tren 6 Bulan Terakhir</h2></div>
            <div class="chart-area" id="chart-area"></div>
        </div>
    </div>

    <!-- ===== VOUCHER ===== -->
    <div data-section="voucher" class="sec">
        <div class="sec-head">
            <div><h1>Voucher</h1><p class="sub">Kelola diskon dan promosi</p></div>
            <span class="live-tag">Live</span>
        </div>
        <div class="voucher-grid" id="voucher-grid">
            <div class="empty-td" style="padding:40px;text-align:center">Memuat...</div>
        </div>
    </div>

    <!-- ===== PROFILE V2 ===== -->
    <div data-section="profile" class="sec">
        <div class="profile-cover-wrap">
            <div class="profile-cover-bg"></div>
            <div class="profile-ava-wrap">
                <div class="profile-ava-big">{{ substr(auth()->user()->name,0,1) }}</div>
                <div class="profile-ava-status"></div>
            </div>
            <div class="profile-hero-info">
                <h1>{{ auth()->user()->name }}</h1>
                <p>{{ auth()->user()->email }}</p>
                <span class="chip-role">Administrator</span>
            </div>
        </div>

        <div class="profile-cards">
            <!-- Edit Profil -->
            <div class="card">
                <div class="card-head">
                    <div class="pcard-ic blue-ic"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                    <div><h2>Informasi Profil</h2><p>Perbarui data akun Anda</p></div>
                </div>
                <form action="{{ route('profile.update') }}" method="POST" class="pform">
                    @csrf @method('PATCH')
                    @if(session('status')==='profile-updated')<div class="alert-ok"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Profil berhasil diperbarui!</div>@endif
                    <div class="frow">
                        <div class="fg"><label>Nama Lengkap</label><div class="iw"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><input type="text" name="name" value="{{ auth()->user()->name }}" placeholder="Nama lengkap"></div>@error('name')<p class="ferr">{{ $message }}</p>@enderror</div>
                        <div class="fg"><label>Email</label><div class="iw"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg><input type="email" name="email" value="{{ auth()->user()->email }}" placeholder="email@domain.com"></div>@error('email')<p class="ferr">{{ $message }}</p>@enderror</div>
                    </div>
                    <div class="fact"><button type="submit" class="btn-primary"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/></svg> Simpan Profil</button></div>
                </form>
            </div>

            <!-- Ganti Password -->
            <div class="card">
                <div class="card-head">
                    <div class="pcard-ic green-ic"><svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg></div>
                    <div><h2>Ubah Password</h2><p>Gunakan password yang kuat dan unik</p></div>
                </div>
                <form action="{{ route('profile.password.update') }}" method="POST" class="pform">
                    @csrf @method('PATCH')
                    @if(session('status')==='password-updated')<div class="alert-ok"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Password berhasil diperbarui!</div>@endif
                    <div class="fg"><label>Password Saat Ini</label><div class="iw"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg><input type="password" name="current_password" placeholder="Password lama"></div>@error('current_password')<p class="ferr">{{ $message }}</p>@enderror</div>
                    <div class="frow">
                        <div class="fg"><label>Password Baru</label><div class="iw"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg><input type="password" name="password" placeholder="Password baru"></div>@error('password')<p class="ferr">{{ $message }}</p>@enderror</div>
                        <div class="fg"><label>Konfirmasi Password</label><div class="iw"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg><input type="password" name="password_confirmation" placeholder="Ulangi password baru"></div></div>
                    </div>
                    <div class="fact"><button type="submit" class="btn-primary btn-green"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Perbarui Password</button></div>
                </form>
            </div>
        </div>
    </div>

</main>

<script src="{{ asset('js/admin-dashboard.js') }}"></script>
</body>
</html>
