FROM php:8.3-cli

RUN apt-get update && apt-get install -y 
git 
unzip 
zip 
curl 
libzip-dev 
libpng-dev 
libonig-dev 
libxml2-dev 
libicu-dev 
libsqlite3-dev

RUN docker-php-ext-install 
intl 
pdo_sqlite 
mbstring 
bcmath 
exif 
zip

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - 
&& apt-get install -y nodejs

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

COPY package.json package-lock.json* ./
RUN npm install

COPY . .

RUN npm run build

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8080}
