# multiTenant
Laravel package to handel multi databases in one sorce code , depend on sub domain .
Suitable for marketing companies that like to re-use functionality for different clients or start-ups building the next software as a service.

# Advantages 
- Very simple
- Seperated Database Schema 

# Installation 
 - Add in composer.json 
```bash
"mhnassar/multi-tenant": "dev-master"
```
 - Run 
 ```bash
composer update
```
- Add  in config/app.php 
 ```bash
 'providers' => [
        ...
        MHNassar\MultiTenant\MultiTenantServiceProvider::class,
        ],
```
- let’s add middleware to the array of middleware in file Http/Kernel.php: 
 ```bash
 protected $middleware = [
     ......
     MHNassar\MultiTenant\Middleware\MultiTenant::class,
    ];

```
After going through all the previous steps, your package should be installed successfully.

# Configuration Tenant Driver for Multiple Database

- Create a new subdomain for your domain in your hosting server (e.g.: tenant1.example.com)
- Create a new database with the same name of your subdomain (e.g. tenant1)- 
- Create a new database connection with the same name of your subdomain in the file config/database.php:

```bash 
'tenant1' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => 'tenant1', //name of database 
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

```
- change "APP_ENV" in .env file  to "local"
- To run migration and seeds run the "Multi:migrate" command with the name of your subdomain from the main folder:
```bash
php artisan Multi:migrate tenant1
```
Now you are finished ... Enjoy!


