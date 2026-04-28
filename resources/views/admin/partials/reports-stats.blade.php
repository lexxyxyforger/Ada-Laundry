<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-header">
            <h3>Total Transaksi</h3>
            <div class="stat-icon transaction-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                    <path d="M2 10h20"></path>
                </svg>
            </div>
        </div>
        <p class="stat-value">{{ $transactionsCount ?? 0 }}</p>
        <p class="stat-change">Total transaksi</p>
    </div>

    <div class="stat-card">
        <div class="stat-header">
            <h3>Total Pendapatan</h3>
            <div class="stat-icon revenue-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="1" x2="12" y2="23"></line>
                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                </svg>
            </div>
        </div>
        <p class="stat-value">Rp {{ number_format($revenue ?? 0, 0, ',', '.') }}</p>
        <p class="stat-change positive">Pendapatan total</p>
    </div>
</div>

@if(isset($monthly_data))
<div class="table-card" style="margin-top: 20px;">
    <div class="table-header">
        <h2>Riwayat Bulanan</h2>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Transaksi</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($monthly_data as $data)
                <tr>
                    <td>{{ $data['month'] }}</td>
                    <td>{{ $data['count'] ?? 0 }} transaksi</td>
                    <td class="font-medium">Rp {{ number_format($data['revenue'] ?? 0, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; padding: 20px;">Data tidak tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endif
