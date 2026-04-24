FROM php:8.1-apache

# PHP 확장 설치 (운영서버 기준)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# GD, mbstring, zip (운영서버 사용 확인)
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd zip mbstring exif \
    && rm -rf /var/lib/apt/lists/*

# Xdebug 설치 (로컬 개발용)
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Apache 모듈 활성화
RUN a2enmod rewrite headers

# 운영서버 php.ini 기준 커스텀 설정
COPY php-custom.ini /usr/local/etc/php/conf.d/99-custom.ini

# Apache 기본 설정: ServerName 경고 제거
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
