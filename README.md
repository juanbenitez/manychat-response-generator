# PHP package to generate Manychat dynamic JSON responses.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/juanbenitez/manychat-response-generator.svg?style=flat-square)](https://packagist.org/packages/juanbenitez/manychat-response-generator)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/juanbenitez/manychat-response-generator/run-tests?label=tests)](https://github.com/juanbenitez/manychat-response-generator/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/juanbenitez/manychat-response-generator.svg?style=flat-square)](https://packagist.org/packages/juanbenitez/manychat-response-generator)


This package allows you to generate Manychat dynamic Json responses easily within your PHP projects. Please refer to this link to learn more about [Manychat dynamic responses format.](https://manychat.github.io/dynamic_block_docs/)


## Installation

You can install the package via composer:

```bash
composer require juanbenitez/manychat-response-generator
```

## Usage

``` php
ManychatResponse::make(
    [
        Text::make('hello world')
            ->addButton(Call::make('Caption', '423424324'))
            ->addButton(Url::make('Caption', 'https://sdsad.com')),
    ]
)->send();
```
See the [examples] directory for more usage examples.
## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Juan Benitez](https://github.com/juanbenitez)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
