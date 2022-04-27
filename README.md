<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Runtime Versions
- PHP 8.1.3
- Laravel 9.9.0

## Installation/Setup
- Clone the repo
- composer install
- Run the migrations: php artisan migrate
- Run the seeders: php artisan db:seed

## Testing
- Create database named "test01"
- Run the test: php artisan test

## Player Data Importer
- Setup your environment cron to execute the command "fetch:players"

## Players API CRUD
- List: api/player | GET
- Store - api/player | POST
- Update - api/player/{id} | PUT
- Delete - api/player{id} | DELETE
- Create - api/player/create | GET
- Edit - api/player/{id} | GET
