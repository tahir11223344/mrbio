FROM php:8.2-apache

# -----------------------------
# System & PHP dependencies
# -----------------------------
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    nano \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libicu-dev \
    libxslt-dev \
    libcurl4-openssl-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        mbstring \
        zip \
        exif \
        pcntl \
        bcmath \
        intl \
        gd \
        xml \
        xsl \
        opcache

# Enable Apache rewrite
RUN a2enmod rewrite

# Apache document root -> public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf

# Set working directory
WORKDIR /var/www/html

# -----------------------------
# Composer
# -----------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Composer install (FULL, no skipping)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# -----------------------------
# Frontend build (Vite / NPM)
# -----------------------------
RUN npm install
RUN npm run build

# -----------------------------
# Permissions
# -----------------------------
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
