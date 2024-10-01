# Manage your site's Open Graph tags inside of Filament.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/c6digital/filament-og-manager.svg?style=flat-square)](https://packagist.org/packages/c6digital/filament-og-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/c6digital/filament-og-manager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/c6digital/filament-og-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/c6digital/filament-og-manager/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/c6digital/filament-og-manager/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/c6digital/filament-og-manager.svg?style=flat-square)](https://packagist.org/packages/c6digital/filament-og-manager)

This package provides a global SEO page that lets you manage Open Graph tags, as well as a set of fields to manage Open Graph tags for specific resources.

## Installation

You can install the package via Composer:

```bash
composer require c6digital/filament-og-manager
```

Run the installation command for the package:

```bash
php artisan og-manager:install
```

This will publish and execute migrations.

## Usage

Register the plugin:

```php
use C6Digital\OgManager\OgManagerPlugin;

$panel
    ->plugin(
        OgManagerPlugin::make()
    );
```

The global SEO page will be registered with your panel and automatically appear inside of the panel. Use this form to manage your site wide Open Graph tags.

### Rendering meta tags

To render meta tags in your Blade templates, use the provided component:

```blade
<head>
    <x-og-manager::seo />
</head>
```

### Model-specific tags

This package provides a custom group of fields that you can add to your own resource forms.

```php
use C6Digital\OgManager\Components\SEO;

public function form(Form $form): Form
{
    return $form->schema([
        SEO::make(),
    ]);
}
```

You'll then need to add the `HasOpenGraphMeta` trait to your model.

```php
use C6Digital\OgManager\Concerns\HasOpenGraphMeta;

class Post extends Model
{
    use HasOpenGraphMeta;
}
```

This registers a new `openGraphMeta` relationship on your model which this field uses.

To render meta tags for a specific model, pass the model through to the Blade component using the `for` prop.

```blade
<head>
    <x-og-manager::seo :for="$post" />
</head>
```

### Changing the URL

This package defaults to using `url()->current()` when rendering meta tags (`og:url`, `twitter:url`). If you want to change URL you can pass it through as a prop to the Blade component.

```blade
<x-og-manager::seo :url="route('posts.show', $post)" />
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
