# Utiliser une image de base avec PHP et Apache
FROM php:8.1-apache

# Installer les extensions PHP nécessaires pour Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer (gestionnaire de dépendances pour PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le projet Laravel dans le conteneur
COPY . /var/www/html

# Copier le script wait-for-it dans le conteneur
COPY wait-for-it.sh /usr/local/bin/wait-for-it.sh
RUN chmod +x /usr/local/bin/wait-for-it.sh

# Installer les dépendances Laravel via Composer
RUN cd /var/www/html && composer install

# Changer les permissions des fichiers Laravel pour Apache
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80 (pour l'application Laravel)
EXPOSE 80
