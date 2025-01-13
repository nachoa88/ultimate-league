FROM php:8.3.2-apache

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Create a user with UID and GID of 1000 (same as host user)
RUN groupadd -g 1000 hostgroup && \
    useradd -u 1000 -g hostgroup -m hostuser

# Set permissions for the application directory
RUN chown -R hostuser:hostgroup /var/www/html

# Ensure Apache configuration allows access and sets DocumentRoot to public
RUN echo "<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>" > /etc/apache2/sites-available/000-default.conf

# Enable Apache rewrite module
RUN a2enmod rewrite

# Switch to the hostuser
USER hostuser

CMD ["apache2-foreground"]