<?php

declare(strict_types=1);

namespace RevKeen\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use RevKeen\Api\CartSessionsApi;
use RevKeen\Api\StorefrontApi;
use RevKeen\Configuration;

final class PublishableClient
{
    private ClientInterface $client;
    private Configuration $config;

    public function __construct(
        string $publishable_key,
        ?ClientInterface $client = null,
        ?Configuration $config = null
    ) {
        $this->client = $client ?? new Client();
        $this->config = ($config ?? new Configuration())->setPublishableKey($publishable_key);
    }

    public function cartSessions(): CartSessionsApi
    {
        return new CartSessionsApi($this->client, $this->config);
    }

    public function storefront(): StorefrontApi
    {
        return new StorefrontApi($this->client, $this->config);
    }
}
