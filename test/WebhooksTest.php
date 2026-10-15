<?php

declare(strict_types=1);

namespace RevKeen\Test;

use PHPUnit\Framework\TestCase;
use RevKeen\Webhooks;
use RevKeen\WebhookSignatureVerificationException;

final class WebhooksTest extends TestCase
{
    public function testSharedFixturePinsTheProductionSigningBytes(): void
    {
        $fixture = $this->fixture();

        self::assertSame(
            $fixture['valid']['signature'],
            hash_hmac(
                'sha256',
                sprintf('%d.%s', $fixture['valid']['timestamp'], $fixture['rawPayload']),
                $fixture['secret']
            )
        );
    }

    public function testVerifiesAValidRawPayloadAndReturnsVoid(): void
    {
        $fixture = $this->fixture();
        $payload = $fixture['rawPayload'];
        $timestamp = time();

        Webhooks::verifySignature(
            $payload,
            $this->signatureHeader($payload, $timestamp, $fixture['secret']),
            $fixture['secret']
        );
        self::addToAssertionCount(1);
    }

    public function testConstructEventVerifiesRawPayloadBeforeDecoding(): void
    {
        $fixture = $this->fixture();
        $rawPayload = $fixture['rawPayload'];
        $timestamp = time();
        $header = $this->signatureHeader($rawPayload, $timestamp, $fixture['secret']);

        self::assertSame('evt_123', Webhooks::constructEvent($rawPayload, $header, $fixture['secret'])['id']);

        try {
            Webhooks::constructEvent(
                $fixture['reserializedPayload'],
                $header,
                $fixture['secret']
            );
            self::fail('Expected re-serializing the signed body to invalidate the signature.');
        } catch (WebhookSignatureVerificationException $exception) {
            self::assertSame(WebhookSignatureVerificationException::SIGNATURE_MISMATCH, $exception->reasonCode);
        }

        try {
            Webhooks::constructEvent($fixture['tamperedPayload'], $header, $fixture['secret']);
            self::fail('Expected modifying the signed body to invalidate the signature.');
        } catch (WebhookSignatureVerificationException $exception) {
            self::assertSame(WebhookSignatureVerificationException::SIGNATURE_MISMATCH, $exception->reasonCode);
        }
    }

    public function testAcceptsAnyValidV1Signature(): void
    {
        $fixture = $this->fixture();
        $payload = $fixture['rawPayload'];
        $timestamp = time();
        $validHeader = $this->signatureHeader($payload, $timestamp, $fixture['secret']);

        Webhooks::verifySignature(
            $payload,
            $validHeader . ',v1=' . str_repeat('0', 64),
            $fixture['secret']
        );
        self::addToAssertionCount(1);
    }

    /** @dataProvider invalidSignatureProvider */
    public function testReturnsStableReasonCodes(
        string $signature,
        string $expectedReason,
        ?int $tolerance = null
    ): void {
        try {
            Webhooks::verifySignature('{}', $signature, $this->fixture()['secret'], $tolerance);
            self::fail('Expected webhook signature verification to fail.');
        } catch (WebhookSignatureVerificationException $exception) {
            self::assertSame($expectedReason, $exception->reasonCode);
        }
    }

    /** @return array<string, array{string, string, int|null}> */
    public static function invalidSignatureProvider(): array
    {
        $now = time();

        return [
            'missing signature' => ['', 'missing_signature', null],
            'malformed header' => ['not-a-pair', 'invalid_signature_header', null],
            'missing timestamp' => ['v1=' . str_repeat('0', 64), 'invalid_signature_header', null],
            'malformed timestamp' => ['t=1.5,v1=' . str_repeat('0', 64), 'invalid_timestamp', null],
            'zero timestamp' => ['t=0,v1=' . str_repeat('0', 64), 'invalid_timestamp', null],
            'negative tolerance' => ['t=1,v1=' . str_repeat('0', 64), 'invalid_timestamp', -1],
            'expired timestamp' => ['t=' . ($now - 3600) . ',v1=' . str_repeat('0', 64), 'timestamp_outside_tolerance', 300],
            'future timestamp' => ['t=' . ($now + 3600) . ',v1=' . str_repeat('0', 64), 'timestamp_outside_tolerance', 300],
            'malformed hex' => ['t=' . $now . ',v1=not-hex', 'invalid_signature_encoding', null],
            'wrong signature' => ['t=' . $now . ',v1=' . str_repeat('0', 64), 'signature_mismatch', null],
        ];
    }

    public function testInvalidJsonHasAStablePayloadReasonAfterValidVerification(): void
    {
        $fixture = $this->fixture();
        $payload = '{invalid json';
        $timestamp = time();

        try {
            Webhooks::constructEvent(
                $payload,
                $this->signatureHeader($payload, $timestamp, $fixture['secret']),
                $fixture['secret']
            );
            self::fail('Expected invalid JSON to be rejected.');
        } catch (WebhookSignatureVerificationException $exception) {
            self::assertSame(WebhookSignatureVerificationException::INVALID_PAYLOAD, $exception->reasonCode);
        }
    }

    private function signatureHeader(string $payload, int $timestamp, string $secret): string
    {
        return sprintf(
            't=%d,v1=%s',
            $timestamp,
            hash_hmac('sha256', sprintf('%d.%s', $timestamp, $payload), $secret)
        );
    }

    /** @return array<string, mixed> */
    private function fixture(): array
    {
        $generatedPath = __DIR__ . '/Fixtures/webhook-signature-fixtures.json';
        $sourcePath = __DIR__ . '/../contracts/webhook-signature-fixtures.json';
        $path = is_file($generatedPath) ? $generatedPath : $sourcePath;
        $contents = file_get_contents($path);
        self::assertNotFalse($contents);

        $fixture = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);
        self::assertIsArray($fixture);

        return $fixture;
    }
}
