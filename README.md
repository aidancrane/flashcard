# Flashcard Club
The flashcard.club's source code repository.

# Example Environment File

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:4M9T9G5kVFq9hr2GLL1Ctoz3okk7JJ9c8C6Bp7yms/U=
APP_DEBUG=true
APP_URL=http://flashcard.club

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=flashcard
DB_USERNAME=root
DB_PASSWORD=whypassword492

TELESCOPE_ENABLED=true

IGNITION_EDITOR=atom
IGNITION_THEME=auto

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120
```
# Local Installation for Development

To install this application you will need to use a LAMP server configured with a virtual host to match the `APP_URL` above. The database password should also be changed.

1. Set up a typical LAMP server, my favourite is an Ubuntu server image with apache,  
    ```bash
    sudo apt update
    sudo apt upgrade
    sudo apt install apache2
    sudo apt install mysql-server
    sudo mysql_secure_installation # Follow the configuration options as needed
    sudo apt install php libapache2-mod-php php-mysql
    sudo apt install php-cli unzip
    curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
    ```
2. Set up your vhost and domain in apache, or leave it as the default, just make sure to remove the default website.
3. Copy or pull the git repo to your development environment vhost folder, I typically use `/var/www/root/flashcard.club`
3. Set up your .env file for laravel, use the example above and change the passwords.
4. Run composer,
   ```bash
   composer install — optimize-autoloader — no-dev
   composer update
   php artisan migrate:fresh
   php artisan db:seed
   ```

This should be all you need to get started.


# To deploy from docker

1. Set your .env or use the example provided.
2. 
    ```
    docker-compose run --rm npm install
    docker-compose run --rm composer install
    docker-compose run --rm artisan config:clear
    docker-compose run --rm artisan migrate:fresh --seed
    ```