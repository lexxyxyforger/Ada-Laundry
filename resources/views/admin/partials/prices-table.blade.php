<div class="table-card">
    <div class="table-header">
        <h2>Daftar Harga Layanan ({{ count($satuan) + count($kiloan) }})</h2>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Jenis Layanan</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($satuan as $price)
                <tr>
                    <td><p class="font-medium">{{ $price->service->service_name ?? 'N/A' }}</p></td>
                    <td>{{ $price->item->item_name ?? 'Satuan' }}</td>
                    <td class="font-medium">Rp {{ number_format($price->price, 0, ',', '.') }}</td>
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

                @foreach($kiloan as $price)
                <tr>
                    <td><p class="font-medium">{{ $price->service->service_name ?? 'N/A' }}</p></td>
                    <td>{{ $price->item->item_name ?? 'Kiloan' }}</td>
                    <td class="font-medium">Rp {{ number_format($price->price, 0, ',', '.') }} / kg</td>
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

                @if(count($satuan) + count($kiloan) === 0)
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Tidak ada harga ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
