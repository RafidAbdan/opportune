# KITA PAKSA PAKAI PHP 7.4
FROM php:7.4-cli

# Install ekstensi yang WAJIB buat CI3 (mysqli & intl)
RUN apt-get update && apt-get install -y \
    libicu-dev \
    && docker-php-ext-install mysqli intl

# Setting folder kerja
WORKDIR /app

# Copy semua kodingan kamu ke dalam server
COPY . .

# Perintah untuk menyalakan server di Port Railway
CMD bash -c "php -S 0.0.0.0:$PORT"
