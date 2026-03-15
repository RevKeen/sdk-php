<?php

namespace RevKeen\Usage;

use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;
use RevKeen\Usage\Requests\ListEventsUsageRequest;
use RevKeen\Types\UsageEventListResponse;
use RevKeen\Exceptions\RevkeenException;
use RevKeen\Exceptions\RevkeenApiException;
use RevKeen\Core\Json\JsonApiRequest;
use RevKeen\Environments;
use RevKeen\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use RevKeen\Types\BatchIngestRequest;
use RevKeen\Types\BatchIngestResult;
use RevKeen\Types\DryRunResult;
use RevKeen\Usage\Requests\AggregateUsageRequest;
use RevKeen\Types\UsageAggregateResponse;
use RevKeen\Usage\Requests\GetBalanceUsageRequest;
use RevKeen\Types\UsageBalanceResponse;

class UsageClient
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
     * List usage events with optional filters. Returns up to 100 events per request.
     *
     * @param ListEventsUsageRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UsageEventListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function listEvents(ListEventsUsageRequest $request = new ListEventsUsageRequest(), ?array $options = null): UsageEventListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->meterId != null) {
            $query['meter_id'] = $request->meterId;
        }
        if ($request->customerId != null) {
            $query['customer_id'] = $request->customerId;
        }
        if ($request->externalCustomerId != null) {
            $query['external_customer_id'] = $request->externalCustomerId;
        }
        if ($request->subscriptionId != null) {
            $query['subscription_id'] = $request->subscriptionId;
        }
        if ($request->startTime != null) {
            $query['start_time'] = $request->startTime;
        }
        if ($request->endTime != null) {
            $query['end_time'] = $request->endTime;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "usage-events",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UsageEventListResponse::fromJson($json);
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

    /**
     * Send usage events for billing. Accepts a single event or a batch of up to 1000 events.
     *
     * **Single event:** Send the event object directly in the request body.
     * **Batch:** Wrap events in an `events` array.
     *
     * Events are matched to meters by `name` (event name) or `meter_id`. At least one of `customer_id`, `external_customer_id`, or `subscription_id` is required.
     *
     * @param BatchIngestRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return BatchIngestResult
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function ingest(BatchIngestRequest $request, ?array $options = null): BatchIngestResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "usage-events",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return BatchIngestResult::fromJson($json);
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

    /**
     * Validate usage events without persisting them. Returns acceptance/rejection reasons that mirror real ingestion rules.
     *
     * @param BatchIngestRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DryRunResult
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function dryRun(BatchIngestRequest $request, ?array $options = null): DryRunResult
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "usage-events/dry-run",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DryRunResult::fromJson($json);
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

    /**
     * Get aggregated usage for a specific meter over a time range. Returns the computed value using the meter's aggregation method.
     *
     * @param string $meterId Meter ID
     * @param AggregateUsageRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UsageAggregateResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function aggregate(string $meterId, AggregateUsageRequest $request, ?array $options = null): UsageAggregateResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['start_time'] = $request->startTime;
        $query['end_time'] = $request->endTime;
        if ($request->customerId != null) {
            $query['customer_id'] = $request->customerId;
        }
        if ($request->externalCustomerId != null) {
            $query['external_customer_id'] = $request->externalCustomerId;
        }
        if ($request->subscriptionId != null) {
            $query['subscription_id'] = $request->subscriptionId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "usage-events/aggregate/{$meterId}",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UsageAggregateResponse::fromJson($json);
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

    /**
     * Returns the current usage balance for a customer or subscription in the active billing period. Shows per-meter breakdown with included allowance, overage, estimated charges, and margin data.
     *
     * @param GetBalanceUsageRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return UsageBalanceResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function getBalance(GetBalanceUsageRequest $request = new GetBalanceUsageRequest(), ?array $options = null): UsageBalanceResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->subscriptionId != null) {
            $query['subscription_id'] = $request->subscriptionId;
        }
        if ($request->customerId != null) {
            $query['customer_id'] = $request->customerId;
        }
        if ($request->externalCustomerId != null) {
            $query['external_customer_id'] = $request->externalCustomerId;
        }
        if ($request->meterId != null) {
            $query['meter_id'] = $request->meterId;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "usage/balance",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return UsageBalanceResponse::fromJson($json);
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
