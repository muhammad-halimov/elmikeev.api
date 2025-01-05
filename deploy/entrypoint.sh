#!/bin/sh

# composer require dees040/jwt-auth
# php artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"

echo "🎬 entrypoint.sh: [$(whoami)] [PHP $(php -r 'echo phpversion();')]"

composer dump-autoload --no-interaction --no-dev --optimize

echo "🎬 artisan commands"

# install telescope resource
php artisan telescope:install

# 💡 Group into a custom command e.g. php artisan app:on-deploy
php artisan migrate --no-interaction --force

# command optimization
php artisan optimize:clear
php artisan optimize

# create cache folder manually to avoid cache error
cd /var/www/bootstrap && mkdir cache
chown -R www-data:www-data /var/www/bootstrap/cache/

/usr/bin/supervisord -c /etc/supervisord.conf

