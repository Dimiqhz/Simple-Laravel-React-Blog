FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip curl git libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

RUN test -f artisan || composer create-project laravel/laravel .

COPY ./backend/app ./app
COPY ./backend/routes ./routes
COPY ./backend/database ./database
COPY ./backend/tests ./tests
COPY ./backend/resources ./resources
COPY ./backend/public ./public

RUN composer install --no-interaction

CMD php artisan serve --host=0.0.0.0 --port=8000
