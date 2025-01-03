FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo_mysql

# Установка расширения Redis через PECL
RUN pecl install redis \
    && docker-php-ext-enable redis

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
