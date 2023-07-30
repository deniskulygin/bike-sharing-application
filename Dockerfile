FROM php:8.1.0-fpm

COPY . /app
WORKDIR /app

RUN apt-get update \
    && apt-get -y install git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
