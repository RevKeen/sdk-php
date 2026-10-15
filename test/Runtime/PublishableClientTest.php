<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Api\CartSessionsApi;
use RevKeen\Api\PaymentIntentsApi;
use RevKeen\Api\StorefrontApi;
use RevKeen\Configuration;
use RevKeen\Runtime\PublishableClient;

final class PublishableClientTest extends TestCase
{
    public function testPublishableClientExposesOnlyCartAndStorefrontApis(): void
    {
        $client = new PublishableClient(publishable_key: 'rk_pk_sandbox_example123');
        self::assertInstanceOf(CartSessionsApi::class, $client->cartSessions());
        self::assertInstanceOf(StorefrontApi::class, $client->storefront());
        self::assertFalse(method_exists($client, 'paymentIntents'));
    }

    public function testPublishableKeyIsRejectedOutsideAllowedResourcePaths(): void
    {
        $config = (new Configuration())->setPublishableKey('rk_pk_sandbox_example123');

        $this->expectException(\LogicException::class);
        (new PaymentIntentsApi(config: $config))->paymentIntentsCreateRequest();
    }

    public function testPublishableKeyCanBuildStorefrontRequest(): void
    {
        $config = (new Configuration())->setPublishableKey('rk_pk_sandbox_example123');
        $request = (new StorefrontApi(config: $config))->storefrontStatusGetRequest();
        self::assertSame('rk_pk_sandbox_example123', $request->getHeaderLine('x-api-key'));
        self::assertFalse($request->hasHeader('Authorization'));
    }
}
