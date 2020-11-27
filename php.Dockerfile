FROM php:7.4.1-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 500M;" >> /usr/local/etc/php/conf.d/uploads.ini