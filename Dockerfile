# BASH COMMANDS

# $   docker build -t imagemlaravel .

# $   docker run -d --name containerlaravel -p 8085:80 -v ${PWD}:/var/www/html imagemlaravel

# $   docker exec -u 1000 containerlaravel bash -c "composer create-project --prefer-dist laravel/laravel ."

# DOCKERFILE

FROM php:7.4-apache

RUN usermod -u 1000 -s /bin/bash www-data && groupmod -g 1000 www-data

RUN apt-get update

RUN apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    g++

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

RUN sed -ri -r 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite headers

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    bz2 \
    intl \
    iconv \
    bcmath \
    opcache \
    calendar \
    mbstring \
    pdo_mysql \
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
