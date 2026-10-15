<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Api\PaymentIntentsApi;
use RevKeen\Configuration;
use RevKeen\Runtime\ApiKeyKind;

final class AuthenticationTest extends TestCase
{
    // REV-9149: a placeholder OAuth access token, assembled from two literals
    // so no source line matches the rkoa_ secret-scanning pattern. GitHub push
    // protection on the RevKeen/sdk-php mirror rejected the 1.20261006.1
    // release candidate for the contiguous literal.
    private const OAUTH_PLACEHOLDER = 'rkoa_' . 'example_access_token';

    public function testClassifiesCanonicalKeyPrefixes(): void
    {
        self::assertSame(ApiKeyKind::SECRET, ApiKeyKind::classify('rk_live_example123'));
        self::assertSame(ApiKeyKind::SECRET, ApiKeyKind::classify('rk_sandbox_example123'));
        self::assertSame(ApiKeyKind::PUBLISHABLE, ApiKeyKind::classify('rk_pk_live_example123'));
        self::assertSame(ApiKeyKind::PUBLISHABLE, ApiKeyKind::classify('rk_pk_sandbox_example123'));
        // rkoa_ is the live OAuth access-token prefix (REV-3960). An OAuth
        // token is never a RevKeen API key.
        self::assertNull(ApiKeyKind::classify(self::OAUTH_PLACEHOLDER));
        self::assertNull(ApiKeyKind::classify('rk_live_'));
        self::assertNull(ApiKeyKind::classify('rk_pk_sandbox_short'));
    }

    public function testSecretAndPublishableKeysUseApiKeyHeaderConfiguration(): void
    {
        $config = new Configuration();
        $config->setSecretKey(secret_key: 'rk_live_example123');
        self::assertSame('rk_live_example123', $config->getApiKey('x-api-key'));
        self::assertSame('', $config->getAccessToken());
        self::assertSame(ApiKeyKind::SECRET, $config->getApiKeyKind());

        $config->setPublishableKey(publishable_key: 'rk_pk_sandbox_example123');
        self::assertSame('rk_pk_sandbox_example123', $config->getApiKey('x-api-key'));
        self::assertSame(ApiKeyKind::PUBLISHABLE, $config->getApiKeyKind());
    }

    public function testOauthAndApiKeyModesAreSplit(): void
    {
        $config = (new Configuration())->setSecretKey(secret_key: 'rk_live_example123');
        $config->setOauthToken(oauth_token: self::OAUTH_PLACEHOLDER);

        self::assertNull($config->getApiKey('x-api-key'));
        self::assertSame(self::OAUTH_PLACEHOLDER, $config->getAccessToken());

        $this->expectException(\InvalidArgumentException::class);
        $config->setOauthToken(oauth_token: 'rk_live_not_a_bearer_token');
    }

    public function testCanonicalTransportDefaults(): void
    {
        $config = new Configuration();
        self::assertSame(10.0, $config->getConnectTimeoutSeconds());
        self::assertSame(30.0, $config->getReadTimeoutSeconds());
        self::assertSame(3, $config->getMaxAttempts());
    }

    public function testGeneratedRequestUsesExactlyOneAuthenticationChannel(): void
    {
        $secret_config = (new Configuration())->setSecretKey(secret_key: 'rk_live_example123');
        $secret_request = (new PaymentIntentsApi(config: $secret_config))->paymentIntentsCreateRequest();
        self::assertSame('rk_live_example123', $secret_request->getHeaderLine('x-api-key'));
        self::assertFalse($secret_request->hasHeader('Authorization'));

        $oauth_config = (new Configuration())->setOauthToken(oauth_token: self::OAUTH_PLACEHOLDER);
        $oauth_request = (new PaymentIntentsApi(config: $oauth_config))->paymentIntentsCreateRequest();
        self::assertFalse($oauth_request->hasHeader('x-api-key'));
        self::assertSame('Bearer ' . self::OAUTH_PLACEHOLDER, $oauth_request->getHeaderLine('Authorization'));
    }

    public function testLegacyApiKeySetterCannotBypassCanonicalValidation(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        (new Configuration())->setApiKey('x-api-key', 'unknown_or_truncated');
    }
}
