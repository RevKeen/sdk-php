<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Api\ProductsApi;
use RevKeen\Runtime\ClientFactory;
use RevKeen\Runtime\Environment;

final class SandboxContractTest extends TestCase
{
    public function testListsProductsThroughThePublicClient(): void
    {
        $key = getenv('SDK_SANDBOX_API_KEY');
        if ($key === false || $key === '') {
            self::markTestSkipped('SDK_SANDBOX_API_KEY is only provided by the reviewed release environment.');
        }
        self::assertStringStartsWith('rk_sandbox_', $key);

        $configuration = ClientFactory::configuration(Environment::SANDBOX)->setSecretKey($key);
        $response = (new ProductsApi(config: $configuration))->productsList(limit: 1);

        self::assertNotNull($response);
    }
}
