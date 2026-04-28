<div class="table-card">
    <div class="table-header">
        <h2>Semua Transaksi ({{ $ongoingTransactions->count() + $ongoingPriorityTransactions->count() + $finishedTransactions->count() }})</h2>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ongoingTransactions as $transaction)
                <tr>
                    <td>
                        <div class="customer-cell">
                            <div class="customer-avatar">{{ substr($transaction->member->name, 0, 1) }}</div>
                            <div>
                                <p class="font-medium">{{ $transaction->member->name }}</p>
                                <p class="text-sm text-muted">ID: #{{ $transaction->id }}</p>
                            </div>
                        </div>
                    </td>
                    <td><span class="status-badge status-processing">Proses</span></td>
                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                    <td class="font-medium">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                    <td><button class="action-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button></td>
                </tr>
                @endforeach

                @foreach($ongoingPriorityTransactions as $transaction)
                <tr>
                    <td>
                        <div class="customer-cell">
                            <div class="customer-avatar">{{ substr($transaction->member->name, 0, 1) }}</div>
                            <div>
                                <p class="font-medium">{{ $transaction->member->name }}</p>
                                <p class="text-sm text-muted">ID: #{{ $transaction->id }}</p>
                            </div>
                        </div>
                    </td>
                    <td><span class="status-badge status-processing">Prioritas</span></td>
                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                    <td class="font-medium">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                    <td><button class="action-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button></td>
                </tr>
                @endforeach

                @foreach($finishedTransactions as $transaction)
                <tr>
                    <td>
                        <div class="customer-cell">
                            <div class="customer-avatar">{{ substr($transaction->member->name, 0, 1) }}</div>
                            <div>
                                <p class="font-medium">{{ $transaction->member->name }}</p>
                                <p class="text-sm text-muted">ID: #{{ $transaction->id }}</p>
                            </div>
                        </div>
                    </td>
                    <td><span class="status-badge status-completed">Selesai</span></td>
                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                    <td class="font-medium">Rp {{ number_format($transaction->total, 0, ',', '.') }}</td>
                    <td><button class="action-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button></td>
                </tr>
                @endforeach

                @if(($ongoingTransactions->count() + $ongoingPriorityTransactions->count() + $finishedTransactions->count()) === 0)
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Tidak ada transaksi ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
