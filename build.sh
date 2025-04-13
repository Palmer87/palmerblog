#!/usr/bin/env bash
# Exit on error
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Create SQLite database directory with proper permissions
mkdir -p /var/www/database
touch /var/www/database/database.sqlite
chmod -R 775 /var/www/database

# Generate application key if not set
php artisan key:generate --force

# Run database migrations
php artisan migrate --force

# Clear and cache routes, config, and views
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Install Node.js dependencies and build assets
npm ci
npm run build
