# Dockerfile

# Use PHP with Apache
FROM php:7.4-apache

# Set ServerName to suppress Apache warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Change the DocumentRoot to /ifos_v1
RUN sed -i 's|/var/www/html|/var/www/html/ifos_v1|g' /etc/apache2/sites-available/000-default.conf

# Configure Apache to allow .htaccess overrides for /ifos_v1
RUN echo "<Directory /var/www/html/ifos_v1>\n\
    Options -Indexes\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" >> /etc/apache2/apache2.conf

# Set the working directory
WORKDIR /var/www/html/ifos_v1

# Copy application files and set permissions
COPY . /var/www/html/ifos_v1
RUN chown -R www-data:www-data /var/www/html/ifos_v1 && chmod -R 755 /var/www/html/ifos_v1

# Install additional PHP extensions if needed (e.g., mysqli, gd)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
