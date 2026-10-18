# RevKeen PHP SDK

[![Packagist Version](https://img.shields.io/packagist/v/revkeen/sdk-php.svg)](https://packagist.org/packages/revkeen/sdk-php)
[![PHP Version](https://img.shields.io/packagist/php-v/revkeen/sdk-php.svg)](https://packagist.org/packages/revkeen/sdk-php)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

Official PHP client for the [RevKeen API](https://docs.revkeen.com/api-reference/openapi) — auto-generated from the OpenAPI specification via [OpenAPI Generator](https://openapi-generator.tech).

> [!IMPORTANT]
> This repository is a generated release mirror. Propose source changes in
> [RevKeen/revkeen](https://github.com/RevKeen/revkeen); `main` here is updated only by an explicit reviewed SDK release.

## Installation

```bash
composer require revkeen/sdk-php
```

Requires PHP 8.1 or later.

## Quick Start

```php
<?php

use GuzzleHttp\Client;
use RevKeen\Api\CustomersApi;
use RevKeen\Runtime\ClientFactory;
use RevKeen\Runtime\Environment;

$config = ClientFactory::configuration(Environment::SANDBOX)
    ->setApiKey('x-api-key', getenv('REVKEEN_API_KEY'));
$customersApi = new CustomersApi(new Client(), $config);

$customers = $customersApi->customersList(limit: 10);

foreach ($customers->data as $customer) {
    echo $customer->name . ' ' . $customer->email . "\n";
}
```

## Authentication

### API Key (recommended for server-to-server)

```php
$config = ClientFactory::configuration(Environment::PRODUCTION)
    ->setApiKey('x-api-key', getenv('REVKEEN_API_KEY'));
```

## Resources

OpenAPI Generator emits typed API classes such as `CustomersApi`, `InvoicesApi`,
and `SubscriptionsApi`. Refer to the generated API docs for the current method
list and model signatures.

## Webhook Verification

```php
<?php

use RevKeen\Webhooks;
use RevKeen\WebhookSignatureVerificationException;

try {
    // $payload must be the untouched request body, before json_decode().
    $event = Webhooks::constructEvent(
        $payload,
        $signature,
        getenv('REVKEEN_WEBHOOK_SECRET')
    );

    if ($event['type'] === 'invoice.paid') {
        echo 'Invoice paid: ' . $event['data']['id'];
    }
} catch (WebhookSignatureVerificationException $e) {
    http_response_code(400);
    echo $e->getMessage();
}
```

## Error Handling

```php
<?php

use RevKeen\ApiException;

try {
    $customer = $customersApi->customersGet('cus_nonexistent');
} catch (ApiException $e) {
    echo "API error {$e->getStatusCode()}: {$e->getMessage()}";
}
```

## Configuration

```php
<?php

use RevKeen\Runtime\ClientFactory;
use RevKeen\Runtime\Environment;

$config = ClientFactory::configuration(Environment::SANDBOX)
    ->setApiKey('x-api-key', getenv('REVKEEN_API_KEY'));

// Custom endpoints require the explicit escape hatch.
$local = ClientFactory::configurationForCustomBaseUrl('http://localhost:4010/v2')
    ->setApiKey('x-api-key', getenv('REVKEEN_API_KEY'));
```

## Compatibility

- **Runtime:** PHP 8.1+
- **Frameworks:** Laravel, Symfony, WordPress, and general PHP
- **PSR-4** autoloading

## Links

- [API Reference](https://docs.revkeen.com/api-reference/openapi)
- [SDK Documentation](https://docs.revkeen.com/docs/developers/sdks/php)
- [TypeScript SDK](https://github.com/revkeen/sdk-typescript)
- [Go SDK](https://github.com/revkeen/sdk-go)
