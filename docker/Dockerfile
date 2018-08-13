FROM php:7.2-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    nano \
    git

# Install PECL extensions
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /www










