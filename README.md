<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel 9 Inertia Vue 3 CRUD

This is a simple web application developed using Laravel Inertia Js and vue3. This application includes authentication and a simple CRUD.

1. Laravel 9
2. Vue 3
3. Inertia JS
4. laravel/breeze

## Getting Started
1. In your root folder, Clone the repository

```sh
 git clone https://github.com/PhyoMinHein123/laravel-inertia-vue-crud.git
 ```

2. Go to project folder
```sh
cd laravel-inertia-vue3
```

3. Install required files and libraries 

```sh
composer install
```

4. create a .env file and generate key for this project

```sh
cp .env.example .env

php artisan key:generate
```

5. compile all CSS & JS files together

```sh
npm install && npm run dev
```

6. Create a database in MYSQL and connect it with your project via updating .env file.

```sh
php artisan migrate 
```

## Finally we are ready to run server

```sh
php artisan serve 
```
in one terminal and also run

```sh
npm run dev  
```
 on another terminal for compiling js and css. 
