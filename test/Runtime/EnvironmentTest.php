<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Runtime\ClientFactory;
use RevKeen\Runtime\Environment;

final class EnvironmentTest extends TestCase
{
    public function testNamedEnvironmentsMapToCanonicalBaseUrls(): void
    {
        self::assertSame(
            'https://staging-api.revkeen.com/v2',
            ClientFactory::configuration(Environment::SANDBOX)->getHost()
        );
        self::assertSame(
            'https://api.revkeen.com/v2',
            ClientFactory::configuration(Environment::PRODUCTION)->getHost()
        );
    }

    public function testCustomBaseUrlRequiresAnExplicitFactory(): void
    {
        self::assertSame(
            'http://localhost:4010/v2',
            ClientFactory::configurationForCustomBaseUrl('http://localhost:4010/v2///')->getHost()
        );
    }

    public function testCustomBaseUrlRejectsInvalidUrls(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ClientFactory::configurationForCustomBaseUrl('not a URL');
    }

    /** @dataProvider customBaseUrlWithSuffixProvider */
    public function testCustomBaseUrlRejectsQueryAndFragment(string $base_url): void
    {
        $this->expectException(\InvalidArgumentException::class);
        ClientFactory::configurationForCustomBaseUrl($base_url);
    }

    /** @return array<string, array{string}> */
    public static function customBaseUrlWithSuffixProvider(): array
    {
        return [
            'query' => ['https://example.test/v2?tenant=merchant_123'],
            'fragment' => ['https://example.test/v2#section'],
        ];
    }
}
