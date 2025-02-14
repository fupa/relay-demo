# syntax=docker/dockerfile:1
FROM nginxinc/nginx-unprivileged:1.23.2-alpine

USER root

# delete conflicting default config and create a dummy index.php file (must only exist)
RUN rm /etc/nginx/conf.d/default.conf \
    && mkdir -p /var/www/html \
    && touch /var/www/html/index.php

USER nginx:nginx

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./php-app.conf /etc/nginx/conf.d/

WORKDIR /var/www/html
