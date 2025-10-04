# Koristimo PHP 8.2 FPM
FROM php:8.2-fpm

# Radni direktorijum u kontejneru
WORKDIR /var/www/html

# Sistem i PHP dependencies za Laravel + DomPDF + PHPWord + Breeze
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    curl \
    && docker-php-ext-install pdo_mysql mbstring zip xml \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instalacija Composer-a
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Kopiramo composer fajlove
COPY composer.json composer.lock ./

# Kopiramo celu aplikaciju
COPY . .

# Instalacija PHP zavisnosti
RUN composer install --no-dev --optimize-autoloader

# Laravel setup
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 9000

CMD ["php-fpm"]
