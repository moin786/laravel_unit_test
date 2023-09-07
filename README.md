<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the project

Laravel Vuejs Inertia unit testing you can use this project, here I have done unit testing for supplier module and this is test driven development TDD, where is test input data of a supplier during insert must be an array, supplier name can not contain any numeric data, have to valid email address.

- composer install.
- Core packages inside "CorePackages" folder
- php artisan migrate
- php artisan tinker
- Supplier::factory()->count(10)->create()
- Category::factory()->count(10)->create()
- npm install.
- php artisan serve.
- npm run watch.
- http://localhost:8000/
- Click on test folder, open SupplierTest.php under Unit folder
- Install "better php" extention in vscode
- CTRL+R to run the test.
