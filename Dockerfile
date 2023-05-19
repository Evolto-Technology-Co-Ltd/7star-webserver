FROM php:8.1-apache

# Install required dependencies
RUN apt-get update \
    && apt-get install -y \
        git \
        unzip \
        libz-dev \
    && rm -rf /var/lib/apt/lists/*

# Install gRPC extension
RUN pecl install grpc \
    && docker-php-ext-enable grpc

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy custom Apache configuration
COPY apache.conf /etc/apache2/sites-available/000-default.conf
