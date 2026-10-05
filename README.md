# 🌅 Sunrise English Medium School & Junior College

[![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white)](https://mariadb.org)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

A modern, responsive, and enterprise-grade school web portal & management system designed for **Sunrise English Medium School & Junior College (Sunrise Gurukul)**. Built with Laravel 11, Tailwind CSS, and MariaDB.

---

## 🚀 Key Features

- **🎓 Admissions & Campus Visit Appointments:**
  - Online admission inquiry and appointment booking system.
  - Automatic email notifications dispatch to school administration.
  - Real-time appointment management (Confirm, Reschedule, Complete) in Admin Dashboard.

- **🏛️ Unified Leadership & About Showcase:**
  - Prestigious showcase for Founder & Chairman, Hon. Secretary, and Academic Leadership.
  - Dynamic profile management via Admin Panel.

- **📋 CBSE Mandatory Public Disclosure:**
  - Dedicated disclosure portal compliant with CBSE affiliation standards.
  - Direct access to Society/Trust certificates, RTE compliance, building safety docs, and academic affiliations.

- **🎬 In-Page Cinema Video Player & Photo Gallery:**
  - Modern media gallery supporting event photos and in-page cinema video playback (without intrusive external redirections or ads).

- **📢 Dynamic Notice Circulars & Academic Updates:**
  - Non-technical staff can publish exam schedules, circulars, and holiday notices in under 60 seconds with PDF attachments.

- **🔐 Zero-Code Admin Control Desk:**
  - Secure admin authentication (`/dashboard`) with role-based access.
  - Full management of Hero Sliders, Leadership profiles, Gallery items, Notices, and Parent Contact inquiries.

---

## 🛠️ Tech Stack & Architecture

- **Backend:** Laravel 11.x (PHP 8.2+)
- **Frontend:** Blade Templating, Tailwind CSS, Vite, OwlCarousel, Animate.css
- **Database:** MariaDB / MySQL
- **Web Server:** Apache2 / Nginx (configured with URL rewrites and reverse proxy support)
- **Email Service:** SMTP with customizable HTML mail templates

---

## 📂 Project Structure

```text
├── README.md
└── sunrise-2/
    ├── build/               # Compiled production assets (CSS & JS)
    ├── documents/           # CBSE compliance and affiliation documents
    ├── images/              # Media assets, sliders, and leadership photography
    ├── index.php            # Web entry point
    ├── kider/               # Legacy theme assets and styling
    └── sunrise-2-app/       # Full Laravel 11 application
        ├── app/             # Controllers, Models, Mail, Policies
        ├── config/          # Application configurations
        ├── database/        # Migrations, seeders, and factories
        ├── resources/views/ # Public and Admin Blade templates
        ├── routes/          # Web, Auth, and Console routing
        └── storage/         # Application uploads and framework cache
```

---

## ⚙️ Quick Start & Local Setup

### 1. Prerequisites
- PHP >= 8.2 with `php-mysql`, `php-xml`, `php-curl`, `php-mbstring`
- Composer 2.x
- Node.js >= 18.x & NPM
- MariaDB / MySQL Server
- Apache2 or Nginx

### 2. Installation
```bash
# Clone the repository
git clone https://github.com/vijays3442-ctrl/sunrise-school.git
cd sunrise-school/sunrise-2/sunrise-2-app

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 3. Database & Migrations
```bash
# Configure DB credentials in .env:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=sunrise_db
# DB_USERNAME=root
# DB_PASSWORD=your_password

# Run database migrations
php artisan migrate
```

### 4. Build Frontend Assets
```bash
npm install
npm run build
```

### 5. Run the Application
```bash
# Start local PHP development server
php artisan serve
```
Visit `http://localhost:8000` in your browser.

---

## 🛡️ Security & Quality
- Protected against SQL Injection and CSRF attacks by Laravel Eloquent & CSRF tokens.
- Role-gated dashboard routes with authentication middleware.
- Sanitized file uploads for PDF documents and images.

---

## 📄 License
This project is open-source under the [MIT License](LICENSE).
