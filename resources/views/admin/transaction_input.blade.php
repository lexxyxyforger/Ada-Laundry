<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi - AdaLaundry</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
    <style>
        body { padding: 40px 20px; background: var(--bg); font-family: 'Inter', sans-serif; }
        .container { max-width: 1000px; margin: 0 auto; }
        .header { display: flex; align-items: center; gap: 16px; margin-bottom: 30px; }
        .btn-back { display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: #fff; border: 1px solid var(--border); border-radius: 10px; color: var(--dark); cursor: pointer; transition: .2s; text-decoration: none; }
        .btn-back:hover { background: #f1f5f9; }
        .title { font-size: 24px; font-weight: 700; color: var(--dark); }
        .card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 24px; box-shadow: 0 10px 30px rgba(0,0,0,.02); margin-bottom: 24px; }
        .card-title { font-size: 16px; font-weight: 700; margin-bottom: 20px; border-bottom: 1px solid var(--border); padding-bottom: 12px; }
        
        .alert { padding: 14px 16px; border-radius: 10px; margin-bottom: 20px; font-size: 14px; font-weight: 500; }
        .alert-err { background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; }
        .alert-ok { background: #f0fdf4; border: 1px solid #bbf7d0; color: #16a34a; }
        
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .fg { display: flex; flex-direction: column; gap: 8px; }
        .fg label { font-size: 13px; font-weight: 600; color: var(--sec); }
        .form-control { width: 100%; height: 44px; padding: 0 14px; border: 1.5px solid var(--border); border-radius: 10px; font-size: 14px; font-family: inherit; outline: none; transition: .2s; }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(20,184,166,.1); }
        .form-control:disabled { background: #f8fafc; color: var(--muted); cursor: not-allowed; }
        
        .qty-wrap { display: flex; align-items: center; gap: 10px; }
        .btn-qty { width: 44px; height: 44px; background: #fff; border: 1.5px solid var(--border); border-radius: 10px; font-size: 20px; font-weight: 600; color: var(--dark); cursor: pointer; display: flex; align-items: center; justify-content: center; }
        .btn-qty:hover { background: #f1f5f9; }
        .qty-input { width: 80px; text-align: center; }
        
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { text-align: left; padding: 12px 16px; font-size: 13px; font-weight: 600; color: var(--sec); border-bottom: 2px solid var(--border); }
        td { padding: 16px; font-size: 14px; border-bottom: 1px solid var(--border); vertical-align: middle; }
        .btn-del { padding: 8px 14px; background: #fee2e2; color: #dc2626; border-radius: 8px; font-size: 13px; font-weight: 600; text-decoration: none; }
        
        .btn-submit { padding: 0 24px; height: 44px; background: linear-gradient(135deg, var(--primary), var(--blue)); color: #fff; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; font-size: 14px; }
        .btn-pay { display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; background: #10b981; color: #fff; border: none; border-radius: 12px; font-size: 16px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(16,185,129,.2); }
        
        /* Modal Styles */
        .modal-overlay { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15,23,42,.6); backdrop-filter: blur(4px); display: none; align-items: center; justify-content: center; z-index: 999; opacity: 0; transition: opacity .3s; }
        .modal-overlay.show { display: flex; opacity: 1; }
        .modal { background: #fff; width: 100%; max-width: 500px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,.1); transform: translateY(20px); transition: transform .3s; overflow: hidden; }
        .modal-overlay.show .modal { transform: translateY(0); }
        .modal-head { padding: 20px 24px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
        .modal-head h3 { font-size: 18px; font-weight: 700; margin: 0; }
        .btn-close { background: none; border: none; font-size: 24px; cursor: pointer; color: var(--sec); }
        .modal-body { padding: 24px; }
        .modal-foot { padding: 20px 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end; gap: 12px; background: #f8fafc; }
        .big-total { font-size: 24px; font-weight: 800; color: var(--primary); margin: 16px 0; text-align: center; }
        .kembalian-text { text-align: center; font-size: 18px; font-weight: 700; color: #10b981; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <a href="{{ url('/admin') }}" class="btn-back">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        </a>
        <h1 class="title">Input Transaksi Baru</h1>
    </div>

    @if (session('error'))<div class="alert alert-err">{{ session('error') }}</div>@endif
    @if (session('warning'))<div class="alert alert-err">{{ session('warning') }}</div>@endif
    @if (session('success'))<div class="alert alert-ok">{{ session('success') }}</div>@endif

    <!-- FORM INPUT -->
    <div class="card">
        <div class="card-title">Pilih Layanan & Item</div>
        <form action="{{ route('admin.transactions.session.store') }}" method="post">
            @csrf
            
            <div class="form-grid mb-4" style="margin-bottom: 20px;">
                <div class="fg">
                    <label>Pilihan Member</label>
                    @if (isset($memberIdSessionTransaction))
                        <!-- Jika sedang dalam transaksi, kunci pilihan member -->
                        <select class="form-control" disabled>
                            @foreach ($members as $member)
                                @if($member->id == $memberIdSessionTransaction)
                                    <option selected>{{ $member->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="hidden" name="member-id" value="{{ $memberIdSessionTransaction }}">
                    @else
                        <select class="form-control" name="member-id" required>
                            <option value="" disabled selected>-- Pilih Member --</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div>

            <div class="form-grid">
                <div class="fg">
                    <label>Barang</label>
                    <select class="form-control" name="item" required>
                        @foreach ($items as $item) <option value="{{ $item->id }}">{{ $item->name }}</option> @endforeach
                    </select>
                </div>
                <div class="fg">
                    <label>Servis (Layanan)</label>
                    <select class="form-control" name="service" required>
                        @foreach ($services as $service) <option value="{{ $service->id }}">{{ $service->name }}</option> @endforeach
                    </select>
                </div>
                <div class="fg">
                    <label>Kategori</label>
                    <select class="form-control" name="category" required>
                        @foreach ($categories as $category) <option value="{{ $category->id }}">{{ $category->name }}</option> @endforeach
                    </select>
                </div>
                <div class="fg">
                    <label>Banyak</label>
                    <div class="qty-wrap">
                        <button type="button" class="btn-qty" onclick="document.getElementById('qty').value = Math.max(1, parseInt(document.getElementById('qty').value) - 1)">-</button>
                        <input type="number" id="qty" name="quantity" class="form-control qty-input" value="1" min="1">
                        <button type="button" class="btn-qty" onclick="document.getElementById('qty').value = parseInt(document.getElementById('qty').value) + 1">+</button>
                        <button type="submit" class="btn-submit">Tambahkan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- KERANJANG TRANSAKSI -->
    <div class="card">
        <div class="card-title">Daftar Cucian</div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>Servis</th>
                    <th>Kategori</th>
                    <th>Banyak</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($sessionTransaction) && count($sessionTransaction) > 0)
                    @foreach ($sessionTransaction as $trs)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trs['itemName'] }}</td>
                            <td>{{ $trs['serviceName'] }}</td>
                            <td>{{ $trs['categoryName'] }}</td>
                            <td>{{ $trs['quantity'] }}</td>
                            <td style="font-weight:600">Rp {{ number_format($trs['subTotal'], 0, ',', '.') }}</td>
                            <td><a href="{{ route('admin.transactions.session.destroy', ['rowId' => $trs['rowId']]) }}" class="btn-del">Hapus</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--muted); padding: 40px;">Belum ada cucian ditambahkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        @if (isset($sessionTransaction) && count($sessionTransaction) > 0)
        <div style="margin-top: 30px; text-align: right;">
            <button class="btn-pay" onclick="openModal()">Lanjut ke Pembayaran <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></button>
        </div>
        @endif
    </div>
</div>

<!-- MODAL PEMBAYARAN -->
@if (isset($sessionTransaction) && count($sessionTransaction) > 0)
<div class="modal-overlay" id="payModal">
    <div class="modal">
        <div class="modal-head">
            <h3>Pembayaran Transaksi</h3>
            <button class="btn-close" onclick="closeModal()">&times;</button>
        </div>
        <form action="{{ route('admin.transactions.store') }}" method="POST" id="payForm">
            @csrf
            <div class="modal-body">
                <input type="hidden" id="baseTotal" value="{{ $totalPrice }}">
                
                <div class="fg" style="margin-bottom:16px;">
                    <label>Tipe Servis</label>
                    <select name="service-type" class="form-control" id="stype" required>
                        <option value="" selected hidden disabled>Pilih Tipe Service</option>
                        @foreach ($serviceTypes as $type)
                            <option value="{{ $type->id }}" data-cost="{{ $type->cost }}">
                                {{ $type->name }} (+Rp {{ number_format($type->cost, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="fg" style="margin-bottom:20px;">
                    <label>Gunakan Voucher Member</label>
                    <select name="voucher" class="form-control" id="svoucher">
                        <option value="0" data-disc="0">-- Tanpa Voucher --</option>
                        @if(isset($vouchers) && count($vouchers) > 0)
                            @foreach ($vouchers as $v)
                                <option value="{{ $v->id }}" data-disc="{{ $v->voucher->discount_value }}">
                                    {{ $v->voucher->name }} (-Rp {{ number_format($v->voucher->discount_value, 0, ',', '.') }})
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div style="background: #f1f5f9; padding: 16px; border-radius: 12px; margin-bottom: 20px;">
                    <div style="display:flex; justify-content:space-between; margin-bottom: 8px; font-size:14px;">
                        <span>Subtotal Cucian</span>
                        <span style="font-weight:600">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-bottom: 8px; font-size:14px; color: var(--primary);">
                        <span>Tambahan Servis</span>
                        <span id="txt-cost" style="font-weight:600">+Rp 0</span>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-bottom: 8px; font-size:14px; color: #10b981;">
                        <span>Potongan Voucher</span>
                        <span id="txt-disc" style="font-weight:600">-Rp 0</span>
                    </div>
                    <div style="border-top: 1px dashed var(--border); margin: 10px 0;"></div>
                    <div style="display:flex; justify-content:space-between; font-size:16px;">
                        <span style="font-weight:700">Total Akhir</span>
                        <span id="txt-final" style="font-weight:800; color:var(--dark);">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="fg">
                    <label>Jumlah Uang Dibayar (Rp)</label>
                    <input type="number" class="form-control" name="payment-amount" id="inputPay" style="font-size: 18px; font-weight:700" required placeholder="0">
                </div>
                
                <div class="kembalian-text" id="txt-return">Kembalian: Rp 0</div>
            </div>
            
            <div class="modal-foot">
                <button type="button" class="btn-submit" style="background:#e2e8f0;color:var(--dark);" onclick="closeModal()">Batal</button>
                <button type="submit" class="btn-submit" id="btn-process">Proses Transaksi</button>
            </div>
        </form>
    </div>
</div>

<script>
    const mOverlay = document.getElementById('payModal');
    const stype = document.getElementById('stype');
    const svoucher = document.getElementById('svoucher');
    const baseTotal = parseInt(document.getElementById('baseTotal').value);
    
    let currentTotal = baseTotal;

    function openModal() { mOverlay.classList.add('show'); document.getElementById('inputPay').focus(); }
    function closeModal() { mOverlay.classList.remove('show'); }

    function recalc() {
        let cost = 0; let disc = 0;
        if(stype.options[stype.selectedIndex]) {
            cost = parseInt(stype.options[stype.selectedIndex].getAttribute('data-cost') || 0);
        }
        if(svoucher.options[svoucher.selectedIndex]) {
            disc = parseInt(svoucher.options[svoucher.selectedIndex].getAttribute('data-disc') || 0);
        }
        
        document.getElementById('txt-cost').textContent = '+Rp ' + cost.toLocaleString('id-ID');
        document.getElementById('txt-disc').textContent = '-Rp ' + disc.toLocaleString('id-ID');
        
        currentTotal = baseTotal + cost - disc;
        if(currentTotal < 0) currentTotal = 0;
        document.getElementById('txt-final').textContent = 'Rp ' + currentTotal.toLocaleString('id-ID');
        
        calcReturn();
    }

    function calcReturn() {
        let pay = parseInt(document.getElementById('inputPay').value) || 0;
        let ret = pay - currentTotal;
        document.getElementById('txt-return').textContent = 'Kembalian: Rp ' + (ret >= 0 ? ret.toLocaleString('id-ID') : '0 (Kurang)');
        document.getElementById('txt-return').style.color = ret >= 0 ? '#10b981' : '#dc2626';
    }

    stype.addEventListener('change', recalc);
    svoucher.addEventListener('change', recalc);
    document.getElementById('inputPay').addEventListener('input', calcReturn);

    document.getElementById('payForm').addEventListener('submit', function(e) {
        let pay = parseInt(document.getElementById('inputPay').value) || 0;
        if(pay < currentTotal) {
            e.preventDefault();
            alert('Nominal uang pembayaran kurang!');
        }
    });
</script>
@endif

@if (session('id_trs'))
    <script type="text/javascript">
        window.open('{{ route('admin.transactions.print.index', ['transaction' => session('id_trs')]) }}', '_blank');
    </script>
@endif

</body>
</html>
