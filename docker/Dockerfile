FROM php:8.2-apache

ENV APP_ENV=dev
ENV APP_DEBUG=true
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN apt-get update && \
    apt-get install -y zip
RUN docker-php-ext-install pdo pdo_mysql
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# COPY . /var/www/html/
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN groupadd -g 1000 -o apache && \
    useradd -m -u 1000 -g 1000 -o -s /bin/bash apache && \
    a2enmod rewrite
  #chmod 777 -R /var/www/html/storage/ && \
  #chown -R 1000:1000 /var/www/html

#RUN composer install --prefer-dist --no-interaction && \
#    a2enmod rewrite && \
#    php artisan config:cache && \
#    php artisan route:cache

USER apache

