<?php

namespace RevKeen\PaymentAttempts\Analytics;

use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;
use RevKeen\PaymentAttempts\Analytics\Requests\GetDeclinesAnalyticsRequest;
use RevKeen\Types\DeclineAnalyticsResponse;
use RevKeen\Exceptions\RevkeenException;
use RevKeen\Exceptions\RevkeenApiException;
use RevKeen\Core\Json\JsonSerializer;
use RevKeen\Core\Json\JsonApiRequest;
use RevKeen\Environments;
use RevKeen\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;

class AnalyticsClient
{
    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param RawClient $client
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        RawClient $client,
        ?array $options = null,
    ) {
        $this->client = $client;
        $this->options = $options ?? [];
    }

    /**
     * Get decline analytics for the merchant including approval rates, decline categories, and per-gateway breakdown.
     *
     * @param GetDeclinesAnalyticsRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DeclineAnalyticsResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function getDeclines(GetDeclinesAnalyticsRequest $request = new GetDeclinesAnalyticsRequest(), ?array $options = null): DeclineAnalyticsResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->startDate != null) {
            $query['start_date'] = JsonSerializer::serializeDateTime($request->startDate);
        }
        if ($request->endDate != null) {
            $query['end_date'] = JsonSerializer::serializeDateTime($request->endDate);
        }
        if ($request->gateway != null) {
            $query['gateway'] = $request->gateway;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "payment-attempts/analytics/declines",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DeclineAnalyticsResponse::fromJson($json);
            }
        } catch (JsonException $e) {
            throw new RevkeenException(message: "Failed to deserialize response: {$e->getMessage()}", previous: $e);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            if ($response === null) {
                throw new RevkeenException(message: $e->getMessage(), previous: $e);
            }
            throw new RevkeenApiException(
                message: "API request failed",
                statusCode: $response->getStatusCode(),
                body: $response->getBody()->getContents(),
            );
        } catch (ClientExceptionInterface $e) {
            throw new RevkeenException(message: $e->getMessage(), previous: $e);
        }
        throw new RevkeenApiException(
            message: 'API request failed',
            statusCode: $statusCode,
            body: $response->getBody()->getContents(),
        );
    }
}
