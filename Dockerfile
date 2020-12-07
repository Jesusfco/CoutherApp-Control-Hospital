FROM php:7.2-fpm

LABEL maintainer="Carlos Lizaola <clizaola@webforcehq.com>"

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
# RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis



# Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Get latest Composer New way
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
# COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Set working directory
WORKDIR /var/www

# RUN composer install --no-interaction --prefer-dist --optimize-autoloader
# RUN cp .env.example .env
# RUN php artisan key:generate

# Change current user to www
USER www


# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
# EXPOSE 8080
# CMD ["php","-S","0.0.0.0:8080","./public/index.php"]