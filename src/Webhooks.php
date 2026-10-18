<?php

declare(strict_types=1);

namespace RevKeen;

/**
 * RevKeen Webhook Utilities for PHP SDK
 *
 * This file is automatically bundled with the generated SDK.
 * It provides webhook signature verification and event construction.
 *
 * @example
 * ```php
 * use RevKeen\Webhooks;
 * use RevKeen\WebhookSignatureVerificationException;
 *
 * // Get the raw request body (important: must be raw, not decoded)
 * $payload = file_get_contents('php://input');
 * $signature = $_SERVER['HTTP_REVKEEN_SIGNATURE'] ?? '';
 * $webhookSecret = getenv('REVKEEN_WEBHOOK_SECRET');
 *
 * try {
 *     $event = Webhooks::constructEvent($payload, $signature, $webhookSecret);
 *
 *     switch ($event['type']) {
 *         case 'invoice.paid':
 *             $invoice = $event['data']['object'];
 *             // Handle invoice paid...
 *             break;
 *         case 'subscription.created':
 *             $subscription = $event['data']['object'];
 *             // Handle subscription created...
 *             break;
 *     }
 *
 *     http_response_code(200);
 *     echo json_encode(['received' => true]);
 * } catch (WebhookSignatureVerificationException $e) {
 *     http_response_code(400);
 *     echo json_encode(['error' => 'Invalid signature']);
 * }
 * ```
 */
class Webhooks
{
    /**
     * Default tolerance for timestamp validation (5 minutes)
     */
    public const TOLERANCE_IN_SECONDS = 300;

    /**
     * Constructs and verifies a webhook event from a raw payload
     *
     * @param string $payload   The raw request body
     * @param string $signature The signature header value (revkeen-signature)
     * @param string $secret    Your webhook secret (starts with rk_wh_)
     * @param int|null $tolerance Tolerance in seconds (default: 300)
     * @throws WebhookSignatureVerificationException If verification fails
     * @return array The verified webhook event
     *
     * @example
     * ```php
     * // WordPress example
     * add_action('rest_api_init', function () {
     *     register_rest_route('revkeen/v1', '/webhook', [
     *         'methods' => 'POST',
     *         'callback' => function ($request) {
     *             $payload = $request->get_body();
     *             $signature = $request->get_header('revkeen-signature');
     *
     *             $event = Webhooks::constructEvent(
     *                 $payload,
     *                 $signature,
     *                 get_option('revkeen_webhook_secret')
     *             );
     *
     *             // Handle event...
     *             return new WP_REST_Response(['received' => true]);
     *         },
     *         'permission_callback' => '__return_true',
     *     ]);
     * });
     * ```
     *
     * @example
     * ```php
     * // Laravel example
     * Route::post('/webhook/revkeen', function (Request $request) {
     *     $event = Webhooks::constructEvent(
     *         $request->getContent(),
     *         $request->header('revkeen-signature'),
     *         config('services.revkeen.webhook_secret')
     *     );
     *
     *     // Handle event...
     *     return response()->json(['received' => true]);
     * });
     * ```
     */
    public static function constructEvent(
        string $payload,
        string $signature,
        string $secret,
        ?int $tolerance = null
    ): array {
        // Verify the signature
        self::verifySignature($payload, $signature, $secret, $tolerance);

        // Parse and return the event
        $event = json_decode($payload, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new WebhookSignatureVerificationException(
                'Invalid JSON payload: ' . json_last_error_msg(),
                WebhookSignatureVerificationException::INVALID_PAYLOAD
            );
        }

        // Basic validation
        if (!isset($event['id'], $event['type'], $event['data'])) {
            throw new WebhookSignatureVerificationException(
                'Invalid event structure: missing required fields',
                WebhookSignatureVerificationException::INVALID_PAYLOAD
            );
        }

        return $event;
    }

    /**
     * Verifies a webhook signature
     *
     * @param string $payload   The raw request body
     * @param string $signature The signature header value
     * @param string $secret    Your webhook secret
     * @param int|null $tolerance Tolerance in seconds (default: 300)
     * @throws WebhookSignatureVerificationException If verification fails
     */
    public static function verifySignature(
        string $payload,
        string $signature,
        string $secret,
        ?int $tolerance = null
    ): void {
        $tolerance = $tolerance ?? self::TOLERANCE_IN_SECONDS;

        if ($tolerance < 0) {
            throw new WebhookSignatureVerificationException(
                'Webhook timestamp tolerance must be non-negative.',
                WebhookSignatureVerificationException::INVALID_TIMESTAMP
            );
        }

        // Check if signature header exists
        if ($signature === '') {
            throw new WebhookSignatureVerificationException(
                'Missing webhook signature header',
                WebhookSignatureVerificationException::MISSING_SIGNATURE
            );
        }

        // Parse signature header
        $parsed = self::parseSignatureHeader($signature);

        // Check timestamp tolerance (prevent replay attacks)
        $currentTime = time();
        $timestamp = $parsed['timestamp'];
        $timeDiff = abs($currentTime - $timestamp);
        if ($timeDiff > $tolerance) {
            throw new WebhookSignatureVerificationException(
                sprintf(
                    'Timestamp outside tolerance window (%ds > %ds). ' .
                    'The webhook might be a replay attack, or your server\'s clock might be out of sync.',
                    $timeDiff,
                    $tolerance
                ),
                WebhookSignatureVerificationException::TIMESTAMP_OUTSIDE_TOLERANCE
            );
        }

        // Generate expected signature
        $signedPayload = sprintf('%d.%s', $timestamp, $payload);
        $expectedSignature = hash_hmac('sha256', $signedPayload, $secret, true);

        // Compare signatures using constant-time comparison
        $signatureValid = false;
        foreach ($parsed['signatures'] as $sig) {
            $candidate = hex2bin($sig);
            if ($candidate !== false && hash_equals($expectedSignature, $candidate)) {
                $signatureValid = true;
                break;
            }
        }

        if (!$signatureValid) {
            throw new WebhookSignatureVerificationException(
                'Signature verification failed. ' .
                'Ensure you\'re using the correct webhook secret and the raw request body.',
                WebhookSignatureVerificationException::SIGNATURE_MISMATCH
            );
        }
    }

    /**
     * Parses a webhook signature header
     * Format: "t={timestamp},v1={signature}"
     *
     * @param string $header The signature header
     * @throws WebhookSignatureVerificationException If header format is invalid
     * @return array{timestamp: int, signatures: string[]}
     */
    private static function parseSignatureHeader(string $header): array
    {
        $parts = explode(',', $header);
        $timestamp = null;
        $signatures = [];

        foreach ($parts as $part) {
            $keyValue = explode('=', $part, 2);
            if (count($keyValue) !== 2) {
                throw new WebhookSignatureVerificationException(
                    'Invalid signature header format',
                    WebhookSignatureVerificationException::INVALID_SIGNATURE_HEADER
                );
            }

            [$key, $value] = $keyValue;

            if ($key === 't') {
                if ($timestamp !== null) {
                    throw new WebhookSignatureVerificationException(
                        'Invalid signature header: multiple timestamps',
                        WebhookSignatureVerificationException::INVALID_SIGNATURE_HEADER
                    );
                }

                if (preg_match('/^[0-9]+$/D', $value) !== 1) {
                    throw new WebhookSignatureVerificationException(
                        'Invalid webhook signature timestamp',
                        WebhookSignatureVerificationException::INVALID_TIMESTAMP
                    );
                }

                $validatedTimestamp = filter_var(
                    $value,
                    FILTER_VALIDATE_INT,
                    ['options' => ['min_range' => 1]]
                );
                if ($validatedTimestamp === false) {
                    throw new WebhookSignatureVerificationException(
                        'Invalid webhook signature timestamp',
                        WebhookSignatureVerificationException::INVALID_TIMESTAMP
                    );
                }
                $timestamp = $validatedTimestamp;
            } elseif ($key === 'v1') {
                if (preg_match('/^[0-9a-fA-F]{64}$/D', $value) !== 1) {
                    throw new WebhookSignatureVerificationException(
                        'Invalid webhook signature encoding',
                        WebhookSignatureVerificationException::INVALID_SIGNATURE_ENCODING
                    );
                }
                $signatures[] = $value;
            }
        }

        if ($timestamp === null || empty($signatures)) {
            throw new WebhookSignatureVerificationException(
                'Invalid signature header: missing timestamp or signature',
                WebhookSignatureVerificationException::INVALID_SIGNATURE_HEADER
            );
        }

        return [
            'timestamp' => $timestamp,
            'signatures' => $signatures,
        ];
    }
}

/**
 * Exception thrown when webhook signature verification fails
 */
class WebhookSignatureVerificationException extends \Exception
{
    public const MISSING_SIGNATURE = 'missing_signature';
    public const INVALID_SIGNATURE_HEADER = 'invalid_signature_header';
    public const INVALID_TIMESTAMP = 'invalid_timestamp';
    public const TIMESTAMP_OUTSIDE_TOLERANCE = 'timestamp_outside_tolerance';
    public const INVALID_SIGNATURE_ENCODING = 'invalid_signature_encoding';
    public const SIGNATURE_MISMATCH = 'signature_mismatch';
    public const INVALID_PAYLOAD = 'invalid_payload';

    public readonly string $reasonCode;

    public function __construct(string $message, string $reasonCode)
    {
        parent::__construct($message);
        $this->reasonCode = $reasonCode;
    }
}
