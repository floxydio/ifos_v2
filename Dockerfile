# Use an official PHP image with Apache
FROM php:5.6-apache

# Enable mod_rewrite for CodeIgniter's URL rewriting
RUN a2enmod rewrite

# Set the working directory to /var/www/html, where Apache serves files
WORKDIR /var/www/html

# Copy the application code to the container
COPY . /var/www/html

# Set permissions for the /var/www/html directory
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Install MySQL extensions if your CodeIgniter app uses a MySQL database
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80
EXPOSE 80
