@extends('layout')

@section('title', 'Booking Confirmed - BizBook')

@section('styles')
<style>
    .success-section {
        padding: 6rem 0;
        text-align: center;
    }
    .success-icon {
        width: 80px; height: 80px;
        background: #dcfce7;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 2.5rem;
        margin: 0 auto 1.5rem;
    }
    .success-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 3rem 2rem;
        max-width: 520px;
        margin: 0 auto;
    }
    .success-card h1 { font-size: 1.8rem; font-weight: 600; margin-bottom: 0.75rem; }
    .success-card p { color: var(--text-muted); margin-bottom: 2rem; line-height: 1.6; }
    .success-btns { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
</style>
@endsection

@section('content')
<section class="success-section">
    <div class="container">
        <div class="success-card">
            <div class="success-icon">✅</div>
            <h1>Booking Confirmed!</h1>
            <p>Thank you for booking with BizBook. We have received your appointment request and will send a confirmation to your email within 24 hours.</p>
            <div class="success-btns">
                <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
                <a href="{{ route('booking.create') }}" class="btn btn-outline">Book Another</a>
            </div>
        </div>
    </div>
</section>
@endsection