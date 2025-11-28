# QA Dashboard (skeleton, no vendor)

This archive contains a Laravel application skeleton with QA Dashboard controllers, models, migrations, Playwright integration, and sample front-end build artifacts (public/dist) along with a small placeholder node_modules folder.

IMPORTANT: This package DOES NOT include `vendor/` (composer dependencies). Use the included GitHub Actions workflow to generate `vendor.zip` as an artifact or run `composer install` on a machine with internet access.

Quick start after extracting:

1. cd laravel_app (if you used setup.sh) or root if extracted here
2. cp .env.example .env
3. Edit DB credentials in .env
4. Obtain vendor.zip from your GitHub Actions artifact or run `composer install` locally
5. unzip vendor.zip into project root so vendor/ exists
6. php artisan key:generate
7. php artisan migrate --seed
8. npm install (optional)
9. npm run build (optional)
10. php artisan serve --host=0.0.0.0 --port=8000

Playwright integration: use the scripts in playwright-integration/tools to parse cucumber JSON and POST results to the API.
