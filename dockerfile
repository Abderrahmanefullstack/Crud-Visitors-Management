# Utiliser une image de base avec PHP et Apache
FROM php:8.1-apache

# Installer git et curl (si ce n'est pas déjà fait)
RUN apt-get update && apt-get install -y git curl

# Configurer git pour utiliser HTTPS plutôt que SSH
RUN git config --global url."https://".insteadOf git://
RUN git config --global url."https://github.com/".insteadOf git@github.com:

# Installer les extensions PHP nécessaires pour Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer (gestionnaire de dépendances pour PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le projet Laravel dans le conteneur
COPY . /var/www/html

# Supprimer le cache de Composer avant d'installer les dépendances
RUN rm -rf /root/.composer/cache/*

# Installer les dépendances Laravel via Composer
RUN cd /var/www/html && composer install

# Changer les permissions des fichiers Laravel pour Apache
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80 (pour l'application Laravel)
EXPOSE 80
