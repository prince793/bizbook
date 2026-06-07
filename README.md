# BizBook — Laravel Appointment Booking System

> A clean, production-ready appointment booking system built with Laravel 12. Perfect for salons, clinics, consultants, and any service-based business.

---

## 🚀 What You Get

- **Public-facing website** — Homepage, Services, About, and Contact pages
- **Online booking form** — Customers book appointments without creating an account
- **Admin dashboard** — Manage bookings, confirm or cancel appointments, manage services
- **Secure admin login** — Custom authentication, no bloat
- **Service management** — Add, edit, and toggle services on/off
- **Booking status system** — Pending, Confirmed, Cancelled
- **Demo data included** — Seeder with sample admin account and 3 services ready to go

---

## 🛠 Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP 8.2, Laravel 12 |
| Frontend | Blade Templates, HTML, CSS, JavaScript |
| Database | MySQL |
| Tools | Composer, NPM, Git |

---

## ⚡ Quick Start

```bash
# 1. Clone the repository
git clone https://github.com/prince793/bizbook.git
cd bizbook

# 2. Install dependencies
composer install
npm install && npm run build

# 3. Set up environment
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
DB_DATABASE=bizbook
DB_USERNAME=root
DB_PASSWORD=

# 5. Run migrations and seed demo data
php artisan migrate --seed

# 6. Start the server
php artisan serve
```

---

## 🔐 Admin Access

| Field | Value |
|-------|-------|
| URL | `/admin/login` |
| Email | `admin@bizbook.test` |
| Password | `password` |

> ⚠️ Change the admin credentials immediately after setup via your database or a seeder update.

---

## 📁 Project Structure

```
bizbook/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/AdminController.php   # Admin panel logic
│   │   ├── BookingController.php       # Booking form handling
│   │   └── PageController.php          # Public pages
│   └── Models/
│       ├── Booking.php
│       ├── Service.php
│       └── User.php
├── database/
│   ├── migrations/                     # 5 migration files
│   └── seeders/DatabaseSeeder.php      # Demo admin + 3 services
├── resources/views/                    # Blade templates
├── routes/web.php                      # All routes
└── .env.example                        # Environment template
```

---

## 🗄 Database Schema

**users** — Admin account (email + password auth)

**services** — name, description, duration, price, icon, is_active

**bookings** — client name, email, phone, service, date, time, message, status

---

## 🐳 Docker Support

Dockerfile and Nginx config included under `/deployment` for easy cloud deployment (tested with Render).

```bash
docker build -t bizbook .
docker run -p 8000:8000 bizbook
```

---

## ✅ Use Cases

- Salon or barbershop booking page
- Clinic or therapy appointment system
- Freelancer or consultant scheduling page
- Any service-based small business

---

## 🔧 Customization Tips

- Update business name and branding in `resources/views/layouts/`
- Add or edit services directly from the Admin panel
- Modify booking fields in `database/migrations/`
- Extend with email notifications using Laravel Mail

---

## 📄 License

This is a **starter kit / boilerplate** for personal and commercial projects. You may use and modify it freely. Redistribution or resale of the source code as-is is not permitted.

---

## 👤 Built by

**Prince Edrian Casem** — Full-Stack Web Developer  
[GitHub](https://github.com/prince793) · [Portfolio](https://prince793.github.io) · [LinkedIn](https://linkedin.com/in/casem-princeedrian-p-9408b3294)
