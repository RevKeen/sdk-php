<?php

declare(strict_types=1);

namespace RevKeen\Test\Runtime;

use PHPUnit\Framework\TestCase;
use RevKeen\Api\MandatesApi;
use RevKeen\Api\PaymentIntentsApi;
use RevKeen\Runtime\RequestOptions;

final class NamedArgumentCompatibilityTest extends TestCase
{
    public function testPaymentCreationKeepsLegacyParametersBeforeRuntimeTail(): void
    {
        $parameters = array_map(
            static fn (\ReflectionParameter $parameter): string => $parameter->getName(),
            (new \ReflectionMethod(PaymentIntentsApi::class, 'paymentIntentsCreate'))->getParameters()
        );

        self::assertSame('create_payment_intent_request', $parameters[0]);
        self::assertSame('contentType', $parameters[1]);
        self::assertSame('idempotency_key', $parameters[2]);
        self::assertSame('request_options', $parameters[3]);
    }

    public function testRuntimeOptionsUseSnakeCaseNamedArguments(): void
    {
        $options = new RequestOptions(
            connect_timeout_seconds: 1.5,
            read_timeout_seconds: 4.0,
            request_id: 'request_test_123',
            trace_id: 'trace_test_123'
        );

        self::assertSame(1.5, $options->connect_timeout_seconds);
        self::assertSame(4.0, $options->read_timeout_seconds);
    }

    public function testRequiredMandateIdempotencyKeyUsesCompatibleNullableTailAndPreflight(): void
    {
        $method = new \ReflectionMethod(MandatesApi::class, 'mandatesCreate');
        $parameters = $method->getParameters();
        self::assertSame('create_mandate_request', $parameters[0]->getName());
        self::assertSame('contentType', $parameters[1]->getName());
        self::assertSame('idempotency_key', $parameters[2]->getName());
        self::assertTrue($parameters[2]->allowsNull());
        self::assertTrue($parameters[2]->isDefaultValueAvailable());
        self::assertNull($parameters[2]->getDefaultValue());

        $this->expectException(\InvalidArgumentException::class);
        (new MandatesApi())->mandatesCreateRequest(create_mandate_request: null);
    }
}
