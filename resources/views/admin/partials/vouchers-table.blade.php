<div class="table-card">
    <div class="table-header">
        <h2>Daftar Voucher ({{ $vouchers->count() }})</h2>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode Voucher</th>
                    <th>Diskon</th>
                    <th>Poin Dibutuhkan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                <tr>
                    <td><p class="font-medium">{{ $voucher->discount_value }}%</p></td>
                    <td>{{ $voucher->discount_value }}%</td>
                    <td>{{ $voucher->point_need }} poin</td>
                    <td><span class="status-badge status-completed">Aktif</span></td>
                    <td><button class="action-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button></td>
                </tr>
                @endforeach

                @if($vouchers->count() === 0)
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Tidak ada voucher ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
