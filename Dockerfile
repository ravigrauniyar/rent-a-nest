# Use the official PHP image
FROM php:8.2-apache

# Create the directory for the PHP project
RUN mkdir -p /var/www/html

# Copy your PHP project into the container
COPY . /var/www/html

# Install any PHP extensions or dependencies your project requires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose the necessary port (usually 80 for HTTP)
EXPOSE 80
