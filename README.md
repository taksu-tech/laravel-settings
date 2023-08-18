# Laravel Setting

This is the Setting package that is used by Taksu.tech projects. 

# Installation

Run composer require.

```
composer require "taksu/laravel-settings"
```

Add the service provider to `config/app.php`
```
"providers" => [
    ...,
    Taksu\Settings\ServiceProvider::class,
]
```

Publish the migration file to create the table. 
```
php artisan vendor:publish --provider "Taksu\Settings\ServiceProvider" --tag migrations
```
