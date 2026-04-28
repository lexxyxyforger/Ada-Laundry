<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil — AdaLaundry</title>
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
        .alert-err{background:#fff5f5;border:1px solid #fecaca;color:#dc2626}
        
        /* LAYOUT */
        .grid-2{display:grid;grid-template-columns:1fr 2fr;gap:24px;align-items:flex-start}
        
        /* CARDS */
        .card{background:var(--white);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 30px rgba(0,0,0,.02)}
        .card-head{margin-bottom:20px;padding-bottom:16px;border-bottom:1px solid var(--border)}
        .card-head h2{font-family:'Poppins',sans-serif;font-size:18px;font-weight:700;color:var(--dark)}
        
        /* PROFILE PIC */
        .prof-pic-wrap{display:flex;flex-direction:column;align-items:center;text-align:center;gap:16px}
        .prof-pic{width:160px;height:160px;border-radius:50%;object-fit:cover;border:4px solid var(--white);box-shadow:0 10px 25px rgba(0,0,0,.08);background:linear-gradient(135deg,var(--p),#3b82f6);color:#fff;display:flex;align-items:center;justify-content:center;font-size:64px;font-weight:800}
        .file-upload{position:relative;display:inline-block}
        .file-upload input[type="file"]{position:absolute;left:0;top:0;opacity:0;cursor:pointer;width:100%;height:100%}
        .btn-upload{display:inline-flex;align-items:center;gap:8px;padding:10px 16px;background:var(--white);border:1px solid var(--border);border-radius:8px;font-size:13px;font-weight:600;color:var(--dark);box-shadow:0 2px 4px rgba(0,0,0,.02)}
        .btn-reset{display:inline-flex;font-size:13px;color:#ef4444;text-decoration:none;font-weight:600;margin-top:8px}
        .btn-reset:hover{text-decoration:underline}
        
        /* FORM */
        .fg{margin-bottom:16px}
        .fg label{display:block;font-size:13px;font-weight:600;color:var(--sec);margin-bottom:6px}
        .iw{display:flex;align-items:center;border:1.5px solid var(--border);border-radius:10px;padding:0 14px;background:#fff;transition:all .2s;height:46px}
        .iw:focus-within{border-color:var(--p);box-shadow:0 0 0 3px rgba(20,184,166,.12)}
        .iw input,.iw select{width:100%;height:100%;border:none;background:transparent;font-size:14px;color:var(--text);outline:none;font-family:inherit}
        .iw input:disabled{color:var(--muted);cursor:not-allowed}
        .btn-submit{padding:12px 20px;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;border:none;border-radius:10px;font-size:14px;font-weight:700;cursor:pointer;width:100%;transition:all .2s;font-family:inherit;margin-top:8px}
        .btn-submit:hover{transform:translateY(-1px);box-shadow:0 8px 24px rgba(20,184,166,.4)}
        
        @media(max-width:1024px){
            .sidebar{transform:translateX(-100%)}
            .sidebar.open{transform:translateX(0)}
            .main{margin-left:0}
            .burger{display:flex}
        }
        @media(max-width:768px){.grid-2{grid-template-columns:1fr}}
    </style>
</head>
<body>

@php
    $isAdmin = $user->role == \App\Enums\Role::Admin;
@endphp

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
        @if(!$isAdmin)
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
            <a href="{{ route('member.complaints.index') }}" class="sb-item">
                <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></div>
                Saran/Komplain
            </a>
        @else
            <a href="{{ route('admin.index') }}" class="sb-item">
                <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/></svg></div>
                Dashboard Admin
            </a>
        @endif
        
        <div class="sb-item active">
            <div class="sb-ic"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            Edit Profil
        </div>
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
            <span style="font-weight:600;font-size:14px;color:var(--dark)">Edit Profil</span>
        </div>
    </div>

    <div class="content">
        @if (session('success'))
            <div class="alert alert-ok">✅ {{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-err">⚠️ {{ session('error') }}</div>
        @endif

        <div class="grid-2">
            
            <!-- FOTO PROFIL -->
            <div class="card">
                <div class="card-head">
                    <h2>Foto Profil</h2>
                </div>
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="photoForm">
                    @csrf
                    @method('patch')
                    <div class="prof-pic-wrap">
                        @if($user->hasFile() && !$user->isDefaultFileName())
                            <img id="preview" src="{{ $user->getFileAsset() }}" alt="Profil" class="prof-pic">
                        @else
                            <div id="preview" class="prof-pic">{{ substr($user->name, 0, 1) }}</div>
                        @endif
                        
                        <div class="file-upload">
                            <input type="file" name="profile_picture" id="uploadInput" accept="image/*">
                            <div class="btn-upload">
                                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                Pilih Foto Baru
                            </div>
                        </div>
                        <a href="{{ route('profile.photo.destroy') }}" class="btn-reset" onclick="return confirm('Reset foto ke default?')">Reset Foto Profil</a>
                    </div>
                </form>
            </div>

            <!-- DATA DIRI & PASSWORD -->
            <div>
                <!-- DATA -->
                <div class="card" style="margin-bottom:24px">
                    <div class="card-head">
                        <h2>Informasi Akun</h2>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('patch')
                        
                        <div class="fg">
                            <label>Alamat Email</label>
                            <div class="iw">
                                <input type="email" value="{{ $user->email }}" disabled>
                            </div>
                        </div>

                        <div class="fg">
                            <label>Nama Lengkap</label>
                            <div class="iw">
                                <input type="text" name="name" value="{{ $user->name }}" required>
                            </div>
                        </div>

                        <div class="fg">
                            <label>Jenis Kelamin</label>
                            <div class="iw">
                                <select name="gender" required>
                                    <option value="L" {{ $user->gender == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="P" {{ $user->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="fg">
                            <label>Alamat</label>
                            <div class="iw">
                                <input type="text" name="address" value="{{ $user->address }}" placeholder="Masukkan alamat lengkap">
                            </div>
                        </div>

                        <div class="fg">
                            <label>No. Telepon / WhatsApp</label>
                            <div class="iw">
                                <input type="text" name="phone_number" value="{{ $user->phone_number }}" placeholder="Contoh: 08123456789">
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    </form>
                </div>

                <!-- GANTI PASSWORD -->
                <div class="card">
                    <div class="card-head">
                        <h2>Ubah Kata Sandi</h2>
                    </div>
                    <form action="{{ route('profile.password.update') }}" method="POST">
                        @csrf
                        @method('patch')
                        
                        <div class="fg">
                            <label>Kata Sandi Saat Ini</label>
                            <div class="iw">
                                <input type="password" name="current_password" required placeholder="Masukkan password lama">
                            </div>
                        </div>

                        <div class="fg">
                            <label>Kata Sandi Baru</label>
                            <div class="iw">
                                <input type="password" name="password" required placeholder="Minimal 8 karakter">
                            </div>
                        </div>

                        <div class="fg">
                            <label>Konfirmasi Kata Sandi Baru</label>
                            <div class="iw">
                                <input type="password" name="password_confirmation" required placeholder="Ketik ulang password baru">
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">Ubah Kata Sandi</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Sidebar toggle
    const burger = document.getElementById('burger');
    const sidebar = document.getElementById('sidebar');
    burger?.addEventListener('click', () => sidebar.classList.toggle('open'));

    // Auto submit form photo
    const uploadInput = document.getElementById('uploadInput');
    const photoForm = document.getElementById('photoForm');
    
    uploadInput.addEventListener('change', function() {
        if(this.files && this.files[0]) {
            photoForm.submit(); // Auto submit on select
        }
    });
</script>
</body>
</html>
