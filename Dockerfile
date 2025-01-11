FROM php:7.4-apache
RUN docker-php-ext-install mysqli pdo_mysql
RUN a2enmod rewrite
COPY . /var/www/html/consolidai
RUN sed -ri -e 's!/var/www/html!/var/www/html/consolidai/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf
WORKDIR /var/www/html/consolidai/public
EXPOSE 80
CMD ["apache2-foreground"]
