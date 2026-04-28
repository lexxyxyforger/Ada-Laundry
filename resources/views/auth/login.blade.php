<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',-apple-system,sans-serif;min-height:100vh;display:flex;overflow-x:hidden}

        /* LEFT PANEL */
        .left{width:45%;min-height:100vh;background:linear-gradient(160deg,#0f172a 0%,#1e3a5f 50%,#134e4a 100%);display:flex;flex-direction:column;justify-content:center;padding:60px 56px;position:sticky;top:0;align-self:flex-start;overflow:hidden}
        .left-blob{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none}
        .lb1{width:400px;height:400px;background:rgba(20,184,166,.2);top:-120px;right:-80px}
        .lb2{width:300px;height:300px;background:rgba(59,130,246,.15);bottom:-100px;left:-60px}
        .left-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);background-size:50px 50px}
        .left-content{position:relative;z-index:1}
        .left-brand{display:flex;align-items:center;gap:10px;margin-bottom:48px}
        .left-brand span{font-family:'Poppins',sans-serif;font-weight:700;font-size:20px;color:#fff}
        .left-title{font-family:'Poppins',sans-serif;font-size:34px;font-weight:800;color:#fff;line-height:1.25;margin-bottom:16px}
        .left-title .hl{background:linear-gradient(135deg,#5eead4,#7dd3fc);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .left-sub{font-size:15px;color:rgba(255,255,255,.6);line-height:1.7;margin-bottom:40px}
        .left-features{display:flex;flex-direction:column;gap:14px}
        .lf{display:flex;align-items:center;gap:12px;color:rgba(255,255,255,.8);font-size:14px;font-weight:500}
        .lf-ic{width:32px;height:32px;border-radius:8px;background:rgba(20,184,166,.2);border:1px solid rgba(20,184,166,.3);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:14px}
        .left-bottom{position:absolute;bottom:32px;left:56px;right:56px;z-index:1}
        .trust-badges{display:flex;gap:16px}
        .tb{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);border-radius:10px;padding:10px 14px;text-align:center;flex:1}
        .tb-num{font-family:'Poppins',sans-serif;font-size:18px;font-weight:800;color:#fff}
        .tb-lbl{font-size:10px;color:rgba(255,255,255,.45);margin-top:1px}

        /* RIGHT PANEL */
        .right{flex:1;background:#f8fafc;display:flex;align-items:center;justify-content:center;padding:40px 32px;min-height:100vh}
        .form-box{width:100%;max-width:420px}
        .form-top{text-align:center;margin-bottom:32px}
        .form-top h1{font-family:'Poppins',sans-serif;font-size:26px;font-weight:800;color:#0f172a;margin-bottom:8px}
        .form-top p{font-size:14px;color:#64748b}
        .form-top a{color:#14b8a6;font-weight:600;text-decoration:none}
        .form-top a:hover{color:#0d9488}

        /* ALERTS */
        .alert{display:flex;align-items:flex-start;gap:10px;padding:12px 14px;border-radius:10px;font-size:13px;font-weight:500;margin-bottom:20px;line-height:1.5}
        .alert-err{background:#fff5f5;border:1px solid #fecaca;color:#dc2626}
        .alert-warn{background:#fffbeb;border:1px solid #fde68a;color:#92400e}
        .alert-ok{background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a}
        .alert-ic{flex-shrink:0;font-size:15px}

        /* FORM */
        .fg{margin-bottom:18px}
        .fg label{display:block;font-size:13px;font-weight:600;color:#374151;margin-bottom:6px}
        .iw{display:flex;align-items:center;gap:10px;border:1.5px solid #e2e8f0;border-radius:10px;padding:12px 14px;background:#fff;transition:all .2s}
        .iw:focus-within{border-color:#14b8a6;box-shadow:0 0 0 3px rgba(20,184,166,.12)}
        .iw.err{border-color:#ef4444}
        .iw svg{color:#94a3b8;flex-shrink:0}
        .iw input{flex:1;border:none;background:transparent;font-size:14px;color:#0f172a;outline:none;font-family:inherit}
        .iw input::placeholder{color:#94a3b8}
        .ferr{font-size:12px;color:#ef4444;margin-top:5px;display:flex;align-items:center;gap:4px}
        .toggle-pw{background:none;border:none;cursor:pointer;color:#94a3b8;padding:0;display:flex;align-items:center;transition:color .2s}
        .toggle-pw:hover{color:#14b8a6}

        .remember-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:22px}
        .cb-wrap{display:flex;align-items:center;gap:7px;cursor:pointer}
        .cb-wrap input{width:16px;height:16px;accent-color:#14b8a6;cursor:pointer}
        .cb-wrap span{font-size:13px;color:#64748b}
        .forgot{font-size:13px;color:#14b8a6;font-weight:600;text-decoration:none}
        .forgot:hover{color:#0d9488}

        .btn-submit{width:100%;padding:13px;background:linear-gradient(135deg,#14b8a6,#0d9488);color:#fff;border:none;border-radius:10px;font-size:15px;font-weight:700;cursor:pointer;transition:all .25s;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:8px}
        .btn-submit:hover{transform:translateY(-1px);box-shadow:0 8px 24px rgba(20,184,166,.4)}
        .btn-submit:active{transform:translateY(0)}
        .btn-submit.loading{opacity:.7;pointer-events:none}

        .divider{display:flex;align-items:center;gap:12px;margin:22px 0;color:#94a3b8;font-size:12px}
        .divider::before,.divider::after{content:'';flex:1;height:1px;background:#e2e8f0}

        .bottom-link{text-align:center;font-size:14px;color:#64748b}
        .bottom-link a{color:#14b8a6;font-weight:700;text-decoration:none}
        .bottom-link a:hover{color:#0d9488}

        .back-home{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:#94a3b8;text-decoration:none;margin-top:24px;transition:color .2s}
        .back-home:hover{color:#14b8a6}

        @media(max-width:900px){.left{display:none}.right{padding:32px 20px}}
    </style>
</head>
<body>

<!-- LEFT PANEL -->
<div class="left">
    <div class="left-blob lb1"></div>
    <div class="left-blob lb2"></div>
    <div class="left-grid"></div>
    <div class="left-content">
        <div class="left-brand">
            <svg width="36" height="36" viewBox="0 0 32 32" fill="none">
                <rect width="32" height="32" rx="10" fill="url(#lg)"/>
                <path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/>
                <circle cx="16" cy="16" r="2.2" fill="white"/>
                <path d="M13 10V8M19 10V8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <defs><linearGradient id="lg" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs>
            </svg>
            <span>AdaLaundry</span>
        </div>
        <h1 class="left-title">Selamat Datang<br>Kembali <span class="hl">👋</span></h1>
        <p class="left-sub">Masuk ke dashboard untuk mengelola transaksi, member, dan laporan laundry Anda secara realtime.</p>
        <div class="left-features">
            <div class="lf"><div class="lf-ic">⚡</div>Dashboard Realtime</div>
            <div class="lf"><div class="lf-ic">📊</div>Laporan Keuangan Otomatis</div>
            <div class="lf"><div class="lf-ic">👥</div>Manajemen Member & Voucher</div>
            <div class="lf"><div class="lf-ic">🔒</div>Data Aman & Terenkripsi</div>
        </div>
    </div>
    <div class="left-bottom">
        <div class="trust-badges">
            <div class="tb"><div class="tb-num">1K+</div><div class="tb-lbl">Bisnis Aktif</div></div>
            <div class="tb"><div class="tb-num">50K+</div><div class="tb-lbl">Pengguna</div></div>
            <div class="tb"><div class="tb-num">4.9⭐</div><div class="tb-lbl">Rating</div></div>
        </div>
    </div>
</div>

<!-- RIGHT PANEL -->
<div class="right">
    <div class="form-box">
        <div class="form-top">
            <h1>Masuk ke Akun</h1>
            <p>Belum punya akun? <a href="{{ route('register.show') }}">Daftar gratis</a></p>
        </div>

        @if(session('error'))
        <div class="alert alert-err"><span class="alert-ic">⚠️</span>{{ session('error') }}</div>
        @elseif(session('warning'))
        <div class="alert alert-warn"><span class="alert-ic">⚠️</span>{{ session('warning') }}</div>
        @elseif(session('success'))
        <div class="alert alert-ok"><span class="alert-ic">✅</span>{{ session('success') }}</div>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST" id="loginForm">
            @csrf

            <div class="fg">
                <label for="email">Alamat Email</label>
                <div class="iw @error('email') err @enderror">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com" autocomplete="email">
                </div>
                @error('email')<p class="ferr">⚠ {{ $message }}</p>@enderror
            </div>

            <div class="fg">
                <label for="password">Password</label>
                <div class="iw @error('password') err @enderror">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <input type="password" id="password" name="password" placeholder="Password Anda" autocomplete="current-password">
                    <button type="button" class="toggle-pw" id="togglePw">
                        <svg id="eyeOpen" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="eyeClosed" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                @error('password')<p class="ferr">⚠ {{ $message }}</p>@enderror
            </div>

            <div class="remember-row">
                <label class="cb-wrap">
                    <input type="checkbox" name="remember" id="remember">
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Masuk ke Dashboard
            </button>
        </form>

        <div class="divider">atau</div>

        <div class="bottom-link">
            <a href="{{ route('register.show') }}">Buat akun baru →</a>
        </div>

        <div style="text-align:center">
            <a href="{{ url('/') }}" class="back-home">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    const togglePw  = document.getElementById('togglePw');
    const pwInput   = document.getElementById('password');
    const eyeOpen   = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');
    togglePw?.addEventListener('click', () => {
        const show = pwInput.type === 'password';
        pwInput.type = show ? 'text' : 'password';
        eyeOpen.style.display   = show ? 'none' : 'block';
        eyeClosed.style.display = show ? 'block' : 'none';
    });

    // Loading state on submit
    document.getElementById('loginForm')?.addEventListener('submit', () => {
        const btn = document.getElementById('submitBtn');
        btn.classList.add('loading');
        btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spin .8s linear infinite"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-.09-1.65"/></svg> Memverifikasi...';
    });
</script>
<style>@keyframes spin{to{transform:rotate(360deg)}}</style>
</body>
</html>
