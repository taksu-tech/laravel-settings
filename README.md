# Laravel Setting

This is the Setting package that is used by Taksu.tech projects. 

# Installation

## Local Installation

The package is not in packagist yet. Therefore, get this from Gitlab.

Add these lines to `composer.json`.
```
...
"repositories": [    
    {
        "type": "vcs",
        "url": "https://gitlab.com/taksu-public/laravel-setting.git"
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
