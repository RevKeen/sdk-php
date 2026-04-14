# RevKeen PHP SDK

[![Packagist Version](https://img.shields.io/packagist/v/revkeen/sdk-php.svg)](https://packagist.org/packages/revkeen/sdk-php)
[![PHP Version](https://img.shields.io/packagist/php-v/revkeen/sdk-php.svg)](https://packagist.org/packages/revkeen/sdk-php)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

Official PHP client for the [RevKeen API](https://docs.revkeen.com/api-reference/openapi) — auto-generated from the OpenAPI specification via [Fern](https://buildwithfern.com).

## Installation

```bash
composer require revkeen/sdk-php
```

Requires PHP 8.1 or later.

## Quick Start

```php
<?php

use RevKeen\Client;

$client = new Client(getenv('REVKEEN_API_KEY'));

$customers = $client->customers->list(['limit' => 10]);

foreach ($customers->data as $customer) {
    echo $customer->name . ' ' . $customer->email . "\n";
}
```

## Authentication

### API Key (recommended for server-to-server)

```php
$client = new Client(getenv('REVKEEN_API_KEY'));
```

### OAuth 2.1 (recommended for MCP and third-party integrations)

```php
$client = new Client(
    options: new ClientOptions(
        oauthClientId: getenv('REVKEEN_CLIENT_ID'),
        oauthClientSecret: getenv('REVKEEN_CLIENT_SECRET'),
        scopes: ['customers:read', 'invoices:read'],
    )
);
```

See the [OAuth guide](https://docs.revkeen.com/docs/developers/oauth) for details.

## Resources

Every API resource is available as a property on the client:

| Resource | Method examples |
|----------|----------------|
| `$client->customers` | `list()`, `create()`, `get()`, `update()`, `delete()` |
| `$client->invoices` | `list()`, `create()`, `get()`, `update()`, `finalize()`, `send()`, `void()` |
| `$client->subscriptions` | `list()`, `create()`, `get()`, `update()`, `cancel()`, `pause()`, `resume()` |
| `$client->products` | `list()`, `create()`, `get()`, `update()`, `delete()` |
| `$client->payments` | `list()`, `create()`, `get()` |
| `$client->checkoutSessions` | `create()`, `get()` |
| `$client->discounts` | `list()`, `create()`, `get()`, `update()`, `delete()` |
| `$client->creditNotes` | `list()`, `create()`, `get()` |
| `$client->paymentLinks` | `list()`, `create()`, `get()`, `update()` |
| `$client->paymentMethods` | `list()`, `get()`, `detach()` |
| `$client->webhookEndpoints` | `list()`, `create()`, `delete()` |
| `$client->events` | `list()`, `get()` |
| `$client->entitlements` | `list()`, `check()` |

## Webhook Verification

```php
<?php

use RevKeen\Webhooks;
use RevKeen\WebhookSignatureVerificationException;

try {
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

use RevKeen\Exceptions\ApiException;

try {
    $customer = $client->customers->get('cus_nonexistent');
} catch (ApiException $e) {
    echo "API error {$e->getStatusCode()}: {$e->getMessage()}";
}
```

## Configuration

```php
<?php

use RevKeen\Client;
use RevKeen\ClientOptions;

$client = new Client(
    apiKey: getenv('REVKEEN_API_KEY'),
    options: new ClientOptions(
        // Staging environment
        baseUrl: 'https://staging-api.revkeen.com',
    )
);
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
