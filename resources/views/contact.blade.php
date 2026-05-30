@extends('layout')

@section('title', 'Contact - BizBook')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, #1A56A0, #3B7DD8);
        color: #fff; padding: 4rem 0; text-align: center;
    }
    .page-header h1 { font-size: 2.5rem; font-weight: 600; margin-bottom: 0.5rem; }
    .page-header p { opacity: 0.85; }

    .contact-section { padding: 4rem 0; }
    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }

    .contact-info h2 { font-size: 1.5rem; font-weight: 600; margin-bottom: 0.75rem; }
    .contact-info p { color: var(--text-muted); margin-bottom: 2rem; font-size: 0.95rem; line-height: 1.7; }

    .contact-item {
        display: flex; gap: 1rem; align-items: flex-start;
        margin-bottom: 1.5rem;
    }
    .contact-icon {
        width: 44px; height: 44px;
        background: var(--blue-light);
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.2rem; flex-shrink: 0;
    }
    .contact-item h3 { font-size: 0.9rem; font-weight: 600; margin-bottom: 0.2rem; }
    .contact-item p { font-size: 0.85rem; color: var(--text-muted); margin: 0; }

    .form-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 2rem;
    }
    .form-card h2 { font-size: 1.2rem; font-weight: 600; margin-bottom: 1.5rem; }
    .form-group { margin-bottom: 1.25rem; }
    .form-group label { display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.4rem; }
    .form-group input,
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
    .form-group textarea:focus { border-color: var(--blue); background: #fff; }
    .form-group textarea { resize: vertical; min-height: 120px; }
    .submit-btn {
        width: 100%;
        background: var(--blue); color: #fff;
        border: none; border-radius: 8px;
        padding: 0.875rem; font-size: 1rem;
        font-weight: 500; cursor: pointer;
        font-family: 'DM Sans', sans-serif;
        transition: background 0.2s;
    }
    .submit-btn:hover { background: var(--blue-mid); }

    @media(max-width:640px) { .contact-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you. Send us a message!</p>
    </div>
</div>

<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-info">
                <h2>Get In Touch</h2>
                <p>Have a question or want to learn more about our services? Reach out and we'll get back to you as soon as possible.</p>

                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div>
                        <h3>Address</h3>
                        <p>Pangasinan, Philippines</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📞</div>
                    <div>
                        <h3>Phone</h3>
                        <p>+63 912 345 6789</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">✉️</div>
                    <div>
                        <h3>Email</h3>
                        <p>info@bizbook.com</p>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">⏰</div>
                    <div>
                        <h3>Office Hours</h3>
                        <p>Mon–Fri: 8:00 AM – 5:00 PM<br/>Saturday: 8:00 AM – 12:00 PM</p>
                    </div>
                </div>
            </div>

            <div class="form-card">
                <h2>Send a Message</h2>
                <form>
                    @csrf
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="Juan Dela Cruz"/>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="juan@email.com"/>
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" placeholder="How can we help?"/>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea placeholder="Write your message here..."></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Send Message →</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection