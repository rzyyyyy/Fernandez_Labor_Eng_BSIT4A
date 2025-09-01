

## Group Members
- Arzay D. Fernandez
- Kim C. Labor
- Marc Russel R. Eng

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
