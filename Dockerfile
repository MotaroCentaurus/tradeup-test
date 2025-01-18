FROM php:8.3-cli

RUN apt update -y
RUN apt install git zip -y

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /app
