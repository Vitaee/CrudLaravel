# Use the official PHP 8 image as a parent image
FROM php:8.1-apache-buster

# Set working directory
COPY . /app/
ENV APP_ENV=dev
ENV APP_DEBUG=true
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_pgsql pgsql mysqli gd zip opcache \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


COPY --from=build /usr/bin/composer /usr/bin/composer
RUN composer install --prefer-dist --no-interaction

# Copy the init SQL script to create database
COPY ./init.sql /docker-entrypoint-initdb.d/init.sql

# Generate optimized autoloader
RUN composer dump-autoload --optimize

RUN php artisan config:cache && \
    php artisan route:cache && \
    chmod 777 -R /var/www/html/storage/ && \
    chown -R www-data:www-data /var/www/ && \
    a2enmod rewrite \

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]