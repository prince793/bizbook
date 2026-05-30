FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git cron curl gnupg unzip libpng-dev libonig-dev libxml2-dev zip libzip-dev nginx \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . /var/www

# Install dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Setup Nginx configuration and permissions
COPY deployment/nginx.conf /etc/nginx/sites-available/default

# Ensure storage directories exist before changing ownership
RUN mkdir -p /var/www/storage /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www

EXPOSE 80

# Keep the container running by launching nginx in the foreground
CMD service nginx start && php-fpm -F