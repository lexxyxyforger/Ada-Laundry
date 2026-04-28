<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saran & Komplain - AdaLaundry Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base_url" content="{{ url('admin') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{--p:#14b8a6;--pd:#0d9488;--dark:#0f172a;--bg:#f8fafc;--border:#e2e8f0;--sec:#64748b;--muted:#94a3b8}
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--dark);min-height:100vh;display:flex;flex-direction:column}
        
        /* TOPBAR */
        .topbar{height:70px;background:#fff;border-bottom:1px solid var(--border);display:flex;align-items:center;padding:0 30px;position:sticky;top:0;z-index:90}
        .btn-back{display:inline-flex;align-items:center;justify-content:center;width:38px;height:38px;background:var(--bg);border:1px solid var(--border);border-radius:10px;color:var(--dark);margin-right:20px;text-decoration:none;transition:.2s}
        .btn-back:hover{background:#e2e8f0}
        .page-title{font-size:18px;font-weight:700}
        
        /* LAYOUT */
        .main{flex:1;padding:30px;max-width:1200px;margin:0 auto;width:100%;height:calc(100vh - 70px);display:flex;flex-direction:column}
        .inbox-wrap{display:grid;grid-template-columns:350px 1fr;gap:20px;background:#fff;border:1px solid var(--border);border-radius:16px;box-shadow:0 10px 30px rgba(0,0,0,.02);overflow:hidden;flex:1;height:100%}
        
        /* SIDEBAR LIST */
        .inbox-list{border-right:1px solid var(--border);display:flex;flex-direction:column;height:100%}
        .il-head{padding:20px;border-bottom:1px solid var(--border)}
        .il-head h2{font-size:16px;font-weight:700;margin-bottom:5px}
        .il-head p{font-size:13px;color:var(--sec)}
        .il-scroll{flex:1;overflow-y:auto;padding:10px}
        .il-item{padding:16px;border-radius:12px;cursor:pointer;transition:all .2s;border:1px solid transparent;margin-bottom:8px;background:#fff}
        .il-item:hover{background:#f8fafc;border-color:var(--border)}
        .il-item.active{background:#f0fdfa;border-color:#ccfbf1;box-shadow:0 4px 12px rgba(20,184,166,.1)}
        .il-item-head{display:flex;align-items:center;justify-content:space-between;margin-bottom:8px}
        .il-name{font-weight:600;font-size:14px;color:var(--dark)}
        .il-type{font-size:11px;font-weight:700;padding:3px 8px;border-radius:50px}
        .type-1{background:#fef3c7;color:#d97706} /* Saran */
        .type-2{background:#fee2e2;color:#dc2626} /* Komplain */
        .il-preview{font-size:13px;color:var(--sec);display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;line-height:1.4}
        
        /* CONTENT RIGHT */
        .inbox-content{display:flex;flex-direction:column;height:100%;background:#f8fafc}
        .ic-empty{flex:1;display:flex;align-items:center;justify-content:center;flex-direction:column;color:var(--muted);gap:16px}
        
        .ic-view{display:none;flex-direction:column;height:100%}
        .ic-view.show{display:flex}
        
        .ic-head{padding:24px;background:#fff;border-bottom:1px solid var(--border)}
        .ic-head h2{font-size:20px;font-weight:700;margin-bottom:8px}
        .ic-meta{display:flex;align-items:center;gap:12px;font-size:13px;color:var(--sec)}
        
        .ic-body{flex:1;padding:24px;overflow-y:auto}
        .bubble{max-width:85%;padding:16px;border-radius:16px;font-size:14px;line-height:1.6;margin-bottom:20px;position:relative}
        .bubble-client{background:#fff;border:1px solid var(--border);border-bottom-left-radius:4px}
        .bubble-label{font-size:11px;font-weight:700;color:var(--muted);margin-bottom:8px;text-transform:uppercase;letter-spacing:1px}
        
        .ic-reply{padding:24px;background:#fff;border-top:1px solid var(--border)}
        .reply-box{display:flex;flex-direction:column;gap:12px}
        .reply-input{width:100%;height:100px;padding:16px;border:1.5px solid var(--border);border-radius:12px;font-family:inherit;font-size:14px;resize:none;outline:none;transition:.2s}
        .reply-input:focus{border-color:var(--p);box-shadow:0 0 0 3px rgba(20,184,166,.1)}
        .btn-reply{align-self:flex-end;padding:12px 24px;background:var(--p);color:#fff;border:none;border-radius:10px;font-weight:600;cursor:pointer;transition:.2s}
        .btn-reply:hover{background:var(--pd);transform:translateY(-1px)}
        
        @media(max-width:768px){
            .inbox-wrap{grid-template-columns:1fr}
            .inbox-list{display:none} /* In a real app, we'd toggle this */
        }
    </style>
</head>
<body>

<div class="topbar">
    <a href="{{ url('admin') }}" class="btn-back">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
    </a>
    <h1 class="page-title">Saran & Komplain</h1>
</div>

<div class="main">
    <div class="inbox-wrap">
        
        <!-- Kiri: Daftar Pesan -->
        <div class="inbox-list">
            <div class="il-head">
                <h2>Kotak Masuk</h2>
                <p>{{ $count }} pesan butuh tanggapan</p>
            </div>
            <div class="il-scroll">
                @if(count($complaints) == 0 && count($suggestions) == 0)
                    <div style="text-align:center;padding:40px 20px;color:var(--muted);font-size:14px">Tidak ada pesan baru</div>
                @endif
                
                @foreach ($complaints as $complaint)
                    <div class="il-item" onclick="openMsg({{ $complaint->id }}, 'Komplain', '{{ $complaint->user->name }}')">
                        <div class="il-item-head">
                            <span class="il-name">{{ $complaint->user->name }}</span>
                            <span class="il-type type-2">Komplain</span>
                        </div>
                        <div class="il-preview" id="preview-{{ $complaint->id }}">Memuat isi...</div>
                    </div>
                @endforeach
                
                @foreach ($suggestions as $suggestion)
                    <div class="il-item" onclick="openMsg({{ $suggestion->id }}, 'Saran', '{{ $suggestion->user->name }}')">
                        <div class="il-item-head">
                            <span class="il-name">{{ $suggestion->user->name }}</span>
                            <span class="il-type type-1">Saran</span>
                        </div>
                        <div class="il-preview" id="preview-{{ $suggestion->id }}">Memuat isi...</div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <!-- Kanan: Baca & Balas -->
        <div class="inbox-content">
            <!-- Empty state -->
            <div class="ic-empty" id="icEmpty">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                <p>Pilih pesan untuk melihat isi dan memberikan balasan</p>
            </div>
            
            <!-- View State -->
            <div class="ic-view" id="icView">
                <div class="ic-head">
                    <h2 id="viewName">Nama Pelanggan</h2>
                    <div class="ic-meta">
                        <span id="viewType" class="il-type">Tipe</span>
                        <span>Menunggu tanggapan</span>
                    </div>
                </div>
                
                <div class="ic-body">
                    <div class="bubble bubble-client">
                        <div class="bubble-label">Pesan dari Pelanggan:</div>
                        <div id="viewBody">Memuat pesan...</div>
                    </div>
                </div>
                
                <div class="ic-reply">
                    <div class="reply-box">
                        <textarea id="replyText" class="reply-input" placeholder="Tulis balasan Anda di sini..."></textarea>
                        <button class="btn-reply" id="btnSend" onclick="sendReply()">Kirim Balasan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    let activeId = null;
    const baseUrl = document.querySelector('meta[name="base_url"]').content;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    // Pre-fetch all previews to make the UI look populated
    document.querySelectorAll('.il-item').forEach(item => {
        const idMatch = item.querySelector('.il-preview').id.match(/\d+/);
        if(idMatch) {
            fetch(baseUrl + '/complaint-suggestions/' + idMatch[0])
                .then(r => r.json())
                .then(d => {
                    document.getElementById('preview-' + idMatch[0]).innerText = d.body;
                });
        }
    });

    function openMsg(id, type, name) {
        // Highlight active
        document.querySelectorAll('.il-item').forEach(i => i.classList.remove('active'));
        event.currentTarget.classList.add('active');
        
        activeId = id;
        document.getElementById('icEmpty').style.display = 'none';
        document.getElementById('icView').classList.add('show');
        
        document.getElementById('viewName').innerText = name;
        const typeEl = document.getElementById('viewType');
        typeEl.innerText = type;
        typeEl.className = 'il-type ' + (type === 'Saran' ? 'type-1' : 'type-2');
        
        document.getElementById('viewBody').innerText = "Memuat pesan...";
        document.getElementById('replyText').value = "";
        
        // Fetch content
        fetch(baseUrl + '/complaint-suggestions/' + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById('viewBody').innerText = data.body;
            });
    }
    
    function sendReply() {
        if(!activeId) return;
        const reply = document.getElementById('replyText').value.trim();
        if(!reply) { alert('Silakan tulis balasan terlebih dahulu!'); return; }
        
        const btn = document.getElementById('btnSend');
        btn.innerText = 'Mengirim...';
        btn.disabled = true;
        
        fetch(baseUrl + '/complaint-suggestions/' + activeId, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ reply: reply })
        })
        .then(res => {
            if(res.ok) {
                alert('Balasan berhasil dikirim!');
                window.location.reload();
            } else {
                alert('Gagal mengirim balasan.');
                btn.innerText = 'Kirim Balasan';
                btn.disabled = false;
            }
        });
    }
</script>

</body>
</html>
