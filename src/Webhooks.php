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
     * @return array The verified webhook event
     * @throws WebhookSignatureVerificationException If verification fails
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
                'Invalid JSON payload: ' . json_last_error_msg()
            );
        }

        // Basic validation
        if (!isset($event['id'], $event['type'], $event['data'])) {
            throw new WebhookSignatureVerificationException(
                'Invalid event structure: missing required fields'
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
     * @return bool True if the signature is valid
     * @throws WebhookSignatureVerificationException If verification fails
     */
    public static function verifySignature(
        string $payload,
        string $signature,
        string $secret,
        ?int $tolerance = null
    ): bool {
        $tolerance = $tolerance ?? self::TOLERANCE_IN_SECONDS;

        // Check if signature header exists
        if (empty($signature)) {
            throw new WebhookSignatureVerificationException(
                'Missing webhook signature header'
            );
        }

        // Parse signature header
        $parsed = self::parseSignatureHeader($signature);

        // Check timestamp tolerance (prevent replay attacks)
        $currentTime = time();
        $timeDiff = abs($currentTime - $parsed['timestamp']);

        if ($timeDiff > $tolerance) {
            throw new WebhookSignatureVerificationException(
                sprintf(
                    'Timestamp outside tolerance window (%ds > %ds). ' .
                    'The webhook might be a replay attack, or your server\'s clock might be out of sync.',
                    $timeDiff,
                    $tolerance
                )
            );
        }

        // Generate expected signature
        $signedPayload = sprintf('%d.%s', $parsed['timestamp'], $payload);
        $expectedSignature = hash_hmac('sha256', $signedPayload, $secret);

        // Compare signatures using constant-time comparison
        $signatureValid = false;
        foreach ($parsed['signatures'] as $sig) {
            if (hash_equals($expectedSignature, $sig)) {
                $signatureValid = true;
                break;
            }
        }

        if (!$signatureValid) {
            throw new WebhookSignatureVerificationException(
                'Signature verification failed. ' .
                'Ensure you\'re using the correct webhook secret and the raw request body.'
            );
        }

        return true;
    }

    /**
     * Parses a webhook signature header
     * Format: "t={timestamp},v1={signature}"
     *
     * @param string $header The signature header
     * @return array{timestamp: int, signatures: string[]}
     * @throws WebhookSignatureVerificationException If header format is invalid
     */
    private static function parseSignatureHeader(string $header): array
    {
        $parts = explode(',', $header);
        $timestamp = null;
        $signatures = [];

        foreach ($parts as $part) {
            $keyValue = explode('=', $part, 2);
            if (count($keyValue) !== 2) {
                continue;
            }

            [$key, $value] = $keyValue;

            if ($key === 't') {
                $timestamp = (int) $value;
            } elseif ($key === 'v1') {
                $signatures[] = $value;
            }
        }

        if ($timestamp === null || empty($signatures)) {
            throw new WebhookSignatureVerificationException(
                'Invalid signature header: missing timestamp or signature'
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
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
