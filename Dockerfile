# Use the official PHP image with Apache
FROM php:7.4-apache

# Set the working directory to /var/www/html/public
WORKDIR /var/www/html/public

# Copy application files to the /var/www/html directory
COPY . /var/www/html

# Install PHP extensions if needed (example for PDO)
RUN docker-php-ext-install pdo pdo_mysql

# Configure Apache
COPY ./apache2.conf /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80
