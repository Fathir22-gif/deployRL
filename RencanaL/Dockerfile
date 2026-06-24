# syntax=docker/dockerfile:1

FROM php:8.3-cli-bullseye AS build

# Install system dependencies for PHP, Composer, and Node asset build
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    zip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    curl \
    nodejs \
    npm \
  && docker-php-ext-install \
    intl \
    pdo_mysql \
    mbstring \
    exif \
    bcmath \
    zip \
  && rm -rf /var/lib/apt/lists/*

WORKDIR /app

# Install Composer
RUN curl -sS https://getcomposer.org/download/latest-stable/composer.phar -o /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer

# Copy composer files first for dependency caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --no-scripts

# Copy Node files and install frontend dependencies
COPY package.json package-lock.json* ./
RUN npm install --legacy-peer-deps

# Copy the rest of the application and build assets
COPY . ./
RUN npm run build
RUN php artisan key:generate

# Prepare the production image
FROM php:8.3-apache AS runtime

RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
  && docker-php-ext-install \
    intl \
    pdo_mysql \
    mbstring \
    exif \
    bcmath \
    zip \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=build /app /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
