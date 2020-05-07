FROM php:7.4-alpine
# mysql
RUN docker-php-ext-install pdo pdo_mysql
ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini
WORKDIR /var/www/
#cron
RUN apk update && apk add dcron
RUN apk add --no-cache tini
ADD crontab.txt /crontab.txt
COPY entry.sh /entry.sh
RUN chmod 755 /entry.sh
RUN /usr/bin/crontab /crontab.txt
CMD ["/entry.sh"]
