<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berlangganan — AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root{--p:#14b8a6;--pd:#0d9488;--pl:#5eead4;--dark:#0f172a;--white:#fff;--bg:#f8fafc;--border:#e2e8f0;--text:#0f172a;--sec:#475569;--muted:#94a3b8}
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',-apple-system,sans-serif;background:var(--bg);color:var(--text);display:flex;min-height:100vh;align-items:center;justify-content:center;padding:24px}
        
        .checkout-wrapper{display:flex;width:100%;max-width:960px;background:var(--white);border-radius:24px;box-shadow:0 24px 60px rgba(0,0,0,.08);overflow:hidden;animation:slideUp .5s ease forwards}
        @keyframes slideUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
        
        /* LEFT: SUMMARY */
        .summary{width:380px;background:linear-gradient(145deg,var(--dark),#1e3a5f);color:#fff;padding:48px 36px;position:relative}
        .summary::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);background-size:24px 24px;opacity:0.5}
        .summary-inner{position:relative;z-index:1;height:100%;display:flex;flex-direction:column}
        
        .brand{display:flex;align-items:center;gap:10px;font-family:'Poppins',sans-serif;font-weight:700;font-size:18px;color:#fff;text-decoration:none;margin-bottom:48px}
        .brand svg{width:28px;height:28px}
        
        .s-title{font-size:14px;color:rgba(255,255,255,.6);margin-bottom:8px;text-transform:uppercase;letter-spacing:1px;font-weight:600}
        .plan-card{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);border-radius:16px;padding:20px;margin-bottom:32px;backdrop-filter:blur(10px)}
        .plan-name{font-family:'Poppins',sans-serif;font-size:20px;font-weight:700;margin-bottom:4px}
        .plan-desc{font-size:13px;color:rgba(255,255,255,.7)}
        
        .s-row{display:flex;justify-content:space-between;align-items:center;font-size:14px;margin-bottom:16px;color:rgba(255,255,255,.8)}
        .s-row.total{margin-top:24px;padding-top:24px;border-top:1px dashed rgba(255,255,255,.2);font-size:20px;font-weight:700;color:#fff}
        .total-val{font-family:'Poppins',sans-serif;color:var(--pl)}
        
        /* RIGHT: FORM */
        .payment{flex:1;padding:48px;display:flex;flex-direction:column}
        .p-head h1{font-family:'Poppins',sans-serif;font-size:24px;font-weight:800;color:var(--dark);margin-bottom:8px}
        .p-head p{font-size:14px;color:var(--sec);margin-bottom:36px}
        
        .methods{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:32px}
        .method{border:1.5px solid var(--border);border-radius:12px;padding:16px;cursor:pointer;transition:all .2s;display:flex;align-items:center;gap:12px}
        .method:hover{border-color:var(--p);background:#f0fdfa}
        .method.active{border-color:var(--p);background:#f0fdfa;box-shadow:0 4px 12px rgba(20,184,166,.15)}
        .m-radio{width:18px;height:18px;border:2px solid var(--muted);border-radius:50%;display:flex;align-items:center;justify-content:center}
        .method.active .m-radio{border-color:var(--p)}
        .method.active .m-radio::after{content:'';width:10px;height:10px;background:var(--p);border-radius:50%}
        .m-info{flex:1}
        .m-name{font-weight:600;font-size:14px;color:var(--dark)}
        
        .form-group{margin-bottom:20px}
        .form-label{display:block;font-size:13px;font-weight:600;color:var(--dark);margin-bottom:8px}
        .form-control{width:100%;padding:14px 16px;border:1.5px solid var(--border);border-radius:10px;font-family:inherit;font-size:14px;outline:none;transition:all .2s;background:#f8fafc}
        .form-control:focus{border-color:var(--p);background:#fff;box-shadow:0 0 0 4px rgba(20,184,166,.1)}
        
        .btn-pay{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;padding:16px;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;border:none;border-radius:12px;font-size:16px;font-weight:700;font-family:inherit;cursor:pointer;transition:all .25s;margin-top:20px;text-decoration:none}
        .btn-pay:hover{transform:translateY(-2px);box-shadow:0 12px 24px rgba(20,184,166,.3)}
        
        .back-link{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:var(--sec);text-decoration:none;margin-top:auto;padding-top:24px}
        .back-link:hover{color:var(--dark)}
        
        @media(max-width:768px){
            .checkout-wrapper{flex-direction:column}
            .summary{width:100%;padding:32px 24px}
            .payment{padding:32px 24px}
            .methods{grid-template-columns:1fr}
        }
    </style>
</head>
<body>

<div class="checkout-wrapper">
    <!-- LEFT -->
    <div class="summary">
        <div class="summary-inner">
            <a href="{{ url('/') }}" class="brand">
                <svg viewBox="0 0 32 32" fill="none"><rect width="32" height="32" rx="10" fill="url(#ng)"/><path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/><circle cx="16" cy="16" r="2.2" fill="white"/><defs><linearGradient id="ng" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs></svg>
                AdaLaundry
            </a>
            
            <p class="s-title">Ringkasan Pesanan</p>
            <div class="plan-card">
                <p class="plan-name">{{ $selectedPlan['name'] }}</p>
                <p class="plan-desc">Berlangganan bulanan</p>
            </div>
            
            <div class="s-row">
                <span>Harga Paket</span>
                <span>{{ $selectedPlan['price_fmt'] }}</span>
            </div>
            <div class="s-row">
                <span>PPN (11%)</span>
                @php $ppn = $selectedPlan['price'] * 0.11; @endphp
                <span>{{ $ppn > 0 ? 'Rp ' . number_format($ppn, 0, ',', '.') : 'Rp 0' }}</span>
            </div>
            
            <div class="s-row total">
                <span>Total Bayar</span>
                <span class="total-val">{{ $selectedPlan['price'] > 0 ? 'Rp ' . number_format($selectedPlan['price'] + $ppn, 0, ',', '.') : 'Gratis' }}</span>
            </div>
            
            <div style="margin-top:auto;padding-top:40px;font-size:12px;color:rgba(255,255,255,.5);line-height:1.5">
                Dengan melanjutkan pembayaran, Anda menyetujui Syarat & Ketentuan berlangganan AdaLaundry.
            </div>
        </div>
    </div>
    
    <!-- RIGHT -->
    <div class="payment">
        <div class="p-head">
            <h1>Selesaikan Pembayaran</h1>
            <p>Pilih metode pembayaran dan masukkan detail Anda untuk mulai menggunakan AdaLaundry.</p>
        </div>
        
        @if($selectedPlan['price'] > 0)
        <div class="methods">
            <div class="method active" onclick="selMethod(this)">
                <div class="m-radio"></div>
                <div class="m-info">
                    <p class="m-name">Transfer Bank (VA)</p>
                </div>
            </div>
            <div class="method" onclick="selMethod(this)">
                <div class="m-radio"></div>
                <div class="m-info">
                    <p class="m-name">E-Wallet (QRIS)</p>
                </div>
            </div>
        </div>
        @endif
        
        <form action="{{ route('register.admin') }}" method="GET">
            <div class="form-group">
                <label class="form-label">Nama Lengkap Pemilik</label>
                <input type="text" class="form-control" placeholder="Cth: Budi Santoso" required>
            </div>
            <div class="form-group">
                <label class="form-label">Email Pemilik</label>
                <input type="email" class="form-control" placeholder="Cth: budi@gmail.com" required>
            </div>
            <div class="form-group">
                <label class="form-label">Nomor WhatsApp</label>
                <input type="tel" class="form-control" placeholder="Cth: 08123456789" required>
            </div>
            
            <button type="submit" class="btn-pay">
                @if($selectedPlan['price'] > 0)
                🔒 Bayar Sekarang & Daftar
                @else
                🚀 Mulai Gratis Sekarang
                @endif
            </button>
        </form>
        
        <a href="{{ url('/') }}" class="back-link">
            ← Kembali ke Halaman Utama
        </a>
    </div>
</div>

<script>
function selMethod(el) {
    document.querySelectorAll('.method').forEach(m => m.classList.remove('active'));
    el.classList.add('active');
}
</script>
</body>
</html>
