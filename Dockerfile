FROM php:8.2-apache

WORKDIR /var/www/html

COPY . .

COPY .env.example .env

# Linux Library
RUN apt-get update -y && apt-get install -y git

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install  --prefer-dist --no-progress --no-suggest

# Install pdo extention
RUN docker-php-ext-install pdo_mysql

# Mod Rewrite
RUN a2enmod rewrite

COPY Docker/apache-conf.conf /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data /var/www/html/
RUN chmod 755 /var/www/html/storage/ -R

CMD ["apache2-foreground"]
