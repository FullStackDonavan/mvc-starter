# Use the official PHP image from the Docker Hub
FROM php:7.4-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the local project files to the container
COPY . /var/www/html

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli

# Install Composer (for PHP dependency management)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install

# Expose port 80 for the Apache server
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
