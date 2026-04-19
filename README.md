# RevKeen PHP SDK

The official PHP client for the [RevKeen API](https://docs.revkeen.com). PHP 8.1+, PSR-4 autoloading, typed response classes, PSR-3 logging hooks, auto-pagination, webhook verification, and production-grade retries.

[![Packagist](https://img.shields.io/packagist/v/revkeen/sdk-php?style=flat-square&color=000)](https://packagist.org/packages/revkeen/sdk-php)
[![CI](https://img.shields.io/github/actions/workflow/status/RevKeen/sdk-php/ci.yml?branch=main&style=flat-square&label=ci)](https://github.com/RevKeen/sdk-php/actions)
[![PHP Version](https://img.shields.io/packagist/php-v/revkeen/sdk-php?style=flat-square&color=000)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/license-MIT-000?style=flat-square)](./LICENSE)
[![Docs](https://img.shields.io/badge/docs-docs.revkeen.com-000?style=flat-square)](https://docs.revkeen.com/docs/sdks/php)

## Install

```bash
composer require revkeen/sdk-php
```

Requires PHP 8.1+ with `ext-json` and `ext-mbstring`.

## Quick start

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use RevKeen\RevKeenClient;

$client = new RevKeenClient([
    'api_key' => getenv('REVKEEN_API_KEY'),
]);

$customer = $client->customers->create([
    'email' => 'ops@acme.example',
    'name'  => 'Acme Inc.',
]);

echo $customer->id;
```

## Features

- **PSR-4 autoloading** — drop-in for any modern PHP framework
- **Typed response objects** — hydrated into typed value classes, not `stdClass`
- **PSR-3 logging** — inject any PSR-3 logger to audit requests
- **Automatic pagination** — `$client->invoices->autoPagingList()` yields one at a time
- **Automatic retries** — exponential backoff on `5xx`, `429`, network errors
- **Idempotency keys** — attached automatically on safe-to-retry mutations
- **Webhook verification** — `WebhookVerifier::verify($body, $signature, $secret)`
- **OAuth 2.1 + API-key auth** — both first-class
- **Framework adapters** — Laravel service provider, Symfony bundle, plain PHP

## Documentation

- [SDK docs](https://docs.revkeen.com/docs/sdks/php) — examples, recipes, and full API surface
- [API reference](https://docs.revkeen.com/docs/api-reference) — every endpoint, from the OpenAPI spec
- [Webhooks guide](https://docs.revkeen.com/docs/webhooks) — signature verification + event catalogue
- [Versioning](https://docs.revkeen.com/docs/fundamentals/versioning) — API ↔ SDK compatibility matrix

## Generation

This SDK is generated from the [canonical OpenAPI spec](https://docs.revkeen.com/docs/api-reference). The generator runs on every spec change. A human-authored layer adds idiomatic helpers for pagination, retries, webhooks, and errors.

## Contributing

See [CONTRIBUTING.md](./CONTRIBUTING.md) for development setup, test instructions, and the release process.

Please file issues and feature requests on the [issue tracker](https://github.com/RevKeen/sdk-php/issues). For security disclosures, see [SECURITY.md](./SECURITY.md).

## License

[MIT](./LICENSE) — © RevKeen.
