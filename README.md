# Approval, employee and division in common corporate

[![Latest Version on Packagist](https://img.shields.io/packagist/v/atfromhome/laravel-corporate.svg?style=flat-square)](https://packagist.org/packages/atfromhome/laravel-corporate)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/atfromhome/laravel-corporate/run-tests?label=tests)](https://github.com/atfromhome/laravel-corporate/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/atfromhome/laravel-corporate/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/atfromhome/laravel-corporate/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/atfromhome/laravel-corporate.svg?style=flat-square)](https://packagist.org/packages/atfromhome/laravel-corporate)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require fromhome/laravel-corporate
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-corporate-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-corporate-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-corporate-views"
```

## Usage

```php
$corporate = new FromHome\Corporate();
echo $corporate->echoPhrase('Hello, FromHome!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Nuradiyana](https://github.com/nuradiyana)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
