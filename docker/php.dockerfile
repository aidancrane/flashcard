FROM php:8-fpm-alpine

RUN apk add --no-cache git

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

#RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-install pdo pdo_mysql

#RUN chown -R www-data:www-data /var/www
#RUN chown -R www-data:www-data /var/www/html/storage
RUN chmod -R 777 /var/www

#RUN sudo chown -R www-data:www-data /var/www/html \
#    && sudo chmod 777 -R /var/www/html \

# RUN mkdir -p /usr/src/php/ext/redis \
#     && curl -L https://github.com/phpredis/phpredis/archive/5.3.4.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
#     && echo 'redis' >> /usr/src/php-available-exts \
#     && docker-php-ext-install redis

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
