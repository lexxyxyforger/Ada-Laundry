<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tukar Poin — AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root{--p:#14b8a6;--pd:#0d9488;--pl:#5eead4;--dark:#0f172a;--dark2:#1e293b;--white:#fff;--bg:#f8fafc;--border:#e2e8f0;--text:#0f172a;--sec:#475569;--muted:#94a3b8;--sw:260px}
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',-apple-system,sans-serif;color:var(--text);background:var(--bg);display:flex;min-height:100vh;overflow-x:hidden}
        
        /* SIDEBAR */
        .sidebar{width:var(--sw);background:var(--white);border-right:1px solid var(--border);position:fixed;top:0;bottom:0;left:0;display:flex;flex-direction:column;z-index:100;transition:transform .3s;overflow-y:auto}
        .sb-head{padding:24px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:10px;font-family:'Poppins',sans-serif;font-weight:700;font-size:18px;color:var(--dark);text-decoration:none}
        .sb-menu{padding:16px;display:flex;flex-direction:column;gap:4px;flex:1}
        .sb-item{display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:10px;color:var(--sec);text-decoration:none;font-size:14px;font-weight:600;transition:all .2s;cursor:pointer}
        .sb-item:hover{background:#f1f5f9;color:var(--dark)}
        .sb-item.active{background:linear-gradient(135deg,rgba(20,184,166,.1),rgba(20,184,166,.2));color:var(--pd);border:1px solid rgba(20,184,166,.2)}
        .sb-ic{width:28px;height:28px;border-radius:6px;display:flex;align-items:center;justify-content:center;background:var(--white);box-shadow:0 2px 8px rgba(0,0,0,.05);color:inherit}
        .sb-item.active .sb-ic{background:linear-gradient(135deg,var(--p),var(--pd));color:#fff}
        .sb-foot{padding:16px;border-top:1px solid var(--border)}
        .btn-logout{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:12px;border:1px solid #fecaca;background:#fff5f5;color:#dc2626;border-radius:10px;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;font-family:inherit}
        
        /* MAIN CONTENT */
        .main{flex:1;margin-left:var(--sw);display:flex;flex-direction:column;min-height:100vh}
        .topbar{height:70px;background:var(--white);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 32px;position:sticky;top:0;z-index:90}
        .burger{display:none;width:38px;height:38px;border:1px solid var(--border);border-radius:8px;background:var(--white);cursor:pointer;align-items:center;justify-content:center}
        .content{padding:32px;max-width:1100px;margin:0 auto;width:100%;animation:fadeUp .3s ease forwards}
        
        @keyframes fadeUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
        
        /* ALERTS */
        .alert{display:flex;align-items:flex-start;gap:10px;padding:12px 14px;border-radius:10px;font-size:13px;font-weight:500;margin-bottom:20px;line-height:1.5}
        .alert-err{background:#fff5f5;border:1px solid #fecaca;color:#dc2626}
        .alert-ok{background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a}
        
        /* POINT BANNER */
        .point-banner{background:linear-gradient(135deg,var(--p),var(--pd));border-radius:20px;padding:28px 32px;display:flex;align-items:center;justify-content:space-between;color:#fff;margin-bottom:24px;box-shadow:0 12px 30px rgba(20,184,166,.2)}
        .pb-left p{font-size:14px;opacity:0.8;margin-bottom:4px}
        .pb-left h2{font-family:'Poppins',sans-serif;font-size:36px;font-weight:800;line-height:1}
        .pb-right{width:64px;height:64px;background:rgba(255,255,255,.2);border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:32px;backdrop-filter:blur(8px)}
        
        /* CARDS */
        .card{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 30px rgba(0,0,0,.02);margin-bottom:24px}
        .card-head{margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid var(--border)}
        .card-head h2{font-family:'Poppins',sans-serif;font-size:18px;font-weight:700;color:var(--dark)}
        
        /* VOUCHER GRID */
        .v-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px}
        .v-card{background:#f8fafc;border:1px solid var(--border);border-radius:12px;padding:20px;position:relative;overflow:hidden;transition:all .2s}
        .v-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--p),#3b82f6)}
        .v-card.theme-blue::before{background:linear-gradient(90deg,#3b82f6,#2563eb)}
        .v-card.theme-purple::before{background:linear-gradient(90deg,#a855f7,#7e22ce)}
        .v-card.theme-green::before{background:linear-gradient(90deg,#10b981,#059669)}
        .v-card.theme-orange::before{background:linear-gradient(90deg,#f97316,#ea580c)}
        .v-card.theme-red::before{background:linear-gradient(90deg,#ef4444,#dc2626)}
        .v-card:hover{transform:translateY(-2px);box-shadow:0 10px 25px rgba(0,0,0,.05);border-color:var(--p)}
        .vc-name{font-size:16px;font-weight:700;color:var(--dark);margin-bottom:6px}
        .vc-desc{font-size:13px;color:var(--sec);margin-bottom:14px;line-height:1.5}
        .vc-point{display:inline-flex;align-items:center;gap:6px;background:#fef3c7;color:#d97706;padding:4px 10px;border-radius:50px;font-size:12px;font-weight:700}
        .btn-tukar{margin-top:16px;width:100%;padding:10px;background:var(--dark);color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;transition:all .2s}
        .btn-tukar:hover{background:var(--p)}
        
        /* MY VOUCHERS LIST */
        .mv-list{display:flex;flex-direction:column;gap:12px}
        .mv-item{display:flex;align-items:center;gap:16px;padding:16px;background:#fff;border:1px solid var(--border);border-radius:12px}
        .mv-ic{width:42px;height:42px;background:#dcfce7;color:#16a34a;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
        .mv-info h4{font-size:15px;font-weight:700;color:var(--dark);margin-bottom:4px}
        .mv-info p{font-size:13px;color:var(--sec)}
        .empty{padding:40px;text-align:center;color:var(--muted);font-size:14px;background:#f8fafc;border-radius:12px}
        
        @media(max-width:1024px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .main{margin-left:0}
            .burger{display:flex}
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <a href="{{ url('/') }}" class="sb-head">
        <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
            <rect width="32" height="32" rx="8" fill="#14b8a6"/>
            <path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/>
            <circle cx="16" cy="16" r="2" fill="white"/>
        </svg>
        AdaLaundry
    </a>
    <div class="sb-menu">
        <a href="{{ route('member.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg></div>
            Dashboard
        </a>
        <a href="{{ route('member.price_lists.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
            Daftar Harga
        </a>
        <div class="sb-item active">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
            Tukar Poin
        </div>
        <a href="{{ route('profile.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            Edit Profil
        </a>
    </div>
    <div class="sb-foot">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Keluar
            </button>
        </form>
    </div>
</div>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <button class="burger" id="burger">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <div style="flex:1;text-align:right">
            <span style="font-weight:600;font-size:14px;color:var(--dark)">Tukar Poin</span>
        </div>
    </div>

    <div class="content">
        @if (session('error'))
            <div class="alert alert-err">⚠️ {{ session('error') }}</div>
        @elseif (session('success'))
            <div class="alert alert-ok">✅ {{ session('success') }}</div>
        @endif

        <div class="point-banner">
            <div class="pb-left">
                <p>Total Poin Anda Saat Ini</p>
                <h2>{{ $user->point ?? 0 }}</h2>
            </div>
            <div class="pb-right">🎁</div>
        </div>

        <div class="card">
            <div class="card-head">
                <h2>Tukarkan Poin dengan Voucher</h2>
            </div>
            @if($vouchers && count($vouchers) > 0)
            <div class="v-grid">
                @foreach ($vouchers as $voucher)
                <div class="v-card theme-{{ $voucher->theme ?? 'blue' }}">
                    <h3 class="vc-name">{{ $voucher->name }}</h3>
                    <p class="vc-desc">{{ $voucher->description }}</p>
                    <div class="vc-point">🎯 Butuh {{ $voucher->point_need }} Poin</div>
                    <form action="{{ route('member.vouchers.store', ['voucher' => $voucher->id]) }}" method="GET">
                        <button type="submit" class="btn-tukar" onclick="return confirm('Tukar {{ $voucher->point_need }} poin untuk voucher ini?')">Tukar Sekarang</button>
                    </form>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty">Belum ada voucher yang tersedia saat ini.</div>
            @endif
        </div>

        <div class="card">
            <div class="card-head">
                <h2>Voucher Milik Anda</h2>
            </div>
            @if($memberVouchers && count($memberVouchers) > 0)
            <div class="mv-list">
                @foreach ($memberVouchers as $voucher)
                @php $t = $voucher->voucher->theme ?? 'blue'; @endphp
                <div class="mv-item" style="border-left:4px solid var(--{{ $t === 'purple' ? 'purple' : ($t === 'green' ? 'green' : ($t === 'orange' ? 'orange' : ($t === 'red' ? 'red' : 'primary'))) }})">
                    <div class="mv-ic" style="background:var(--bg);color:var(--dark)">🎫</div>
                    <div class="mv-info">
                        <h4>{{ $voucher->voucher->name }}</h4>
                        <p>{{ $voucher->voucher->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="empty">Anda belum menukarkan poin dengan voucher apapun.</div>
            @endif
        </div>
    </div>
</div>

<script>
    const burger = document.getElementById('burger');
    const sidebar = document.getElementById('sidebar');
    burger?.addEventListener('click', () => sidebar.classList.toggle('open'));
</script>
</body>
</html>
