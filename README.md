# Manage your site's Open Graph tags inside of Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/c6digital/filament-og-manager.svg?style=flat-square)](https://packagist.org/packages/c6digital/filament-og-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/c6digital/filament-og-manager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/c6digital/filament-og-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/c6digital/filament-og-manager/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/c6digital/filament-og-manager/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/c6digital/filament-og-manager.svg?style=flat-square)](https://packagist.org/packages/c6digital/filament-og-manager)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require c6digital/filament-og-manager
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-og-manager-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-og-manager-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-og-manager-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$ogManager = new C6Digital\OgManager();
echo $ogManager->echoPhrase('Hello, C6Digital!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/c6digital)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
