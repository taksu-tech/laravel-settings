# Laravel Setting

This is the Setting package that is used by Taksu.tech projects. 

# Installation

## Local Installation

The package is not in packagist yet. Therefore, clone the Laravel Setting to your local computer

Add these lines to `composer.json`.
```
...
"repositories": [    
    {
        "type": "path",
        "url": "../packages/composer/laravel-settings"
    }
]
```

Then, run composer require.
```
composer require "taksu/laravel-settings"
```

Add the service provider to `config/app.php`
```
"providers" => [
    ...,
    Taksu\Settings\SettingServiceProvider::class,
]
```

Publish the migration file to create the table. 
```
php artisan vendor:publish --provider "Taksu\Settings\SettingServiceProvider" --tag migrations
```
