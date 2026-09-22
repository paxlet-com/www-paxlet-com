FROM php:8.3-apache

LABEL maintainer="tom@sapletta.com"
LABEL description="Paxlet Website (paxlet.com) - PHP / Apache / Plesk compatible"

# Enable Apache modules used on Plesk
RUN a2enmod rewrite headers expires deflate

# Set ServerName
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Allow .htaccess overrides in /var/www/html
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

WORKDIR /var/www/html

# Copy application source code
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=5s --start-period=3s --retries=3 \
  CMD curl -f http://localhost/health.php || exit 1

CMD ["apache2-foreground"]
