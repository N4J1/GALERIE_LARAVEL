<p align="center"><a href="#"><img src="/public/images/logo/logo-svg.svg" width="400" alt="Galerie Logo"></a></p>

## Galerie By [Yassine NAJI](https://www.linkedin.com/in/yassinenaji0/)


###  *`Project SETUP:`*

```sh

git clone https://github.com/N4J1/GALERIE_LARAVEL.git
cd GALERIE_LARAVEL
composer install
composer update
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache
cp .env.example .env
php artisan key:generate
php artisan config:clear
php artisan config:cache
php artisan migrate
php artisan storage:link
php artisan serve

```

