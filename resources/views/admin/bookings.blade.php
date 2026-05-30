<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Manage Bookings - BizBook</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1A56A0; --blue-light: #E8F0FA;
            --text: #1A1A2E; --text-muted: #6B7280;
            --bg: #F3F4F6; --card: #FFFFFF; --border: #E5E7EB;
        }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); display: flex; min-height: 100vh; }
        .sidebar {
            width: 240px; background: var(--blue); color: #fff;
            padding: 1.5rem 0; flex-shrink: 0;
            display: flex; flex-direction: column;
            position: fixed; height: 100vh;
        }
        .sidebar-logo { font-size: 1.2rem; font-weight: 600; padding: 0 1.5rem 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-logo span { font-size: 0.7rem; display: block; opacity: 0.7; font-weight: 400; }
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .sidebar-link {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.75rem 1.5rem; color: rgba(255,255,255,0.8);
            text-decoration: none; font-size: 0.9rem; transition: all 0.2s;
        }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.1); color: #fff; }
        .sidebar-bottom { padding: 1rem 1.5rem; border-top: 1px solid rgba(255,255,255,0.1); }
        .user-info { font-size: 0.8rem; opacity: 0.7; margin-bottom: 0.75rem; }
        .logout-btn {
            width: 100%; background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2); color: #fff;
            border-radius: 8px; padding: 0.5rem; font-size: 0.85rem;
            cursor: pointer; font-family: 'DM Sans', sans-serif; transition: background 0.2s;
        }
        .logout-btn:hover { background: rgba(255,255,255,0.2); }

        .main { margin-left: 240px; flex: 1; padding: 2rem; }
        .page-header { margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center; }
        .page-header h1 { font-size: 1.5rem; font-weight: 600; }
        .page-header p { color: var(--text-muted); font-size: 0.875rem; }

        .alert-success {
            background: #dcfce7; color: #16a34a;
            padding: 0.75rem 1rem; border-radius: 8px;
            margin-bottom: 1.5rem; font-size: 0.875rem;
        }

        .card { background: var(--card); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
        .card-header { padding: 1.25rem 1.5rem; border-bottom: 1px solid var(--border); }
        .card-header h2 { font-size: 1rem; font-weight: 600; }

        table { width: 100%; border-collapse: collapse; }
        th {
            background: var(--bg); padding: 0.75rem 1.5rem;
            text-align: left; font-size: 0.75rem;
            text-transform: uppercase; letter-spacing: 0.05em;
            color: var(--text-muted); font-weight: 500;
        }
        td { padding: 1rem 1.5rem; font-size: 0.875rem; border-top: 1px solid var(--border); vertical-align: middle; }

        .badge { padding: 0.25rem 0.65rem; border-radius: 100px; font-size: 0.75rem; font-weight: 500; }
        .badge-pending { background: #fef3c7; color: #d97706; }
        .badge-confirmed { background: #dcfce7; color: #16a34a; }
        .badge-cancelled { background: #fee2e2; color: #dc2626; }

        .action-form { display: inline; }
        .action-select {
            border: 1px solid var(--border); border-radius: 6px;
            padding: 0.3rem 0.6rem; font-size: 0.8rem;
            font-family: 'DM Sans', sans-serif; cursor: pointer;
            outline: none; background: #fff;
        }
        .btn-sm {
            padding: 0.3rem 0.75rem; border-radius: 6px;
            font-size: 0.8rem; cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            border: none; font-weight: 500;
        }
        .btn-update { background: var(--blue); color: #fff; }
        .btn-delete { background: #fee2e2; color: #dc2626; }
        .btn-update:hover { background: #3B7DD8; }
        .btn-delete:hover { background: #fecaca; }

        .empty-row { text-align: center; padding: 3rem; color: var(--text-muted); }

        .pagination { padding: 1rem 1.5rem; display: flex; gap: 0.5rem; }
        .pagination a, .pagination span {
            padding: 0.4rem 0.8rem; border-radius: 6px;
            font-size: 0.85rem; text-decoration: none;
            border: 1px solid var(--border); color: var(--text);
        }
        .pagination .active { background: var(--blue); color: #fff; border-color: var(--blue); }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-logo">BizBook <span>Admin Panel</span></div>
    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link"><span>📊</span> Dashboard</a>
        <a href="{{ route('admin.bookings') }}" class="sidebar-link active"><span>📅</span> Bookings</a>
        <a href="{{ route('admin.services') }}" class="sidebar-link"><span>🛠️</span> Services</a>
        <a href="{{ route('home') }}" class="sidebar-link"><span>🌐</span> View Website</a>
    </nav>
    <div class="sidebar-bottom">
        <div class="user-info">{{ Auth::user()->name }}</div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Sign Out</button>
        </form>
    </div>
</aside>

<main class="main">
    <div class="page-header">
        <div>
            <h1>Bookings</h1>
            <p>Manage all appointment bookings.</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert-success">✅ {{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>All Bookings ({{ $bookings->total() }})</h2>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Service</th>
                    <th>Date & Time</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>
                        <div style="font-weight:500;">{{ $booking->name }}</div>
                        <div style="font-size:0.8rem;color:var(--text-muted);">{{ $booking->email }}</div>
                    </td>
                    <td>{{ $booking->service?->name ?? 'N/A' }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}
                        <div style="font-size:0.8rem;color:var(--text-muted);">{{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}</div>
                    </td>
                    <td>{{ $booking->phone }}</td>
                    <td><span class="badge badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                    <td>
                        <form class="action-form" method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                            @csrf @method('PATCH')
                            <select class="action-select" name="status">
                                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="btn-sm btn-update">Update</button>
                        </form>
                        <form class="action-form" method="POST" action="{{ route('admin.bookings.destroy', $booking) }}"
                            onsubmit="return confirm('Delete this booking?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-sm btn-delete" style="margin-top:0.4rem;">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="empty-row">No bookings found.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="pagination">
            {{ $bookings->links() }}
        </div>
    </div>
</main>
</body>
</html>