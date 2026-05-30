@extends('layout')

@section('title', 'About - BizBook')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #1A56A0, #3B7DD8);
        color: #fff; padding: 4rem 0; text-align: center;
    }
    .page-header h1 { font-size: 2.5rem; font-weight: 600; margin-bottom: 0.5rem; }
    .page-header p { opacity: 0.85; }

    .about-section { padding: 4rem 0; }
    .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; margin-bottom: 4rem; }
    .about-image {
        background: linear-gradient(135deg, #E8F0FA, #DBEAFE);
        border-radius: 16px;
        height: 350px;
        display: flex; align-items: center; justify-content: center;
        font-size: 6rem;
    }
    .about-text .section-label { margin-bottom: 0.5rem; }
    .about-text h2 { font-size: 1.8rem; font-weight: 600; margin-bottom: 1rem; }
    .about-text p { color: var(--text-muted); margin-bottom: 1rem; line-height: 1.7; font-size: 0.95rem; }

    .values-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 3rem; }
    .value-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
    }
    .value-icon { font-size: 2rem; display: block; margin-bottom: 0.75rem; }
    .value-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.5rem; }
    .value-card p { font-size: 0.85rem; color: var(--text-muted); }

    .team-section { background: #F0F4FF; padding: 4rem 0; }
    .team-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 2rem; }
    .team-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
    }
    .team-avatar {
        width: 70px; height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #1A56A0, #3B7DD8);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 1rem;
    }
    .team-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.25rem; }
    .team-card span { font-size: 0.8rem; color: var(--blue); }

    @media(max-width:640px) {
        .about-grid, .values-grid, .team-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1>About BizBook</h1>
        <p>Professional services made simple and accessible for everyone.</p>
    </div>
</div>

<section class="about-section">
    <div class="container">
        <div class="about-grid">
            <div class="about-image">🏢</div>
            <div class="about-text">
                <div class="section-label">Who We Are</div>
                <h2>Professional Services, Built Around You</h2>
                <p>BizBook is a business services platform designed to make booking professional services as simple and efficient as possible. We believe everyone deserves access to quality services without the hassle.</p>
                <p>Founded with a passion for technology and customer service, we connect clients with skilled professionals across a wide range of industries — from web development to digital marketing, IT support, and more.</p>
                <a href="{{ route('booking.create') }}" class="btn btn-primary">Book an Appointment</a>
            </div>
        </div>

        <div class="section-label">Our Values</div>
        <h2 class="section-title">What We Stand For</h2>
        <div class="values-grid">
            <div class="value-card">
                <span class="value-icon">🎯</span>
                <h3>Excellence</h3>
                <p>We deliver the highest quality in every service we provide, no exceptions.</p>
            </div>
            <div class="value-card">
                <span class="value-icon">🤝</span>
                <h3>Trust</h3>
                <p>We build lasting relationships through transparency and honest communication.</p>
            </div>
            <div class="value-card">
                <span class="value-icon">⚡</span>
                <h3>Efficiency</h3>
                <p>Your time is valuable. We make every interaction fast and frictionless.</p>
            </div>
            <div class="value-card">
                <span class="value-icon">💡</span>
                <h3>Innovation</h3>
                <p>We continuously improve our services using the latest technology.</p>
            </div>
            <div class="value-card">
                <span class="value-icon">🌍</span>
                <h3>Accessibility</h3>
                <p>Quality services should be available to everyone, anywhere.</p>
            </div>
            <div class="value-card">
                <span class="value-icon">❤️</span>
                <h3>Care</h3>
                <p>We genuinely care about our clients and their success.</p>
            </div>
        </div>
    </div>
</section>

<section class="team-section">
    <div class="container">
        <div class="section-label">Our Team</div>
        <h2 class="section-title">The People Behind BizBook</h2>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar">👨‍💼</div>
                <h3>Juan Dela Cruz</h3>
                <span>Founder & CEO</span>
            </div>
            <div class="team-card">
                <div class="team-avatar">👩‍💻</div>
                <h3>Maria Santos</h3>
                <span>Lead Developer</span>
            </div>
            <div class="team-card">
                <div class="team-avatar">👨‍🎨</div>
                <h3>Carlo Reyes</h3>
                <span>Creative Director</span>
            </div>
        </div>
    </div>
</section>
@endsection