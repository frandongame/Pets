FROM php:8.2-apache

# Instala extensiones necesarias de PHP para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

EXPOSE 80