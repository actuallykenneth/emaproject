# If you are setting up the project with Homestead

You need VirtualBox and Vagrant. The setup of these is OS specific.

# Add the vagrant box

`vagrant box add laravel/homestead`

# Clone the homestead repo

`git clone https://github.com/laravel/homestead.git ~/Homestead`

This clones it into Homestead in your home directory if you're on Linux.

# Run the init script

Go into the directory you cloned Homestead into and run the init script. On Linux it's

`bash init.sh`

# Edit the Homestead.yaml file for the site, mapped folders, database, etc.

This is mine:

```
ip: "192.168.10.10"
memory: 2048
cpus: 2
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
    - map: ~/workspace/emaproject
      to: /home/vagrant/code/

sites:
    - map: emaproject.test
      to: /home/vagrant/code/emaproject/public

databases:
    - emaproject

features:
    - mariadb: true
    - ohmyzsh: false
    - webdriver: false

# ports:
#     - send: 50000
#       to: 5000
#     - send: 7777
#       to: 777
#       protocol: udp
```

Yours might be different, depending upon how you have everything set up.

# Bring up the VM
From within the Homstead directory run

`vagrant up`

This will provision it with what you specified in the Homstead.yaml file

# Once the vagrant box is setup
ssh into the box by going 

`vagrant ssh`

# Clone the repo into your mapped directory

Go into wherever your mapped VM folder is and run

`git clone https://actuallykenneth/emaproject.git`

# Create a new .env file

Just use the base .env.example file:

`cp .env.example .env`

and change what you need to.

here is mine:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Eoz4fo7hOQKmI5rX4o4+XgrztjssPcV3tVjwjotKT1U=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=emaproject
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Or at least, the only section of stuff I had to change.

# Grab all the depenencies for the project

The vendor-specific files are not tracked by git because it's a waste of time and space. So you install these dependencies by running

`composer install`

# If you get a key error... php artisan key:generate

`php artisan key:generate`

This adds the key to your .env file

# Run the migrations to create all the tables in the DB

`php artisan migrate`


# Random notes I made before

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
