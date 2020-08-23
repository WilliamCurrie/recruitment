FROM php:7.4-fpm

RUN buildDeps="libpq-dev libzip-dev libicu-dev" && \
    apt-get update && \
    apt-get install -y zip && \
    apt-get install -y $buildDeps --no-install-recommends
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli