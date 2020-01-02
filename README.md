# SAHEM:
The project is a platform that makes a bridge betweenUmm Al-Qura University’s authorities needs and studentscourses projects requirements to benefit from students’projects to improve the university.
This project is the required project for internet application course in UQU.

## Quick Start:
you need node.js and angular-cli installed to run the project

you can download node.js from https://nodejs.org/en/download/

also, you need to have php, mysql and any server. you might use xampp from https://www.apachefriends.org/index.html
You need to install composer and laravel

after downloading node.js, you need to install angular-cli

windows > cmd:

    npm install -g @angular/cli

Mac & Linux > Terminal:

    sudo npm install -g @angular/cli

clone the project:

    git clone https://github.com/maher-cs/internet-applications-sahem.git
    cd internet-applications-sahem

for angular:

    cd app
    npm install
    ng serve

then open the browser on http://localhost:4200

for laravel:

    cd service
    composer install
    php artisan migrate:fresh
    php artisan passport:install
    php artisan db:seed
    php artisan serve

