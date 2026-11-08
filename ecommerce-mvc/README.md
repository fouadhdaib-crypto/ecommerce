# E-Commerce MVC (PHP OOP + PDO + MySQL)

This is an MVC **starter scaffold**, not a finished e-commerce application.

## MVC responsibilities

- `app/Models/`: database access and data-related operations using PDO.
- `app/Views/`: customer, auth and admin templates (HTML and Bootstrap).
- `app/Controllers/`: receive requests, call Models, choose Views or redirects.
- `app/Core/`: shared database connection and simple routing.
- `public/`: web entry point, assets and uploaded images.
- `database/ecommerce.sql`: relational MySQL schema.

## Running

1. Import `database/ecommerce.sql` in MySQL.
2. Set environment variables: `DB_HOST`, `DB_NAME`, `DB_USER`, `DB_PASS`.
3. From this folder run: `php -S localhost:8000 -t public public/router.php`.
4. Browse `http://localhost:8000/`.

The home route demonstrates Controller → Model → View. Other pages and methods are placeholders to complete.

Before production, implement role checks, login/register, CSRF tokens, safe upload validation, and database transactions for orders/stock.
