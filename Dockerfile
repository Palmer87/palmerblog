# Utilise une image PHP avec Apache
FROM php:8.2-apache

# Installe les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    sqlite3 \
    libzip-dev \
    libpng-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Active le module Apache mod_rewrite (important pour Laravel)
RUN a2enmod rewrite

# Copie ton projet dans le conteneur
COPY . /var/www/html

# Va dans le dossier du projet
WORKDIR /var/www/html

# Installe Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installe les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donne les bonnes permissions aux dossiers
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Ouvre le port 80 pour que Render puisse accéder à ton site
EXPOSE 80
