FROM php:7.4-fpm-alpine
# mysql
RUN docker-php-ext-install pdo pdo_mysql
ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini
WORKDIR /var/www/
CMD ["php-fpm"]
