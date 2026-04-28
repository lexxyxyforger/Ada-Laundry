<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saran & Komplain — AdaLaundry</title>
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
        .alert-ok{background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a}
        
        /* TWO COLUMN LAYOUT */
        .layout-grid{display:grid;grid-template-columns:1fr 1.5fr;gap:24px;align-items:flex-start}
        
        /* CARDS */
        .card{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 30px rgba(0,0,0,.02)}
        .card-head{margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid var(--border)}
        .card-head h2{font-family:'Poppins',sans-serif;font-size:18px;font-weight:700;color:var(--dark)}
        
        /* FORM */
        .fg{margin-bottom:16px}
        .fg label{display:block;font-size:13px;font-weight:600;color:var(--sec);margin-bottom:6px}
        .ta{width:100%;min-height:140px;border:1.5px solid var(--border);border-radius:10px;padding:14px;font-family:inherit;font-size:14px;color:var(--text);outline:none;resize:vertical;transition:all .2s}
        .ta:focus{border-color:var(--p);box-shadow:0 0 0 3px rgba(20,184,166,.1)}
        .btn-submit{padding:12px 20px;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;border:none;border-radius:10px;font-size:14px;font-weight:700;cursor:pointer;width:100%;transition:all .2s;font-family:inherit;display:inline-flex;align-items:center;justify-content:center;gap:8px}
        .btn-submit:hover{transform:translateY(-1px);box-shadow:0 8px 24px rgba(20,184,166,.4)}
        
        /* HISTORY */
        .c-list{display:flex;flex-direction:column;gap:12px}
        .c-item{padding:16px;background:#f8fafc;border:1px solid var(--border);border-radius:12px}
        .c-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px}
        .c-date{font-size:12px;color:var(--muted);font-weight:600}
        .badge{display:inline-flex;padding:3px 8px;border-radius:50px;font-size:10px;font-weight:700;text-transform:uppercase}
        .b-wait{background:#fef3c7;color:#d97706}
        .b-done{background:#dcfce7;color:#16a34a}
        .c-body{font-size:13.5px;color:var(--text);line-height:1.5;margin-bottom:12px}
        .c-reply{padding:12px 14px;background:var(--white);border-left:3px solid var(--p);border-radius:6px}
        .c-rtop{font-size:11px;font-weight:700;color:var(--p);margin-bottom:4px;text-transform:uppercase}
        .c-rtxt{font-size:13px;color:var(--sec);line-height:1.5}
        .empty{padding:40px;text-align:center;color:var(--muted);font-size:13px}
        
        @media(max-width:1024px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .main{margin-left:0}
            .burger{display:flex}
        }
        @media(max-width:768px){.layout-grid{grid-template-columns:1fr}}
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
        <a href="{{ route('member.points.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
            Tukar Poin
        </a>
        <div class="sb-item active">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></div>
            Saran/Komplain
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
            <span style="font-weight:600;font-size:14px;color:var(--dark)">Saran / Komplain</span>
        </div>
    </div>

    <div class="content">
        @if (session('success'))
            <div class="alert alert-ok">✅ {{ session('success') }}</div>
        @endif

        <div class="layout-grid">
            <!-- Tulis Form -->
            <div class="card">
                <div class="card-head">
                    <h2>Kirim Pesan</h2>
                </div>
                <form action="{{ route('member.complaints.store') }}" method="POST">
                    @csrf
                    <div class="fg">
                        <label for="type">Jenis Pesan</label>
                        <select name="type" id="type" class="ta" style="min-height: 40px; height: 40px; margin-bottom: 12px;" required>
                            <option value="1">Saran</option>
                            <option value="2">Komplain</option>
                        </select>
                    </div>
                    <div class="fg">
                        <label for="body">Pesan Anda</label>
                        <textarea name="body" id="body" class="ta" placeholder="Sampaikan saran, kritik, atau komplain Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Kirim Pesan Sekarang
                    </button>
                </form>
            </div>

            <!-- Riwayat -->
            <div class="card">
                <div class="card-head">
                    <h2>Riwayat Pesan Anda</h2>
                </div>
                @if($complaintSuggestions && count($complaintSuggestions) > 0)
                <div class="c-list">
                    @foreach($complaintSuggestions as $complaint)
                    <div class="c-item">
                        <div class="c-top">
                            <span class="c-date">{{ date('d M Y - H:i', strtotime($complaint->created_at)) }}</span>
                            <span class="badge {{ $complaint->reply ? 'b-done' : 'b-wait' }}">
                                {{ $complaint->reply ? 'Dibalas' : 'Menunggu' }}
                            </span>
                        </div>
                        <p class="c-body">{{ $complaint->body }}</p>
                        
                        @if($complaint->reply)
                        <div class="c-reply">
                            <p class="c-rtop">Balasan Admin</p>
                            <p class="c-rtxt">{{ $complaint->reply }}</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <div class="empty">Belum ada saran atau komplain yang dikirimkan.</div>
                @endif
            </div>
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
