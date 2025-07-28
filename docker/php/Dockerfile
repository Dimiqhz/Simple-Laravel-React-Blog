FROM php:8.2-fpm

WORKDIR /var/www/html

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
 && apt-get install -y \
      git zip unzip \
      libonig-dev libzip-dev libxml2-dev \
 && docker-php-ext-install \
      pdo_mysql mbstring zip bcmath \
 && rm -rf /var/lib/apt/lists/*

RUN test -f artisan \
    || composer create-project laravel/laravel . --no-interaction

COPY backend/ ./

RUN composer install --no-interaction --optimize-autoloader

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
