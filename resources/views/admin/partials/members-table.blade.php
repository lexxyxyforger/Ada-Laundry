<div class="table-card">
    <div class="table-header">
        <h2>Semua Member ({{ $members->count() }})</h2>
    </div>
    <div class="table-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama Member</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Bergabung</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                <tr>
                    <td>
                        <div class="customer-cell">
                            <div class="customer-avatar">{{ substr($member->name, 0, 1) }}</div>
                            <div>
                                <p class="font-medium">{{ $member->name }}</p>
                                <p class="text-sm text-muted">ID: #{{ $member->id }}</p>
                            </div>
                        </div>
                    </td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->phone_number ?? '-' }}</td>
                    <td>{{ $member->created_at->format('d M Y') }}</td>
                    <td><button class="action-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <circle cx="12" cy="5" r="2"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                            <circle cx="12" cy="19" r="2"></circle>
                        </svg>
                    </button></td>
                </tr>
                @endforeach

                @if($members->count() === 0)
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Tidak ada member ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
