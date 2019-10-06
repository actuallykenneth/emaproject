vagrant box add laravel/homestead
git clone https://github.com/laravel/homestead.git ~/Homestead
~/Homestead/bash init.sh # init.bat for windows

- make sure to create an .env file after cloning from github
- key error do: php artisan key:generate; php artisan config:clear; php artisan config:cache
- default Homestead username and password is homestead:secret

Laravel 6 changes auth method and moves it into laravel/ui library.
- composer require laravel/ui
- php artisan ui vue --auth
- npm install && npm run dev
