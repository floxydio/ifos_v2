# Dockerfile

FROM php:7.4-apache

# Set ServerName to suppress the warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Configure Apache to allow .htaccess overrides
RUN echo "<Directory /var/www/html/ifos_v1>\n\
    Options -Indexes\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" >> /etc/apache2/apache2.conf

# Copy application files into the ifos_v1 directory
RUN mkdir -p /var/www/html/ifos_v1
COPY . /var/www/html/ifos_v1

# Set appropriate permissions
RUN chown -R www-data:www-data /var/www/html/ifos_v1 \
    && chmod -R 755 /var/www/html/ifos_v1
