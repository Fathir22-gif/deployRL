FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip zip curl \
    libzip-dev libpng-dev libonig-dev \
    libxml2-dev libicu-dev libsqlite3-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install intl pdo pdo_sqlite mbstring bcmath exif zip

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts

COPY package.json package-lock.json* ./
RUN npm install

COPY . .

# Jalankan scripts composer setelah artisan tersedia
RUN composer run-script post-autoload-dump

RUN npm run build

EXPOSE 8080
CMD ["sh", "-c", "mkdir -p /app/database && touch /app/database/database.sqlite && php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]