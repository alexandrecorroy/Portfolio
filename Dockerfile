FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev libonig-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql zip

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN git config --global --add safe.directory /var/www/html

RUN composer install --no-interaction --no-progress --prefer-dist --no-scripts --ignore-platform-reqs

RUN mkdir -p var && chown -R www-data:www-data var

EXPOSE 9000
CMD ["php-fpm"]
