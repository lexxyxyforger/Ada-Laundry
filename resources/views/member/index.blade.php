<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Member — AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root{--p:#14b8a6;--pd:#0d9488;--pl:#5eead4;--dark:#0f172a;--dark2:#1e293b;--white:#fff;--bg:#f8fafc;--border:#e2e8f0;--text:#0f172a;--sec:#475569;--muted:#94a3b8;--sw:260px}
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',-apple-system,sans-serif;color:var(--text);background:var(--bg);display:flex;min-height:100vh;overflow-x:hidden}
        
        /* SIDEBAR */
        .sidebar{width:var(--sw);background:var(--white);border-right:1px solid var(--border);position:fixed;top:0;bottom:0;left:0;display:flex;flex-direction:column;z-index:100;transition:transform .3s;overflow-y:auto}
        .sb-head{padding:24px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:10px;font-family:'Poppins',sans-serif;font-weight:700;font-size:18px;color:var(--dark);text-decoration:none}
        .sb-head svg{flex-shrink:0}
        .sb-menu{padding:16px;display:flex;flex-direction:column;gap:4px;flex:1}
        .sb-item{display:flex;align-items:center;gap:12px;padding:12px 16px;border-radius:10px;color:var(--sec);text-decoration:none;font-size:14px;font-weight:600;transition:all .2s;cursor:pointer}
        .sb-item:hover{background:#f1f5f9;color:var(--dark)}
        .sb-item.active{background:linear-gradient(135deg,rgba(20,184,166,.1),rgba(20,184,166,.2));color:var(--pd);border:1px solid rgba(20,184,166,.2)}
        .sb-ic{width:28px;height:28px;border-radius:6px;display:flex;align-items:center;justify-content:center;background:var(--white);box-shadow:0 2px 8px rgba(0,0,0,.05);color:inherit}
        .sb-item.active .sb-ic{background:linear-gradient(135deg,var(--p),var(--pd));color:#fff}
        .sb-foot{padding:16px;border-top:1px solid var(--border)}
        .btn-logout{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:12px;border:1px solid #fecaca;background:#fff5f5;color:#dc2626;border-radius:10px;font-size:14px;font-weight:600;cursor:pointer;transition:all .2s;font-family:inherit}
        .btn-logout:hover{background:#fee2e2;border-color:#ef4444}
        
        /* MAIN CONTENT */
        .main{flex:1;margin-left:var(--sw);display:flex;flex-direction:column;min-height:100vh}
        .topbar{height:70px;background:var(--white);border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between;padding:0 32px;position:sticky;top:0;z-index:90}
        .burger{display:none;width:38px;height:38px;border:1px solid var(--border);border-radius:8px;background:var(--white);cursor:pointer;align-items:center;justify-content:center}
        .tb-right{display:flex;align-items:center;gap:16px}
        .tb-ava{width:38px;height:38px;border-radius:10px;background:linear-gradient(135deg,var(--p),#3b82f6);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:15px;object-fit:cover}
        .content{padding:32px;max-width:1100px;margin:0 auto;width:100%}
        
        /* HERO CARD */
        .hero-card{background:linear-gradient(160deg,#0f172a 0%,#1e3a5f 100%);border-radius:20px;padding:32px;display:flex;align-items:center;justify-content:space-between;position:relative;overflow:hidden;margin-bottom:24px;box-shadow:0 20px 40px rgba(0,0,0,.08)}
        .hero-card::before{content:'';position:absolute;top:-50px;right:-50px;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.05);filter:blur(40px)}
        .hc-left{display:flex;align-items:center;gap:20px;position:relative;z-index:1}
        .hc-ava{width:80px;height:80px;border-radius:20px;border:3px solid rgba(255,255,255,.2);background:linear-gradient(135deg,var(--p),#3b82f6);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:32px;object-fit:cover;box-shadow:0 10px 20px rgba(0,0,0,.2)}
        .hc-info h1{font-family:'Poppins',sans-serif;font-size:24px;font-weight:700;color:#fff;margin-bottom:4px}
        .hc-info p{font-size:13px;color:rgba(255,255,255,.6);margin-bottom:10px}
        .btn-sm{display:inline-flex;align-items:center;gap:6px;padding:6px 14px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);color:#fff;border-radius:50px;font-size:12px;font-weight:600;text-decoration:none;transition:all .2s;backdrop-filter:blur(8px)}
        .btn-sm:hover{background:rgba(255,255,255,.2)}
        .hc-right{text-align:right;position:relative;z-index:1;background:rgba(0,0,0,.2);padding:16px 24px;border-radius:16px;border:1px solid rgba(255,255,255,.1);backdrop-filter:blur(10px)}
        .hc-right p{font-size:12px;color:rgba(255,255,255,.6);text-transform:uppercase;letter-spacing:1px;font-weight:600;margin-bottom:2px}
        .hc-right h2{font-family:'Poppins',sans-serif;font-size:36px;font-weight:800;color:var(--pl);margin-bottom:8px;line-height:1}
        .btn-point{background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;border:none}
        .btn-point:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(20,184,166,.4)}
        
        /* SECTIONS */
        .sec{display:none;animation:fadeUp .3s ease forwards}
        .sec.active{display:block}
        @keyframes fadeUp{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
        .card{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 30px rgba(0,0,0,.02);margin-bottom:24px}
        .card-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid var(--border)}
        .card-head h2{font-family:'Poppins',sans-serif;font-size:18px;font-weight:700;color:var(--dark)}
        
        /* TABLE */
        .table-wrap{overflow-x:auto}
        table{width:100%;border-collapse:collapse}
        th{text-align:left;padding:12px 16px;font-size:12px;font-weight:700;color:var(--sec);text-transform:uppercase;letter-spacing:.5px;background:#f8fafc;border-bottom:1px solid var(--border)}
        td{padding:16px;font-size:14px;color:var(--text);border-bottom:1px solid var(--border)}
        tr:last-child td{border-bottom:none}
        tr:hover td{background:#f8fafc}
        .badge{display:inline-flex;padding:4px 10px;border-radius:50px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.5px}
        .b-success{background:#dcfce7;color:#16a34a}
        .b-warning{background:#fef3c7;color:#d97706}
        .btn-link{color:var(--p);font-weight:600;text-decoration:none;font-size:13px;display:inline-flex;align-items:center;gap:4px}
        .btn-link:hover{color:var(--pd)}
        .empty{padding:40px;text-align:center;color:var(--muted);font-size:14px}
        
        /* OVERLAY */
        .overlay{position:fixed;inset:0;background:rgba(0,0,0,.4);z-index:90;display:none;backdrop-filter:blur(4px)}
        .overlay.show{display:block}
        
        @media(max-width:1024px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .main{margin-left:0}
            .burger{display:flex}
        }
        @media(max-width:640px){
            .hero-card{flex-direction:column;align-items:flex-start;gap:24px}
            .hc-right{width:100%;text-align:left;display:flex;align-items:center;justify-content:space-between}
            .hc-right h2{font-size:28px;margin-bottom:0}
            .content{padding:20px}
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <a href="{{ url('/') }}" class="sb-head">
        <svg width="28" height="28" viewBox="0 0 32 32" fill="none">
            <rect width="32" height="32" rx="8" fill="url(#sg)"/>
            <path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/>
            <circle cx="16" cy="16" r="2" fill="white"/>
            <defs><linearGradient id="sg" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs>
        </svg>
        AdaLaundry
    </a>
    <div class="sb-menu">
        <div class="sb-item active" data-target="dashboard">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg></div>
            Dashboard
        </div>
        <a href="{{ route('member.price_lists.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
            Daftar Harga
        </a>
        <a href="{{ route('member.points.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
            Tukar Poin
        </a>
        <a href="{{ route('profile.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            Edit Profil
        </a>
        <a href="{{ route('member.complaints.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></div>
            Saran/Komplain
        </a>
    </div>
    <div class="sb-foot">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Keluar Akun
            </button>
        </form>
    </div>
</div>
<div class="overlay" id="overlay"></div>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <button class="burger" id="burger">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
        </button>
        <div style="flex:1"></div>
        <div class="tb-right">
            <a href="{{ route('profile.index') }}" style="text-decoration:none;display:flex;align-items:center;gap:10px">
                <div style="text-align:right;display:none;@media(min-width:640px){display:block}">
                    <p style="font-size:13px;font-weight:700;color:var(--dark);margin-bottom:2px">{{ $user->name }}</p>
                    <p style="font-size:11px;color:var(--muted)">Member</p>
                </div>
                @if($user->hasFile() && !$user->isDefaultFileName())
                    <img src="{{ $user->getFileAsset() }}" alt="Ava" class="tb-ava">
                @else
                    <div class="tb-ava">{{ substr($user->name, 0, 1) }}</div>
                @endif
            </a>
        </div>
    </div>

    <div class="content">
        <!-- Dashboard Section -->
        <div class="sec active" id="sec-dashboard">
            <div class="hero-card">
                <div class="hc-left">
                    @if($user->hasFile() && !$user->isDefaultFileName())
                        <img src="{{ $user->getFileAsset() }}" alt="Ava" class="hc-ava">
                    @else
                        <div class="hc-ava">{{ substr($user->name, 0, 1) }}</div>
                    @endif
                    <div class="hc-info">
                        <h1>Halo, {{ $user->name }}!</h1>
                        <p>ID Member: #{{ str_pad($user->id, 5, '0', STR_PAD_LEFT) }}</p>
                        <a href="{{ route('profile.index') }}" class="btn-sm">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                            Edit Profil
                        </a>
                    </div>
                </div>
                <div class="hc-right">
                    <div>
                        <p>Poin Terkumpul</p>
                        <h2>{{ $user->point ?? 0 }}</h2>
                    </div>
                    <a href="{{ route('member.points.index') }}" class="btn-sm btn-point">
                        Tukar Poin 🎁
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-head">
                    <h2>Riwayat Transaksi Terakhir</h2>
                </div>
                <div class="table-wrap">
                    @if($latestTransactions && count($latestTransactions) > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Order</th>
                                    <th>Status Cucian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latestTransactions as $idx => $item)
                                <tr>
                                    <td>{{ $idx + 1 }}</td>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <span class="badge {{ $item->status_id == 3 ? 'b-success' : 'b-warning' }}">
                                            {{ $item->status->name ?? 'Diproses' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('member.transactions.show', $item->id) }}" class="btn-link">
                                            Lihat Nota
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="empty">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin-bottom:12px;opacity:0.5"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                            <p>Belum ada transaksi saat ini.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Complaint Card -->
            <div class="card" style="margin-top: 24px;">
                <div class="card-head">
                    <h2>Kirim Pesan Cepat</h2>
                </div>
                <form action="{{ route('member.complaints.store') }}" method="POST" style="display:flex; flex-direction:column; gap:12px;">
                    @csrf
                    <select name="type" class="form-control" required style="width:100%; border:1.5px solid var(--border); border-radius:10px; font-family:inherit; font-size:14px; outline:none; height:44px;">
                        <option value="1">Saran</option>
                        <option value="2">Komplain</option>
                    </select>
                    <textarea name="body" class="form-control" rows="3" placeholder="Punya saran atau komplain? Ketik di sini..." required style="width:100%; padding:14px; border:1.5px solid var(--border); border-radius:10px; font-family:inherit; font-size:14px; outline:none; resize:vertical;"></textarea>
                    <button type="submit" class="btn-point" style="align-self:flex-start; padding:10px 20px; border-radius:10px; font-weight:600; cursor:pointer;">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const burger = document.getElementById('burger');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');

    burger?.addEventListener('click', () => {
        sidebar.classList.add('open');
        overlay.classList.add('show');
    });

    overlay?.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });
</script>
</body>
</html>
