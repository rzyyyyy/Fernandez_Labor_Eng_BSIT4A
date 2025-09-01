# Laravel Starter Kit — LASTNAME1_LASTNAME2_LASTNAME3_BSIT4A

## Members
- John Henly Montera
- Member 2
- Member 3

## Project Description
A reusable Laravel starter kit featuring:
- Auth (login/register/logout via Breeze)
- Role management (Spatie)
- Admin panel with dashboard metrics
- User management (view/edit/delete/change password)
- Two sample models (Category, Product) with full CRUD for Product
- Blade layouts (header, footer, sidebar)
- Validation & error messages (Form Requests)
- DataTables (search + pagination)
- SweetAlert2 (confirm on delete)
- Clean folder structure and .env.example

## Requirements
- PHP 8.2+, Composer, Node.js
- MySQL (XAMPP)
- VS Code

## Setup
```bash
cp .env.example .env
# set DB settings in .env
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve