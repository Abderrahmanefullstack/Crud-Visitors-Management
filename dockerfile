# Utiliser l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installer les dépendances requises pour Composer et Git
RUN apt-get update && apt-get install -y git curl libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurer Composer pour gérer les connexions Git (si nécessaire)
RUN git config --global url."https://".insteadOf git://
RUN git config --global url."https://github.com/".insteadOf git@github.com:

# Copier les fichiers de ton application dans l'image Docker
COPY . /var/www/html

# Installer les dépendances via Composer
RUN cd /var/www/html && composer install --no-interaction --prefer-dist

# Exposer le port 80 pour accéder à l'application via HTTP
EXPOSE 80
