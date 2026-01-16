FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    libmemcached-dev \
    libicu-dev \
    unzip \
    curl \
    git \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    gd \
    mysqli \
    pdo \
    pdo_mysql \
    zip \
    mbstring \
    xml \
    curl \
    intl \
    opcache \
    exif

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache modules
RUN a2enmod rewrite headers expires deflate

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/tmp \
    && chmod -R 777 /var/www/html/files

# PHP configuration
RUN echo "upload_max_filesize = 512M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 512M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 600" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_input_time = 600" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 512M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_input_vars = 10000" >> /usr/local/etc/php/conf.d/uploads.ini

# Apache configuration
RUN echo '<Directory /var/www/html>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    </Directory>' > /etc/apache2/conf-available/custom.conf \
    && a2enconf custom

# Set ServerName to suppress Apache warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose port 80
EXPOSE 80

# Disable healthcheck - Coolify handles this
HEALTHCHECK NONE

CMD ["apache2-foreground"]
