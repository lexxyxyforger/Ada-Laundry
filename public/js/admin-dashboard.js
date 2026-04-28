/* ============================================================
   AdaLaundry Admin Dashboard — Realtime JS
============================================================ */

const API = {
    stats:        '/api/admin/dashboard-stats',
    transactions: '/api/admin/transactions',
    members:      '/api/admin/members',
    prices:       '/api/admin/price-lists',
    vouchers:     '/api/admin/vouchers',
    reports:      '/api/admin/reports',
};

const headers = { 'X-Requested-With': 'XMLHttpRequest' };

/* ─── UTILITIES ─── */
function fmt(num){ return 'Rp ' + Number(num).toLocaleString('id-ID'); }
function initial(name){ return (name||'?').charAt(0).toUpperCase(); }
function animVal(el, val){
    if(!el) return;
    el.style.opacity='0';
    setTimeout(()=>{ el.textContent=val; el.style.transition='opacity .4s'; el.style.opacity='1'; },150);
}

/* ─── CLOCK ─── */
function startClock(){
    const el = document.getElementById('rtClock');
    if(!el) return;
    const tick=()=>{ el.textContent = new Date().toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit',second:'2-digit'}); };
    tick(); setInterval(tick, 1000);
}

/* ─── NAVIGATION ─── */
const LABELS = { dashboard:'Dashboard', transaksi:'Transaksi', member:'Member', harga:'Daftar Harga', laporan:'Laporan', voucher:'Voucher', profile:'Profil Saya' };
let currentSec = 'dashboard';
const loaders = {};   // store setInterval ids per section

function showSection(name){
    document.querySelectorAll('.nav-item').forEach(n=>n.classList.remove('active'));
    document.querySelectorAll('.sec').forEach(s=>s.classList.remove('active-sec'));

    const navEl = document.querySelector(`.nav-item[data-section="${name}"]`);
    if(navEl) navEl.classList.add('active');
    const secEl = document.querySelector(`.sec[data-section="${name}"]`);
    if(secEl) secEl.classList.add('active-sec');

    const bc = document.getElementById('bcCur');
    if(bc) bc.textContent = LABELS[name]||name;

    currentSec = name;
    triggerLoad(name);
}

function triggerLoad(name){
    if(name==='dashboard')    { loadStats(); loadDashTx(); }
    if(name==='transaksi')    loadTransactions();
    if(name==='member')       loadMembers();
    if(name==='harga')        loadPrices();
    if(name==='laporan')      loadReports();
    if(name==='voucher')      loadVouchers();
}

/* ─── REALTIME POLLING ─── */
function startPolling(){
    setInterval(()=>{ loadStats(); if(currentSec!=='dashboard') triggerLoad(currentSec); }, 15000);
}

/* ─── DASHBOARD STATS ─── */
async function loadStats(){
    try{
        const r = await fetch(API.stats,{headers});
        if(!r.ok) return;
        const d = await r.json();
        animVal(document.getElementById('stat-members'),   d.totalMembers);
        animVal(document.getElementById('stat-transactions'), d.totalTransactions);
        animVal(document.getElementById('stat-revenue'),   fmt(d.totalRevenue));
        animVal(document.getElementById('stat-pending'),   d.pendingTransactions);

        document.getElementById('badge-transaksi').textContent = d.totalTransactions;
        document.getElementById('badge-member').textContent    = d.totalMembers;

        const lu = document.getElementById('lastUpdate');
        if(lu) lu.textContent = new Date().toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit',second:'2-digit'});
    }catch(e){ console.error('Stats error',e); }
}

/* ─── DASHBOARD RECENT TX ─── */
async function loadDashTx(){
    const tbody = document.getElementById('dash-tx-body');
    if(!tbody) return;
    try{
        const r = await fetch(API.transactions+'?month='+new Date().getMonth()+1+'&year='+new Date().getFullYear(),{headers});
        const d = await r.json();
        const rows = (d.data||[]).slice(0,6);
        if(!rows.length){ tbody.innerHTML='<tr><td colspan="4" class="empty-td">Belum ada transaksi bulan ini</td></tr>'; return; }
        tbody.innerHTML = rows.map(t=>`
            <tr>
                <td><div class="ca"><div class="cav">${initial(t.member_name)}</div><div><p class="fn">${t.member_name}</p><p class="ts">#${t.id}</p></div></div></td>
                <td>${t.service_type}</td>
                <td><span class="badge ${t.is_done?'b-done':'b-proc'}">${t.status}</span></td>
                <td class="fn">${t.total_fmt}</td>
            </tr>`).join('');
    }catch(e){ tbody.innerHTML='<tr><td colspan="4" class="empty-td">Gagal memuat data</td></tr>'; }
}

/* ─── TRANSAKSI ─── */
async function loadTransactions(){
    const tbody = document.getElementById('tx-body');
    if(!tbody) return;
    const month = document.getElementById('tx-month')?.value || new Date().getMonth()+1;
    const year  = document.getElementById('tx-year')?.value  || new Date().getFullYear();
    try{
        const r = await fetch(`${API.transactions}?month=${month}&year=${year}`,{headers});
        const d = await r.json();
        const rows = d.data||[];
        if(!rows.length){ tbody.innerHTML='<tr><td colspan="6" class="empty-td">Tidak ada transaksi ditemukan</td></tr>'; return; }
        tbody.innerHTML = rows.map((t,i)=>`
            <tr>
                <td>${i+1}</td>
                <td><div class="ca"><div class="cav">${initial(t.member_name)}</div><div><p class="fn">${t.member_name}</p></div></div></td>
                <td>${t.service_type}</td>
                <td>${t.date}</td>
                <td><span class="badge ${t.is_done?'b-done':'b-proc'}">${t.status}</span></td>
                <td class="fn">${t.total_fmt}</td>
            </tr>`).join('');
    }catch(e){ tbody.innerHTML='<tr><td colspan="6" class="empty-td">Gagal memuat data</td></tr>'; }
}

/* ─── MEMBER ─── */
let allMembers = [];
async function loadMembers(){
    const grid = document.getElementById('member-grid');
    if(!grid) return;
    try{
        const r = await fetch(API.members,{headers});
        const d = await r.json();
        allMembers = d.data||[];
        renderMembers(allMembers);
    }catch(e){ grid.innerHTML='<div class="empty-td" style="grid-column:1/-1;text-align:center;padding:40px">Gagal memuat data</div>'; }
}

function renderMembers(list){
    const grid = document.getElementById('member-grid');
    if(!grid) return;
    if(!list.length){ grid.innerHTML='<div class="empty-td" style="grid-column:1/-1;text-align:center;padding:40px">Belum ada member terdaftar</div>'; return; }
    grid.innerHTML = list.map(m=>`
        <div class="mcard">
            <div class="mcard-ava">${m.initial}</div>
            <p class="mcard-name">${m.name}</p>
            <p class="mcard-email">${m.email}</p>
            <p class="mcard-phone">📞 ${m.phone}</p>
            <p class="mcard-joined">Bergabung: ${m.joined}</p>
        </div>`).join('');
}

/* member search */
document.addEventListener('DOMContentLoaded', ()=>{
    const s = document.getElementById('member-search');
    if(s) s.addEventListener('input', e=>{
        const q = e.target.value.toLowerCase();
        renderMembers(allMembers.filter(m=>m.name.toLowerCase().includes(q)||m.email.toLowerCase().includes(q)));
    });
});

/* ─── HARGA ─── */
let allPrices = [];
let priceTab  = 'satuan';
async function loadPrices(){
    try{
        const r = await fetch(API.prices,{headers});
        const d = await r.json();
        allPrices = d.data||[];
        renderPrices();
    }catch(e){ document.getElementById('price-body').innerHTML='<tr><td colspan="4" class="empty-td">Gagal memuat data</td></tr>'; }
}
function renderPrices(){
    const tbody = document.getElementById('price-body');
    if(!tbody) return;
    const list = allPrices.filter(p=> priceTab==='satuan' ? p.category_id==1 : p.category_id==2);
    if(!list.length){ tbody.innerHTML='<tr><td colspan="4" class="empty-td">Tidak ada data</td></tr>'; return; }
    tbody.innerHTML = list.map(p=>`
        <tr>
            <td>${p.service}</td>
            <td>${p.item}</td>
            <td>${p.category}</td>
            <td class="fn">${p.price_fmt}</td>
        </tr>`).join('');
}

/* ─── LAPORAN ─── */
async function loadReports(){
    const month = document.getElementById('rpt-month')?.value || new Date().getMonth()+1;
    const year  = document.getElementById('rpt-year')?.value  || new Date().getFullYear();
    try{
        const r = await fetch(`${API.reports}?month=${month}&year=${year}`,{headers});
        const d = await r.json();
        animVal(document.getElementById('rpt-revenue'), d.revenue_fmt);
        animVal(document.getElementById('rpt-total'),   d.total_tx);
        animVal(document.getElementById('rpt-done'),    d.done_tx);
        animVal(document.getElementById('rpt-pending'), d.pending_tx);
        renderChart(d.monthly||[]);
    }catch(e){ console.error('Report error',e); }
}
function renderChart(monthly){
    const area = document.getElementById('chart-area');
    if(!area) return;
    const maxAmt = Math.max(...monthly.map(m=>m.amount),1);
    area.innerHTML = monthly.map(m=>{
        const h = Math.max(Math.round((m.amount/maxAmt)*160),4);
        return `<div class="chart-bar-wrap">
            <div class="chart-amt">${m.count}tx</div>
            <div class="chart-bar" style="height:${h}px" title="${m.label}: ${fmt(m.amount)}"></div>
            <div class="chart-label">${m.label}</div>
        </div>`;
    }).join('');
}

/* ─── VOUCHER ─── */
async function loadVouchers(){
    const grid = document.getElementById('voucher-grid');
    if(!grid) return;
    try{
        const r = await fetch(API.vouchers,{headers});
        const d = await r.json();
        const list = d.data||[];
        if(!list.length){ grid.innerHTML='<div class="empty-td" style="padding:40px;text-align:center">Belum ada voucher</div>'; return; }
        grid.innerHTML = list.map(v=>`
            <div class="vcard theme-${v.theme||'blue'}">
                <p class="vcard-name">${v.name}</p>
                <p class="vcard-disc">${v.discount_fmt}</p>
                <p class="vcard-pt">🎯 ${v.point_need} poin</p>
                <p class="vcard-desc">${v.description||''}</p>
                <div style="margin-top:12px;display:flex;align-items:center;justify-content:space-between">
                    <span class="vcard-status ${v.active?'vs-active':'vs-inactive'}">${v.active?'● Aktif':'● Nonaktif'}</span>
                </div>
            </div>`).join('');
    }catch(e){ grid.innerHTML='<div class="empty-td" style="padding:40px;text-align:center">Gagal memuat data</div>'; }
}

/* ─── MAIN INIT ─── */
document.addEventListener('DOMContentLoaded', ()=>{

    startClock();

    /* Nav click */
    document.querySelectorAll('.nav-item[data-section]').forEach(item=>{
        item.addEventListener('click', e=>{
            e.preventDefault();
            showSection(item.getAttribute('data-section'));
            if(window.innerWidth<=1024){
                document.getElementById('sidebar')?.classList.remove('open');
                document.getElementById('overlay')?.classList.remove('show');
            }
        });
    });

    /* Burger */
    document.getElementById('burger')?.addEventListener('click', ()=>{
        document.getElementById('sidebar')?.classList.toggle('open');
        document.getElementById('overlay')?.classList.toggle('show');
    });
    document.getElementById('overlay')?.addEventListener('click', ()=>{
        document.getElementById('sidebar')?.classList.remove('open');
        document.getElementById('overlay')?.classList.remove('show');
    });

    /* Price tabs */
    document.querySelectorAll('.tab').forEach(tab=>{
        tab.addEventListener('click', ()=>{
            document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
            tab.classList.add('active');
            priceTab = tab.getAttribute('data-tab');
            renderPrices();
        });
    });

    /* Report filters */
    ['rpt-month','rpt-year'].forEach(id=>{
        document.getElementById(id)?.addEventListener('change', loadReports);
    });

    /* TX filters */
    ['tx-month','tx-year'].forEach(id=>{
        document.getElementById(id)?.addEventListener('change', loadTransactions);
    });

    /* Initial load */
    showSection('dashboard');
    startPolling();

    /* Keyboard ESC */
    document.addEventListener('keydown', e=>{
        if(e.key==='Escape'){
            document.getElementById('sidebar')?.classList.remove('open');
            document.getElementById('overlay')?.classList.remove('show');
        }
    });
});
