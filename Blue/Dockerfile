FROM php:7.4-apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli

# Copy all project files
COPY . /var/www/html/

# Optional: Enable Apache mod_rewrite
RUN a2enmod rewrite
