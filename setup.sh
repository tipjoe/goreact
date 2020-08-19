!# /bin/bash

composer install
npm install
cp .env.example .env
php artisan storage:link
php artisan key:generate
cd public
php -S localhost:8000
