FROM php:8.2-fpm

RUN apt-get update && apt-get install -y unzip curl git nodejs npm libzip-dev nginx procps

RUN docker-php-ext-install pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY php.ini /usr/local/etc/php/php.ini
COPY nginx.conf /etc/nginx/sites-enabled/default

COPY ./laravel /var/www

WORKDIR /var/www

RUN chown -R www-data:www-data /var/www

EXPOSE 8080

CMD service php8.2-fpm start && nginx -g 'daemon off;'
