FROM php:8.1-apache

# Installer git et curl
RUN apt-get update && apt-get install -y git curl

# Configurer git pour utiliser HTTPS
RUN git config --global url."https://".insteadOf git://
RUN git config --global url."https://github.com/".insteadOf git@github.com:

# Cloner manuellement le dépôt pint
RUN git clone https://github.com/laravel/pint.git /var/www/html/vendor/laravel/pint

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le projet dans le conteneur
COPY . /var/www/html

# Vider le cache Composer et installer les dépendances avec un délai plus long
RUN rm -rf /root/.composer/cache/* && cd /var/www/html && composer install --prefer-dist --no-scripts --timeout=600

# Changer les permissions des fichiers
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
