FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure www-data user
ARG WWWUSER=1000
ENV WWWUSER ${WWWUSER}
ARG WWWGROUP=1000
ENV WWWGROUP ${WWWGROUP}

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
COPY ./docker-compose/php/custom.ini $PHP_INI_DIR/conf.d/

RUN groupmod -o -g ${WWWGROUP} www-data && \
    usermod -o -u ${WWWUSER} -g www-data www-data

WORKDIR /var/www

USER www-data
