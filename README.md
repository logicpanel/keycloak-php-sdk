# Keycloak PHP SDK

This package aims to wrap the Keycloak API and provide an easy and consistent layer
for managing your keycloak realms.

![License](https://img.shields.io/badge/license-MIT-brightgreen)
[![PHP](https://img.shields.io/badge/%3C%2F%3E-PHP%207.3-blue)](https://www.php.net/)
[![Code Style](https://img.shields.io/badge/code%20style-psr--2-darkgreen)](https://www.php-fig.org/psr/psr-2/)

## Documentation

### Quick start

First create a KeycloakClient with your credentials.
```php
$kcClient = new Keycloak\KeycloakClient(
    'my-client-id',
    'my-client-secret',
    'my-realm',
    'https://my-keycloak-base-url.com'
);
```

Then you can pass the client to any of the APIs.

```php
$userApi = new Keycloak\User\Api($kcClient);
$allUsers = $userApi->findAll();
```

### Tested platforms

These are the platforms which are officially supported by this package. Any other versions will probably work but is not guaranteed.

| Platform | Version |
| --- | ---: |
| PHP | 7.3 |
| Keycloak | 11 |

### Contributing

Please read our [contribution guidelines](./CONTRIBUTING.md) before contributing.
