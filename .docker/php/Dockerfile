FROM php:8.3-fpm

ENV ACCEPT_EULA=Y

WORKDIR /var/www

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        curl \
        gnupg \
        libmemcached-dev \
        libz-dev \
        libzip-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libonig-dev \
        libssl-dev \
        libmcrypt-dev \
        unixodbc-dev \
        zip \
        jpegoptim optipng pngquant gifsicle \
        unzip \
        git

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mbstring pdo pdo_mysql bcmath

RUN docker-php-ext-configure gd \
        --with-jpeg=/usr/include/ \
        --with-freetype=/usr/include/freetype2 && \
    docker-php-ext-install gd

RUN docker-php-ext-configure zip \
  && docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Change current user to www
USER www
