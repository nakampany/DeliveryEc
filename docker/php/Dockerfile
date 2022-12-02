FROM php:8.1-fpm-buster

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/composer

# COPY php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

# Composer install
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

# install Node.js
COPY --from=node:18.12 /usr/local/bin /usr/local/bin
COPY --from=node:18.12 /usr/local/lib /usr/local/lib

RUN apt-get update && \
    apt-get -y install \
    git \
    zip \
    unzip \
    vim \
    && docker-php-ext-install pdo_mysql bcmath

WORKDIR /var/www/html

# install Node.js
COPY --from=node:18.12.1 /usr/local/bin /usr/local/bin
COPY --from=node:18.12.1 /usr/local/lib /usr/local/lib