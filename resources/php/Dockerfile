# syntax=docker/dockerfile:1
FROM php:8.3.16-fpm-alpine3.20

COPY --from=mlocati/php-extension-installer:2.7.23 /usr/bin/install-php-extensions /usr/local/bin/
COPY --from=composer:2.6.5 /usr/bin/composer /usr/local/bin/composer

RUN install-php-extensions zip xdebug relay

COPY ./php.ini ${PHP_INI_DIR}/php.ini
COPY ./relay.ini ./xdebug.ini ${PHP_INI_DIR}/conf.d/

USER www-data:www-data

WORKDIR /var/www/html
