# Vireo — Laravel Edition

Vireo admin dashboard template built on **Laravel + Blade** with **Alpine.js**, bundled and served through **Vite**.

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+

## Getting started

1. **Install dependencies**

   ```bash
   composer install && npm install
   ```

2. **Set up the environment**

   ```bash
   cp .env.example .env && php artisan key:generate
   ```

3. **Run in development**

   ```bash
   npm run dev
   ```

   In another terminal, start the PHP server:

   ```bash
   php artisan serve
   ```

   Then open the URL printed by `php artisan serve` (default: http://127.0.0.1:8000).

## Production build

Compile and version the front-end assets:

```bash
npm run build
```

## Run / serve

```bash
php artisan serve
```

## Documentation

Full documentation is available at [../../Documentation/index.html](../../Documentation/index.html).
