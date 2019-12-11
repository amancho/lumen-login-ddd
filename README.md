# Lumen DDD Login
User validation without DB

## Installation
- cd /path/to/your/repo
- git clone https://github.com/amancho/lumen-login-ddd.git
- composer install

## Application Architecture
- **app**  - Framework specific functionality, validator classes, service providers base models, etc
- **app\Http\Controllers\UsersController** Authenticate controller
- **app\Users** - All of my business logic for Users, such as entities, repository interfaces, and domain services.

## Routes path
- **app\routes\api.php**

## Tests

### Allowed credentials
- ['email' => 'amancho@gmail.com', 'password' => '123456']
- ['email' => 'jdomenech@driv****.com', 'password' => '123456']
- ['email' => 'fran@driv****.com', 'password' => '123456']

        
### Unit tests for App\Users\Domain
```
 php {{APP_DIR}}/vendor/phpunit/phpunit/phpunit --no-configuration {{APP_DIR}}/app/Users/Domain/Tests/UserEntityTest.php 
 php {{APP_DIR}}/vendor/phpunit/phpunit/phpunit --no-configuration {{APP_DIR}}/app/Users/Domain/Tests/UserRepositoryTest.php 
```

### Feature tests for App\Http\Controllers\UsersController
```
php {{APP_DIR}}/vendor/phpunit/phpunit/phpunit --no-configuration {{APP_DIR}}/tests/UsersControllerTest.php
```

### Application structure

```
 ├── Console
 ├── Events
 ├── Exceptions
 ├── Http
 │   ├── Controllers
 │   │   ├── Controller.php
 │   │   └── UsersController.php
 │   └── Middleware
 ├── Jobs
 ├── Listeners
 ├── Providers
 └── Users
     ├── Application
     │   └── Login
     │       ├── UserLogin.php
     │       └── UserLoginRequestValidation.php
     ├── Contracts
     │   └── UserLoginServiceContract.php
     ├── Domain
     │   ├── UserDB.php
     │   ├── UserEmail.php
     │   ├── UserId.php
     │   ├── UserName.php
     │   ├── UserPassword.php
     │   ├── User.php
     │   └── UserRepository.php
     ├── Services
     │   └── SingInService.php
     └── Tests
         ├── UserEntityTest.php
         └── UserRepositoryTest.php
```

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
