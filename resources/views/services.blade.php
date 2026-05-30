@extends('layout')

@section('title', 'Services - BizBook')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #1A56A0, #3B7DD8);
        color: #fff; padding: 4rem 0; text-align: center;
    }
    .page-header h1 { font-size: 2.5rem; font-weight: 600; margin-bottom: 0.5rem; }
    .page-header p { opacity: 0.85; }

    .services-section { padding: 4rem 0; }
    .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
    .service-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.75rem;
        transition: border-color 0.2s, transform 0.2s;
        display: flex; flex-direction: column;
    }
    .service-card:hover { border-color: var(--blue); transform: translateY(-3px); }
    .service-icon { font-size: 2.5rem; margin-bottom: 1rem; display: block; }
    .service-card h3 { font-size: 1.1rem; font-weight: 600; margin-bottom: 0.5rem; }
    .service-card p { font-size: 0.875rem; color: var(--text-muted); margin-bottom: 1.25rem; flex: 1; }
    .service-footer { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
    .service-duration { font-size: 0.8rem; color: var(--text-muted); }
    .service-price { font-size: 1rem; font-weight: 600; color: var(--blue); }

    @media(max-width:640px) { .services-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Our Services</h1>
        <p>Professional services tailored to your needs.</p>
    </div>
</div>

<section class="services-section">
    <div class="container">
        @if($services->count())
        <div class="services-grid">
            @foreach($services as $service)
            <div class="service-card">
                <span class="service-icon">{{ $service->icon }}</span>
                <h3>{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>
                <div class="service-footer">
                    <span class="service-duration">⏱ {{ $service->duration }}</span>
                    @if($service->price)
                    <span class="service-price">₱{{ number_format($service->price, 2) }}</span>
                    @endif
                </div>
                <a href="{{ route('booking.create') }}" class="btn btn-primary" style="text-align:center;">Book Now</a>
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center; padding:3rem; color:var(--text-muted);">
            <p style="font-size:2rem;">🛠️</p>
            <p>Services coming soon!</p>
        </div>
        @endif
    </div>
</section>
@endsection