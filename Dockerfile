#-----------------------------------------------------
#
#    This is Docker file of Wordpress and apache2
#
#    Date: 18-05-2023
#
#    Author: Boris Chernov chernov001@gmail.com
#
#-----------------------------------------------------

FROM ubuntu:20.04

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysql \
    php-curl \
    php-gd \
    php-mbstring \
    php-xml \
    php-xmlrpc \
    php-zip \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Скачивание и распаковка архива WordPress
RUN curl -o latest.zip -SL https://wordpress.org/latest.zip \
    && unzip latest.zip -d /var/www/html/ \
    && rm latest.zip

# Настройка Apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html

# Открытие портов
EXPOSE 80

# Запуск сервера Apache
CMD ["apache2-foreground"]
