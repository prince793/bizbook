<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'BizBook')</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --blue: #1A56A0;
            --blue-light: #E8F0FA;
            --blue-mid: #3B7DD8;
            --text: #1A1A2E;
            --text-muted: #6B7280;
            --bg: #FAFAFA;
            --card: #FFFFFF;
            --border: #E5E7EB;
        }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text); }

        /* NAV */
        nav {
            position: sticky; top: 0;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid var(--border);
            padding: 1rem 2rem;
            display: flex; justify-content: space-between; align-items: center;
            z-index: 100;
        }
        .nav-logo { font-size: 1.3rem; font-weight: 600; color: var(--blue); text-decoration: none; }
        .nav-links { display: flex; gap: 2rem; list-style: none; align-items: center; }
        .nav-links a { text-decoration: none; color: var(--text-muted); font-size: 0.9rem; transition: color 0.2s; }
        .nav-links a:hover { color: var(--blue); }
        .nav-btn {
            background: var(--blue); color: #fff !important;
            padding: 0.5rem 1.2rem; border-radius: 8px; font-size: 0.875rem !important;
            transition: background 0.2s !important;
        }
        .nav-btn:hover { background: var(--blue-mid) !important; color: #fff !important; }

        /* FOOTER */
        footer {
            background: var(--text);
            color: rgba(255,255,255,0.7);
            padding: 3rem 2rem 1.5rem;
            margin-top: 5rem;
        }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 2rem; max-width: 1100px; margin: 0 auto 2rem; }
        .footer-logo { font-size: 1.2rem; font-weight: 600; color: #fff; margin-bottom: 0.75rem; }
        .footer-desc { font-size: 0.875rem; line-height: 1.6; }
        .footer-heading { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.08em; color: #fff; margin-bottom: 1rem; }
        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; }
        .footer-links a { color: rgba(255,255,255,0.7); text-decoration: none; font-size: 0.875rem; transition: color 0.2s; }
        .footer-links a:hover { color: #fff; }
        .footer-bottom { text-align: center; font-size: 0.8rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; max-width: 1100px; margin: 0 auto; }

        /* UTILITIES */
        .container { max-width: 1100px; margin: 0 auto; padding: 0 2rem; }
        .btn {
            display: inline-block; padding: 0.75rem 1.75rem;
            border-radius: 8px; font-size: 0.9rem; font-weight: 500;
            cursor: pointer; text-decoration: none;
            transition: all 0.2s; border: 1.5px solid transparent;
            font-family: 'DM Sans', sans-serif;
        }
        .btn-primary { background: var(--blue); color: #fff; }
        .btn-primary:hover { background: var(--blue-mid); }
        .btn-outline { border-color: var(--border); color: var(--text); }
        .btn-outline:hover { border-color: var(--blue); color: var(--blue); }
        .section { padding: 5rem 0; }
        .section-label { font-size: 0.75rem; color: var(--blue); letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 0.5rem; }
        .section-title { font-size: 2rem; font-weight: 600; margin-bottom: 1rem; }
        .section-sub { color: var(--text-muted); max-width: 520px; margin-bottom: 3rem; }

        @media(max-width:640px) {
            .footer-grid { grid-template-columns: 1fr; }
            nav { padding: 1rem; }
            .nav-links { gap: 1rem; }
        }
    </style>
    @yield('styles')
</head>
<body>

<nav>
    <a href="{{ route('home') }}" class="nav-logo">Biz<span style="color:#3B7DD8">Book</span></a>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('services') }}">Services</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
        <li><a href="{{ route('booking.create') }}" class="nav-btn">Book Now</a></li>
    </ul>
</nav>

@yield('content')

<footer>
    <div class="footer-grid">
        <div>
            <div class="footer-logo">BizBook</div>
            <p class="footer-desc">Professional business services with easy online booking. We make it simple to connect with the right service at the right time.</p>
        </div>
        <div>
            <div class="footer-heading">Navigation</div>
            <ul class="footer-links">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div>
        <div>
            <div class="footer-heading">Contact</div>
            <ul class="footer-links">
                <li><a href="#">info@bizbook.com</a></li>
                <li><a href="#">+63 912 345 6789</a></li>
                <li><a href="#">Pangasinan, Philippines</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 BizBook. Built with Laravel by Prince Edrian Casem.</p>
    </div>
</footer>

</body>
</html>