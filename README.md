# Salesforce Provider for OAuth 2.0 Client
[![Join the chat at https://gitter.im/flipbox/oauth2-salesforce](https://badges.gitter.im/flipbox/oauth2-salesforce.svg)](https://gitter.im/flipbox/oauth2-salesforce?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Latest Version](https://img.shields.io/github/release/flipbox/oauth2-salesforce.svg?style=flat-square)](https://github.com/flipbox/oauth2-salesforce/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/flipbox/oauth2-salesforce/master.svg?style=flat-square)](https://travis-ci.org/flipbox/oauth2-salesforce)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/flipbox/oauth2-salesforce.svg?style=flat-square)](https://scrutinizer-ci.com/g/flipbox/oauth2-salesforce/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/flipbox/oauth2-salesforce.svg?style=flat-square)](https://scrutinizer-ci.com/g/flipbox/oauth2-salesforce)
[![Total Downloads](https://img.shields.io/packagist/dt/flipboxdigital/oauth2-salesforce.svg?style=flat-square)](https://packagist.org/packages/flipboxdigital/oauth2-salesforce)

This package provides Salesforce OAuth 2.0 support for the PHP League's [OAuth 2.0 Client](https://github.com/flipbox/oauth2-client).

## Installation

To install, use composer:

```
composer require flipboxdigital/oauth2-salesforce
```

## Usage

Usage is the same as The League's OAuth client, using `\Flipbox\OAuth2\Client\Provider\Salesforce` as the provider.

### Authorization Code Flow

```php
$provider = new Flipbox\OAuth2\Client\Provider\Salesforce([
    'clientId'          => '{salesforce-client-id}',
    'clientSecret'      => '{salesforce-client-secret}',
    'redirectUri'       => 'https://example.com/callback-url',
    'domain'            => '{custom-salesforce-domain}' // optional, defaults to https://login.salesforce.com
    'apiVersion'        => '{custom-salesforce-api-version}' // optional, defaults to v21.0
]);
```
For further usage of this package please refer to the [core package documentation on "Authorization Code Grant"](https://github.com/thephpleague/oauth2-client#usage).

### Refreshing a Token

```php
$provider = new Flipbox\OAuth2\Client\Provider\Salesforce([
    'clientId'          => '{salesforce-client-id}',
    'clientSecret'      => '{salesforce-client-secret}',
    'redirectUri'       => 'https://example.com/callback-url'
]);

$existingAccessToken = getAccessTokenFromYourDataStore();

if ($existingAccessToken->hasExpired()) {
    $newAccessToken = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $existingAccessToken->getRefreshToken()
    ]);

    // Purge old access token and store new access token to your data store.
}
```

### Using a custom Salesforce domain

```php
$provider->setDomain('https://foo-bar.salesforce.com');
```

For further usage of this package please refer to the [core package documentation on "Refreshing a Token"](https://github.com/thephpleague/oauth2-client#refreshing-a-token).


## Testing

``` bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/flipbox/oauth2-salesforce/blob/master/CONTRIBUTING.md) for details.


## Credits

- [Flipbox Digital](https://github.com/flipbox)


## License

The MIT License (MIT). Please see [License File](https://github.com/flipbox/oauth2-salesforce/blob/master/LICENSE) for more information.