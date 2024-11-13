# Utiliser l'image de base PHP avec Apache
FROM php:8.1-apache

# Activer le module mod_rewrite pour Apache (nécessaire pour Laravel)
RUN a2enmod rewrite

# Installer les dépendances nécessaires pour Laravel (par exemple, les bibliothèques pour manipuler les images, la compression, etc.)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip

# Installer Composer globalement
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le code source du projet dans le répertoire du conteneur
COPY . /var/www/html

# Changer les permissions du dossier de projet (nécessaire pour que Laravel fonctionne correctement)
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installer les dépendances PHP via Composer
RUN composer install --no-interaction --prefer-dist

# Exposer le port 80 pour accéder à l'application web
EXPOSE 80

# Lancer le serveur Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
