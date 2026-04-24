FROM php:7.4-fpm

# 운영서버 기준 확장 설치
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip mbstring exif mysqli pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Xdebug 설치 (php7.4 호환 버전)
RUN pecl install xdebug-3.1.6 && docker-php-ext-enable xdebug

# 운영서버 php.ini 기준 커스텀 설정
COPY php-custom.ini /usr/local/etc/php/conf.d/99-custom.ini
