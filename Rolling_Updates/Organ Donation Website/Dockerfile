FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Enable Apache rewrite mod
RUN a2enmod rewrite

# Copy PHP files into the container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

EXPOSE 80
