<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Manage Services - BizBook</title>
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
            cursor: pointer; font-family: 'DM Sans', sans-serif;
        }
        .logout-btn:hover { background: rgba(255,255,255,0.2); }

        .main { margin-left: 240px; flex: 1; padding: 2rem; }
        .page-header { margin-bottom: 2rem; }
        .page-header h1 { font-size: 1.5rem; font-weight: 600; }
        .page-header p { color: var(--text-muted); font-size: 0.875rem; }

        .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
        .service-card {
            background: var(--card); border: 1px solid var(--border);
            border-radius: 12px; padding: 1.5rem;
        }
        .service-icon { font-size: 2rem; margin-bottom: 0.75rem; display: block; }
        .service-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.4rem; }
        .service-card p { font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.75rem; }
        .service-meta { display: flex; justify-content: space-between; align-items: center; font-size: 0.8rem; }
        .service-price { color: var(--blue); font-weight: 600; }
        .service-duration { color: var(--text-muted); }
        .badge { padding: 0.2rem 0.6rem; border-radius: 100px; font-size: 0.75rem; font-weight: 500; }
        .badge-active { background: #dcfce7; color: #16a34a; }
        .badge-inactive { background: #fee2e2; color: #dc2626; }

        .note-card {
            background: var(--blue-light); border: 1px solid #BFDBFE;
            border-radius: 12px; padding: 1.25rem;
            margin-bottom: 1.5rem; font-size: 0.875rem; color: var(--blue);
        }

        @media(max-width:900px) { .services-grid { grid-template-columns: repeat(2,1fr); } }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-logo">BizBook <span>Admin Panel</span></div>
    <nav class="sidebar-nav">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link"><span>📊</span> Dashboard</a>
        <a href="{{ route('admin.bookings') }}" class="sidebar-link"><span>📅</span> Bookings</a>
        <a href="{{ route('admin.services') }}" class="sidebar-link active"><span>🛠️</span> Services</a>
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
        <h1>Services</h1>
        <p>View all services available for booking.</p>
    </div>

    <div class="note-card">
        💡 Services are managed via the database seeder. To add or edit services, update the <strong>ServiceSeeder.php</strong> file and run <code>php artisan db:seed --class=ServiceSeeder</code>.
    </div>

    <div class="services-grid">
        @foreach($services as $service)
        <div class="service-card">
            <span class="service-icon">{{ $service->icon }}</span>
            <h3>{{ $service->name }}</h3>
            <p>{{ $service->description }}</p>
            <div class="service-meta">
                <span class="service-duration">⏱ {{ $service->duration }}</span>
                @if($service->price)
                <span class="service-price">₱{{ number_format($service->price, 2) }}</span>
                @endif
            </div>
            <div style="margin-top:0.75rem;">
                <span class="badge {{ $service->is_active ? 'badge-active' : 'badge-inactive' }}">
                    {{ $service->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
</main>
</body>
</html>