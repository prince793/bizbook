@extends('layout')

@section('title', 'Book an Appointment - BizBook')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #1A56A0, #3B7DD8);
        color: #fff;
        padding: 4rem 0;
        text-align: center;
    }
    .page-header h1 { font-size: 2.5rem; font-weight: 600; margin-bottom: 0.5rem; }
    .page-header p { opacity: 0.85; }

    .booking-section { padding: 4rem 0; }
    .booking-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; }

    .form-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 2rem;
    }
    .form-card h2 { font-size: 1.2rem; font-weight: 600; margin-bottom: 1.5rem; }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .form-group { margin-bottom: 1.25rem; }
    .form-group label { display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.4rem; }
    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 0.7rem 1rem;
        font-size: 0.9rem;
        font-family: 'DM Sans', sans-serif;
        outline: none;
        transition: border-color 0.2s;
        background: var(--bg);
    }
    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus { border-color: var(--blue); background: #fff; }
    .form-group textarea { resize: vertical; min-height: 100px; }
    .error { color: #dc2626; font-size: 0.8rem; margin-top: 0.3rem; }

    .info-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.5rem;
        height: fit-content;
    }
    .info-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 1rem; }
    .info-item { display: flex; gap: 0.75rem; margin-bottom: 1rem; align-items: flex-start; }
    .info-icon { font-size: 1.2rem; flex-shrink: 0; }
    .info-text p { font-size: 0.875rem; font-weight: 500; }
    .info-text span { font-size: 0.8rem; color: var(--text-muted); }

    .submit-btn {
        width: 100%;
        background: var(--blue);
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 0.875rem;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        transition: background 0.2s;
        margin-top: 0.5rem;
    }
    .submit-btn:hover { background: var(--blue-mid); }

    @media(max-width:640px) {
        .booking-grid, .form-row { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')

<div class="page-header">
    <div class="container">
        <h1>Book an Appointment</h1>
        <p>Fill in the form below and we'll confirm your booking shortly.</p>
    </div>
</div>

<section class="booking-section">
    <div class="container">
        <div class="booking-grid">
            <div class="form-card">
                <h2>Your Details</h2>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Juan Dela Cruz"/>
                            @error('name')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Email Address *</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="juan@email.com"/>
                            @error('email')<div class="error">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Phone Number *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+63 912 345 6789"/>
                            @error('phone')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Select Service *</label>
                            <select name="service_id">
                                <option value="">-- Choose a service --</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                    {{ $service->icon }} {{ $service->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('service_id')<div class="error">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Preferred Date *</label>
                            <input type="date" name="date" value="{{ old('date') }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}"/>
                            @error('date')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Preferred Time *</label>
                            <select name="time">
                                <option value="">-- Choose a time --</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                            </select>
                            @error('time')<div class="error">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Additional Message</label>
                        <textarea name="message" placeholder="Tell us more about what you need...">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="submit-btn">Confirm Booking →</button>
                </form>
            </div>

            <div>
                <div class="info-card">
                    <h3>📋 Booking Info</h3>
                    <div class="info-item">
                        <span class="info-icon">✅</span>
                        <div class="info-text">
                            <p>Free Confirmation</p>
                            <span>We'll confirm your booking via email within 24 hours.</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">🔄</span>
                        <div class="info-text">
                            <p>Easy Rescheduling</p>
                            <span>Need to change? Contact us at least 24 hours before.</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">📞</span>
                        <div class="info-text">
                            <p>Need Help?</p>
                            <span>Call us at +63 912 345 6789</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <span class="info-icon">⏰</span>
                        <div class="info-text">
                            <p>Office Hours</p>
                            <span>Mon–Fri: 8AM–5PM<br/>Sat: 8AM–12PM</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection