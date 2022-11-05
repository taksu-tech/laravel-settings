# Laravel Setting

This is the Setting package that is used by Taksu.tech projects. 

# Installation

Run composer require.
```
composer require madeadi/laravel-settings
```

Add the service provider to `config/app.php`
```
"providers" => [
    ...,
    Madeadi\Settings\ServiceProvider::class,
]
```

Publish the migration file to create the table. 
```
php artisan vendor:publish --provider "Madeadi\Settings\ServiceProvider" --tag migrations
```
