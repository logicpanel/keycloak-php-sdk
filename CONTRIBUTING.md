# Contributing

Thank you for considering a contribution to this project. Please read the steps below to get started.

### Code Style

Please follow the [PSR-2 Coding Style Guide](https://www.php-fig.org/psr/psr-2/) when contributing
to this project. Pull requests with violations will be denied.

### Testing

1. Log in to the keycloak admin panel via a browser,
2. Navigate to the desired realm or create a new one(preferred),
3. Open the realm-management client,
4. Set Access Type to "confidential", disable "Standard Flow", enable "Service Accounts" and press "Save",
5. On the new "Service Account Roles" tab, give "realm-management" client role "realm-admin" to the service account,
6. Copy `./tests/credentials.example.json` to `./tests/credentials.json` and fill in the required fields,
7. Run `composer test`.
