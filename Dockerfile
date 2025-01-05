FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www

# Add docker php ext repo
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install php extensions
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
  install-php-extensions intl bcmath pdo_mysql pdo_pgsql opcache redis uuid exif pcntl zip sockets

# Install dependencies
RUN apt-get update && apt-get install -y \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  zip \
  jpegoptim optipng pngquant gifsicle \
  unzip \
  git \
  nano vim \
  curl \
  lua-zlib-dev \
  libmemcached-dev \
  nginx

# Install supervisor
RUN apt-get install -y supervisor

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy code to /var/www
COPY --chown=www-data:www-data . /var/www

# add root to www group
RUN chmod -R ug+w /var/www/storage

# Copy nginx/php/supervisor configs
COPY deploy/supervisor.conf /etc/supervisord.conf
COPY deploy/php/local.ini /usr/local/etc/php/conf.d/app.ini
COPY deploy/nginx.conf /etc/nginx/sites-enabled/default

# PHP Error Log Files
RUN mkdir /var/log/php
RUN touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

# Deployment steps
RUN composer install --no-dev --no-scripts --no-autoloader
RUN chmod +x /var/www/deploy/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/var/www/deploy/entrypoint.sh"]

