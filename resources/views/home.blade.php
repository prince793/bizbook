@extends('layout')

@section('title', 'BizBook - Professional Business Services')

@section('styles')
<style>
    .hero {
        background: linear-gradient(135deg, #1A56A0 0%, #3B7DD8 100%);
        color: #fff;
        padding: 7rem 0 5rem;
        text-align: center;
    }
    .hero-tag {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        padding: 0.3rem 1rem;
        border-radius: 100px;
        font-size: 0.8rem;
        margin-bottom: 1.5rem;
        letter-spacing: 0.05em;
    }
    .hero h1 { font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 600; margin-bottom: 1rem; line-height: 1.2; }
    .hero p { font-size: 1.1rem; opacity: 0.85; max-width: 520px; margin: 0 auto 2.5rem; }
    .hero-btns { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
    .btn-white { background: #fff; color: var(--blue); }
    .btn-white:hover { background: #f0f4ff; }
    .btn-ghost { border: 1.5px solid rgba(255,255,255,0.5); color: #fff; }
    .btn-ghost:hover { background: rgba(255,255,255,0.1); }

    .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
    .service-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.75rem;
        transition: border-color 0.2s, transform 0.2s;
    }
    .service-card:hover { border-color: var(--blue); transform: translateY(-3px); }
    .service-icon { font-size: 2rem; margin-bottom: 1rem; display: block; }
    .service-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; }
    .service-card p { font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1rem; }
    .service-meta { font-size: 0.8rem; color: var(--blue); font-weight: 500; }

    .stats-row {
        background: var(--blue);
        color: #fff;
        padding: 3rem 0;
    }
    .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 2rem; text-align: center; }
    .stat-num { font-size: 2.5rem; font-weight: 600; display: block; }
    .stat-label { font-size: 0.875rem; opacity: 0.8; }

    .steps-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
    .step-card { text-align: center; padding: 1.5rem; }
    .step-num {
        width: 48px; height: 48px;
        background: var(--blue-light);
        color: var(--blue);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-weight: 600; font-size: 1.1rem;
        margin: 0 auto 1rem;
    }
    .step-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; }
    .step-card p { font-size: 0.875rem; color: var(--text-muted); }

    .cta-section {
        background: linear-gradient(135deg, #1A56A0, #3B7DD8);
        color: #fff;
        text-align: center;
        padding: 5rem 0;
    }
    .cta-section h2 { font-size: 2rem; font-weight: 600; margin-bottom: 1rem; }
    .cta-section p { opacity: 0.85; margin-bottom: 2rem; }

    @media(max-width:640px) {
        .services-grid, .steps-grid { grid-template-columns: 1fr; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
    }
</style>
@endsection

@section('content')

<!-- HERO -->
<div class="hero">
    <div class="container">
        <div class="hero-tag">✨ Professional Services, Easy Booking</div>
        <h1>Book the Right Service,<br/>At the Right Time</h1>
        <p>Connect with professional services instantly. Simple, fast, and reliable booking — all in one place.</p>
        <div class="hero-btns">
            <a href="{{ route('booking.create') }}" class="btn btn-white">Book Appointment</a>
            <a href="{{ route('services') }}" class="btn btn-ghost">View Services</a>
        </div>
    </div>
</div>

<!-- SERVICES -->
<section class="section">
    <div class="container">
        <div class="section-label">What We Offer</div>
        <h2 class="section-title">Our Services</h2>
        <p class="section-sub">Choose from our range of professional services tailored to meet your needs.</p>

        @if($services->count())
        <div class="services-grid">
            @foreach($services as $service)
            <div class="service-card">
                <span class="service-icon">{{ $service->icon }}</span>
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>
                <div class="service-meta">
                    ⏱ {{ $service->duration }}
                    @if($service->price)
                     · ₱{{ number_format($service->price, 2) }}
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:3rem; color:var(--text-muted);">
            <p style="font-size:2rem;">🛠️</p>
            <p>Services coming soon. Check back later!</p>
        </div>
        @endif

        <div style="text-align:center; margin-top:2.5rem;">
            <a href="{{ route('services') }}" class="btn btn-outline">View All Services</a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-row">
    <div class="container">
        <div class="stats-grid">
            <div><span class="stat-num">500+</span><span class="stat-label">Happy Clients</span></div>
            <div><span class="stat-num">20+</span><span class="stat-label">Services Offered</span></div>
            <div><span class="stat-num">5★</span><span class="stat-label">Average Rating</span></div>
            <div><span class="stat-num">3yrs</span><span class="stat-label">In Business</span></div>
        </div>
    </div>
</div>

<!-- HOW IT WORKS -->
<section class="section">
    <div class="container">
        <div class="section-label">Simple Process</div>
        <h2 class="section-title">How It Works</h2>
        <p class="section-sub">Book your appointment in just 3 easy steps.</p>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-num">1</div>
                <h3>Choose a Service</h3>
                <p>Browse our list of professional services and pick the one that fits your needs.</p>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <h3>Pick a Date & Time</h3>
                <p>Select your preferred schedule from our available slots.</p>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <h3>Get Confirmed</h3>
                <p>Submit your booking and receive a confirmation from our team.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<div class="cta-section">
    <div class="container">
        <h2>Ready to Get Started?</h2>
        <p>Book your appointment today and experience professional service.</p>
        <a href="{{ route('booking.create') }}" class="btn btn-white">Book Now</a>
    </div>
</div>

@endsection