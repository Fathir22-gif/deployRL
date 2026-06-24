# syntax=docker/dockerfile:1

FROM php:8.3-cli-bullseye AS build

# PHP dependencies
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libsqlite3-dev \
    curl \
 && docker-php-ext-install \
    intl \
    pdo_sqlite \
    mbstring \
    exif \
    bcmath \
    zip

# Install Node.js 20 (required for Vite 7/8)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
 && apt-get install -y nodejs

WORKDIR /app

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Composer dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --no-scripts

# Node dependencies
COPY package.json package-lock.json* ./
RUN npm install

# Application files
COPY . .

# Build Vite assets
RUN npm run build

FROM php:8.3-apache AS runtime

RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libsqlite3-dev \
 && docker-php-ext-install \
    intl \
    pdo_sqlite \
    mbstring \
    exif \
    bcmath \
    zip \
 && a2enmod rewrite

WORKDIR /var/www/html

COPY --from=build /app /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]