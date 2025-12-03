FROM php:7.4-cli

# Install ekstensi wajib
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install mysqli intl

WORKDIR /app

COPY . .

# Hapus "bash -c" dan tanda kutip, biarkan shell bawaan yang menangani
CMD php -S 0.0.0.0:8080
