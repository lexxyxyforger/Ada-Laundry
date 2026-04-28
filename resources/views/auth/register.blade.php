<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@700;800&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',-apple-system,sans-serif;min-height:100vh;display:flex;overflow-x:hidden}

        /* LEFT PANEL */
        .left{width:42%;min-height:100vh;background:linear-gradient(160deg,#0f172a 0%,#1e3a5f 50%,#134e4a 100%);display:flex;flex-direction:column;justify-content:center;padding:60px 50px;position:sticky;top:0;align-self:flex-start;overflow:hidden}
        .left-blob{position:absolute;border-radius:50%;filter:blur(80px);pointer-events:none}
        .lb1{width:400px;height:400px;background:rgba(20,184,166,.2);top:-100px;right:-80px}
        .lb2{width:280px;height:280px;background:rgba(139,92,246,.15);bottom:-80px;left:-50px}
        .left-grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.03) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.03) 1px,transparent 1px);background-size:50px 50px}
        .left-content{position:relative;z-index:1}
        .left-brand{display:flex;align-items:center;gap:10px;margin-bottom:44px}
        .left-brand span{font-family:'Poppins',sans-serif;font-weight:700;font-size:20px;color:#fff}
        .left-title{font-family:'Poppins',sans-serif;font-size:30px;font-weight:800;color:#fff;line-height:1.3;margin-bottom:14px}
        .hl{background:linear-gradient(135deg,#5eead4,#7dd3fc);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .left-sub{font-size:14px;color:rgba(255,255,255,.6);line-height:1.7;margin-bottom:36px}
        .steps{display:flex;flex-direction:column;gap:16px}
        .step{display:flex;align-items:flex-start;gap:14px}
        .step-num{width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,#14b8a6,#0d9488);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;flex-shrink:0}
        .step h4{font-size:13px;font-weight:700;color:#fff;margin-bottom:2px}
        .step p{font-size:12px;color:rgba(255,255,255,.5);line-height:1.5}
        .left-bottom{position:absolute;bottom:32px;left:50px;right:50px;z-index:1}
        .lbottom-card{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:12px;padding:14px 16px;display:flex;align-items:center;gap:12px;backdrop-filter:blur(8px)}
        .lbc-icon{font-size:22px}
        .lbc-text p{font-size:12px;color:rgba(255,255,255,.5)}
        .lbc-text strong{font-size:13px;color:#fff}

        /* RIGHT PANEL */
        .right{flex:1;background:#f8fafc;display:flex;align-items:center;justify-content:center;padding:40px 28px;min-height:100vh}
        .form-box{width:100%;max-width:440px}
        .form-top{text-align:center;margin-bottom:28px}
        .form-top h1{font-family:'Poppins',sans-serif;font-size:24px;font-weight:800;color:#0f172a;margin-bottom:6px}
        .form-top p{font-size:14px;color:#64748b}
        .form-top a{color:#14b8a6;font-weight:600;text-decoration:none}

        /* ALERTS */
        .alert{display:flex;align-items:flex-start;gap:10px;padding:12px 14px;border-radius:10px;font-size:13px;font-weight:500;margin-bottom:18px;line-height:1.5}
        .alert-err{background:#fff5f5;border:1px solid #fecaca;color:#dc2626}
        .alert-ok{background:#f0fdf4;border:1px solid #bbf7d0;color:#16a34a}

        /* FORM */
        .frow{display:grid;grid-template-columns:1fr 1fr;gap:14px}
        .fg{margin-bottom:16px}
        .fg label{display:block;font-size:12.5px;font-weight:600;color:#374151;margin-bottom:5px}
        .iw{display:flex;align-items:center;gap:9px;border:1.5px solid #e2e8f0;border-radius:10px;padding:11px 13px;background:#fff;transition:all .2s}
        .iw:focus-within{border-color:#14b8a6;box-shadow:0 0 0 3px rgba(20,184,166,.12)}
        .iw.err{border-color:#ef4444}
        .iw svg{color:#94a3b8;flex-shrink:0}
        .iw input{flex:1;border:none;background:transparent;font-size:13.5px;color:#0f172a;outline:none;font-family:inherit}
        .iw input::placeholder{color:#94a3b8}
        .ferr{font-size:11.5px;color:#ef4444;margin-top:4px}
        .toggle-pw{background:none;border:none;cursor:pointer;color:#94a3b8;padding:0;display:flex;align-items:center;transition:color .2s}
        .toggle-pw:hover{color:#14b8a6}

        /* PASSWORD STRENGTH */
        .pw-strength{margin-top:8px}
        .ps-bar{height:4px;border-radius:2px;background:#e2e8f0;overflow:hidden;margin-bottom:4px}
        .ps-fill{height:100%;border-radius:2px;transition:all .3s;width:0}
        .ps-label{font-size:11px;color:#94a3b8}

        .terms{display:flex;align-items:flex-start;gap:8px;margin-bottom:20px}
        .terms input{width:15px;height:15px;accent-color:#14b8a6;margin-top:2px;cursor:pointer;flex-shrink:0}
        .terms label{font-size:12.5px;color:#64748b;cursor:pointer;line-height:1.5}
        .terms a{color:#14b8a6;font-weight:600;text-decoration:none}

        .btn-submit{width:100%;padding:13px;background:linear-gradient(135deg,#14b8a6,#0d9488);color:#fff;border:none;border-radius:10px;font-size:14px;font-weight:700;cursor:pointer;transition:all .25s;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:8px}
        .btn-submit:hover{transform:translateY(-1px);box-shadow:0 8px 24px rgba(20,184,166,.4)}
        .btn-submit.loading{opacity:.7;pointer-events:none}

        .divider{display:flex;align-items:center;gap:12px;margin:18px 0;color:#94a3b8;font-size:12px}
        .divider::before,.divider::after{content:'';flex:1;height:1px;background:#e2e8f0}

        .bottom-link{text-align:center;font-size:13.5px;color:#64748b}
        .bottom-link a{color:#14b8a6;font-weight:700;text-decoration:none}
        .back-home{display:inline-flex;align-items:center;gap:5px;font-size:12.5px;color:#94a3b8;text-decoration:none;margin-top:20px;transition:color .2s}
        .back-home:hover{color:#14b8a6}

        @media(max-width:900px){.left{display:none}.right{padding:28px 16px}}
        @media(max-width:480px){.frow{grid-template-columns:1fr}}
        @keyframes spin{to{transform:rotate(360deg)}}
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
                <rect width="32" height="32" rx="10" fill="url(#rg)"/>
                <path d="M9 13a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3h-8a3 3 0 0 1-3-3v-6z" stroke="white" stroke-width="1.5" fill="none"/>
                <circle cx="16" cy="16" r="2.2" fill="white"/>
                <path d="M13 10V8M19 10V8" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                <defs><linearGradient id="rg" x1="0" y1="0" x2="32" y2="32"><stop stop-color="#14b8a6"/><stop offset="1" stop-color="#0284c7"/></linearGradient></defs>
            </svg>
            <span>AdaLaundry</span>
        </div>
        <h1 class="left-title">Mulai Kelola<br>Laundry Anda<br><span class="hl">Secara Digital</span></h1>
        <p class="left-sub">Daftar gratis dan nikmati semua fitur manajemen laundry dalam satu platform terintegrasi.</p>
        <div class="steps">
            <div class="step">
                <div class="step-num">1</div>
                <div><h4>Buat Akun</h4><p>Isi form sederhana, akun langsung aktif</p></div>
            </div>
            <div class="step">
                <div class="step-num">2</div>
                <div><h4>Atur Layanan</h4><p>Tambah harga dan jenis layanan laundry Anda</p></div>
            </div>
            <div class="step">
                <div class="step-num">3</div>
                <div><h4>Mulai Kelola</h4><p>Terima transaksi dan pantau laporan realtime</p></div>
            </div>
        </div>
    </div>
    <div class="left-bottom">
        <div class="lbottom-card">
            <div class="lbc-icon">🔒</div>
            <div class="lbc-text">
                <strong>Data Aman & Terenkripsi</strong>
                <p>Privasi Anda adalah prioritas kami</p>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT PANEL -->
<div class="right">
    <div class="form-box">
        <div class="form-top">
            <h1>Buat Akun Baru ✨</h1>
            <p>Sudah punya akun? <a href="{{ route('login.show') }}">Masuk di sini</a></p>
        </div>

        @if(session('error'))
        <div class="alert alert-err">⚠️ {{ session('error') }}</div>
        @elseif(session('success'))
        <div class="alert alert-ok">✅ {{ session('success') }}</div>
        @endif

        <form action="{{ route('register.register') }}" method="POST" id="regForm">
            @csrf

            <div class="fg">
                <label for="name">Nama Lengkap</label>
                <div class="iw @error('name') err @enderror">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nama lengkap Anda" autocomplete="name">
                </div>
                @error('name')<p class="ferr">⚠ {{ $message }}</p>@enderror
            </div>

            <div class="fg">
                <label for="email">Alamat Email</label>
                <div class="iw @error('email') err @enderror">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com" autocomplete="email">
                </div>
                @error('email')<p class="ferr">⚠ {{ $message }}</p>@enderror
            </div>

            <div class="fg">
                <label for="password">Password</label>
                <div class="iw @error('password') err @enderror">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" autocomplete="new-password">
                    <button type="button" class="toggle-pw" id="togglePw1">
                        <svg id="eo1" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="ec1" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                <div class="pw-strength">
                    <div class="ps-bar"><div class="ps-fill" id="psFill"></div></div>
                    <p class="ps-label" id="psLabel">Masukkan password untuk melihat kekuatan</p>
                </div>
                @error('password')<p class="ferr">⚠ {{ $message }}</p>@enderror
            </div>

            <div class="fg">
                <label for="password_confirmation">Konfirmasi Password</label>
                <div class="iw">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" autocomplete="new-password">
                    <button type="button" class="toggle-pw" id="togglePw2">
                        <svg id="eo2" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        <svg id="ec2" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display:none"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                    </button>
                </div>
                <p class="ferr" id="matchErr" style="display:none">⚠ Password tidak cocok</p>
            </div>

            <div class="terms">
                <input type="checkbox" id="agree" name="agree" required>
                <label for="agree">Saya setuju dengan <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> AdaLaundry</label>
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
                Buat Akun Gratis
            </button>
        </form>

        <div class="divider">atau</div>
        <div class="bottom-link">Sudah punya akun? <a href="{{ route('login.show') }}">Masuk sekarang →</a></div>
        <div style="text-align:center">
            <a href="{{ url('/') }}" class="back-home">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
    // Toggle PW 1
    document.getElementById('togglePw1')?.addEventListener('click', () => {
        const i = document.getElementById('password');
        const show = i.type === 'password';
        i.type = show ? 'text' : 'password';
        document.getElementById('eo1').style.display = show ? 'none' : 'block';
        document.getElementById('ec1').style.display = show ? 'block' : 'none';
    });

    // Toggle PW 2
    document.getElementById('togglePw2')?.addEventListener('click', () => {
        const i = document.getElementById('password_confirmation');
        const show = i.type === 'password';
        i.type = show ? 'text' : 'password';
        document.getElementById('eo2').style.display = show ? 'none' : 'block';
        document.getElementById('ec2').style.display = show ? 'block' : 'none';
    });

    // Password strength
    const pwInput = document.getElementById('password');
    const fill    = document.getElementById('psFill');
    const label   = document.getElementById('psLabel');
    pwInput?.addEventListener('input', () => {
        const v = pwInput.value;
        let strength = 0;
        if (v.length >= 8) strength++;
        if (/[A-Z]/.test(v)) strength++;
        if (/[0-9]/.test(v)) strength++;
        if (/[^A-Za-z0-9]/.test(v)) strength++;
        const colors = ['#ef4444','#f59e0b','#3b82f6','#10b981'];
        const labels = ['Sangat Lemah','Lemah','Cukup Kuat','Sangat Kuat'];
        fill.style.width  = (strength * 25) + '%';
        fill.style.background = colors[strength - 1] || '#e2e8f0';
        label.textContent = v.length ? labels[strength - 1] || 'Masukkan password' : 'Masukkan password untuk melihat kekuatan';
        label.style.color = colors[strength - 1] || '#94a3b8';
    });

    // Password match check
    const confirm = document.getElementById('password_confirmation');
    const matchErr = document.getElementById('matchErr');
    confirm?.addEventListener('input', () => {
        const mismatch = confirm.value && confirm.value !== pwInput.value;
        matchErr.style.display = mismatch ? 'block' : 'none';
        confirm.parentElement.style.borderColor = mismatch ? '#ef4444' : '';
    });

    // Loading state
    document.getElementById('regForm')?.addEventListener('submit', function(e) {
        const mismatch = confirm?.value && confirm.value !== pwInput?.value;
        if (mismatch) { e.preventDefault(); matchErr.style.display = 'block'; return; }
        const btn = document.getElementById('submitBtn');
        btn.classList.add('loading');
        btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation:spin .8s linear infinite"><polyline points="23 4 23 10 17 10"/><path d="M20.49 15a9 9 0 1 1-.09-1.65"/></svg> Membuat akun...';
    });
</script>
</body>
</html>