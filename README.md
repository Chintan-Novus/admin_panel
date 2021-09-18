<p align="center" style="background: #00409F"><a href="https://novuslogics.com/" target="_blank">
<img src="https://novuslogics.com/images/logo-light.png" width="400">
</a></p>

<p align="center">
<a href="https://packagist.org/packages/novuslogics/admin_panel"><img src="https://img.shields.io/github/last-commit/Chintan-Novus/admin_panel" alt="Last Commit"></a>
<a href="https://packagist.org/packages/novuslogics/admin_panel"><img src="https://img.shields.io/github/downloads/Chintan-Novus/admin_panel/total" alt="Total Downloads"/></a>
<a href="https://packagist.org/packages/novuslogics/admin_panel"><img src="https://img.shields.io/packagist/v/Chintan-Novus/admin_panel" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/novuslogics/admin_panel"><img src="https://img.shields.io/packagist/l/Chintan-Novus/admin_panel" alt="License"></a>
</p>

## About Admin Panel

## Installation

Require this package with composer.

```shell
composer composer require novuslogics/admin_panel
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.


#### Copy the package config to your local config with the publish command:

```shell
php artisan vendor:publish --provider="Novuslogics\AdminPanel\ServiceProvider"
```


## Usage

#### Label
```php
<x-admin_panel::label for="label" value="Label" class="required" />
```

#### Input
```php
<x-admin_panel::input type="text" name="text" placeholder="Text input"/>
<x-admin_panel::input type="email" name="email" placeholder="Email input"/>
<x-admin_panel::input type="password" name="password" placeholder="Password input"/>
```

#### Button
```php
<x-admin_panel::button class="btn-primary">Primary Button</x-admin_panel::button>
```

## License

The package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
