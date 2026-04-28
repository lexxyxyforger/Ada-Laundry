<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Harga — AdaLaundry</title>
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
        
        /* CARDS */
        .card{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 30px rgba(0,0,0,.02);margin-bottom:24px}
        .card-head{margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid var(--border);display:flex;align-items:center;justify-content:space-between}
        .card-head h2{font-family:'Poppins',sans-serif;font-size:18px;font-weight:700;color:var(--dark)}
        
        /* TABS */
        .tabs{display:flex;gap:8px;background:#f1f5f9;padding:6px;border-radius:10px;width:fit-content;margin-bottom:20px}
        .tab-btn{padding:8px 20px;border:none;background:transparent;border-radius:6px;font-size:13px;font-weight:600;color:var(--sec);cursor:pointer;transition:all .2s}
        .tab-btn.active{background:var(--white);color:var(--dark);box-shadow:0 2px 10px rgba(0,0,0,.05)}
        .tab-content{display:none;animation:fadeUp .3s ease forwards}
        .tab-content.active{display:block}
        
        /* TABLE */
        .table-wrap{overflow-x:auto;border:1px solid var(--border);border-radius:12px}
        table{width:100%;border-collapse:collapse}
        th{text-align:left;padding:14px 16px;font-size:12px;font-weight:700;color:var(--sec);text-transform:uppercase;letter-spacing:.5px;background:#f8fafc;border-bottom:1px solid var(--border)}
        td{padding:14px 16px;font-size:14px;color:var(--text);border-bottom:1px solid var(--border)}
        tr:last-child td{border-bottom:none}
        tr:hover td{background:#f8fafc}
        .price-tag{display:inline-flex;align-items:center;padding:4px 10px;background:#f0fdf4;color:#16a34a;border-radius:50px;font-weight:700;font-size:13px}
        
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
        <div class="sb-item active">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
            Daftar Harga
        </div>
        <a href="{{ route('member.points.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
            Tukar Poin
        </a>
        <a href="{{ route('member.complaints.index') }}" class="sb-item">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></div>
            Saran/Komplain
        </a>
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
            <span style="font-weight:600;font-size:14px;color:var(--dark)">Daftar Harga</span>
        </div>
    </div>

    <div class="content">
        
        <!-- KATALOG HARGA -->
        <div class="card">
            <div class="card-head">
                <h2>Katalog Harga Layanan</h2>
            </div>
            
            <div class="tabs">
                <button class="tab-btn active" data-tab="kiloan">Kiloan</button>
                <button class="tab-btn" data-tab="satuan">Satuan</button>
            </div>

            <!-- TAB KILOAN -->
            <div class="tab-content active" id="tab-kiloan">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:50px">No</th>
                                <th>Barang</th>
                                <th>Servis</th>
                                <th>Harga / Kg</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kiloan as $idx => $k)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td style="font-weight:600">{{ $k->item->name }}</td>
                                <td>{{ $k->service->name }}</td>
                                <td><span class="price-tag">{{ $k->getFormattedPrice() }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB SATUAN -->
            <div class="tab-content" id="tab-satuan">
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:50px">No</th>
                                <th>Barang</th>
                                <th>Servis</th>
                                <th>Harga / Pcs</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satuan as $idx => $s)
                            <tr>
                                <td>{{ $idx + 1 }}</td>
                                <td style="font-weight:600">{{ $s->item->name }}</td>
                                <td>{{ $s->service->name }}</td>
                                <td><span class="price-tag">{{ $s->getFormattedPrice() }}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TIPE SERVICE -->
        <div class="card">
            <div class="card-head">
                <h2>Biaya Tipe Pengiriman (Service)</h2>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="width:50px">No</th>
                            <th>Nama Tipe Service</th>
                            <th>Biaya Tambahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($serviceTypes as $idx => $item)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td style="font-weight:600">{{ $item->name }}</td>
                            <td><span class="price-tag">{{ $item->getFormattedCost() }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    // Sidebar toggle
    const burger = document.getElementById('burger');
    const sidebar = document.getElementById('sidebar');
    burger?.addEventListener('click', () => sidebar.classList.toggle('open'));

    // Tabs toggle
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const target = btn.getAttribute('data-tab');
            
            // Remove active classes
            tabBtns.forEach(b => b.classList.remove('active'));
            tabContents.forEach(c => c.classList.remove('active'));
            
            // Add active class to clicked
            btn.classList.add('active');
            document.getElementById('tab-' + target).classList.add('active');
        });
    });
</script>
</body>
</html>
