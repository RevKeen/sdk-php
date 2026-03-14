<?php

namespace RevKeen\Analytics;

use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;
use RevKeen\Analytics\Requests\AnalyticsRevenueGetMrrSummaryRequest;
use RevKeen\Analytics\Types\AnalyticsRevenueGetMrrSummaryResponse;
use RevKeen\Exceptions\RevkeenException;
use RevKeen\Exceptions\RevkeenApiException;
use RevKeen\Core\Json\JsonSerializer;
use RevKeen\Core\Json\JsonApiRequest;
use RevKeen\Environments;
use RevKeen\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use RevKeen\Analytics\Requests\AnalyticsRevenueGetTimeSeriesRequest;
use RevKeen\Analytics\Types\AnalyticsRevenueGetTimeSeriesResponse;
use RevKeen\Analytics\Requests\AnalyticsInvoicesGetArAgingRequest;
use RevKeen\Analytics\Types\AnalyticsInvoicesGetArAgingResponse;
use RevKeen\Analytics\Requests\AnalyticsCollectionsGetDsoRequest;
use RevKeen\Analytics\Types\AnalyticsCollectionsGetDsoResponse;
use RevKeen\Analytics\Requests\AnalyticsCustomersGetLtvRequest;
use RevKeen\Analytics\Types\AnalyticsCustomersGetLtvResponse;
use RevKeen\Analytics\Types\AnalyticsCustomersRetrieveResponse;
use RevKeen\Analytics\Requests\AnalyticsPaymentLinksGetConversionRequest;
use RevKeen\Analytics\Types\AnalyticsPaymentLinksGetConversionResponse;
use RevKeen\Analytics\Requests\AnalyticsCheckoutGetFunnelRequest;
use RevKeen\Analytics\Types\AnalyticsCheckoutGetFunnelResponse;
use RevKeen\Analytics\Requests\AnalyticsCheckoutAbandonmentGetSummaryRequest;
use RevKeen\Analytics\Types\AnalyticsCheckoutAbandonmentGetSummaryResponse;
use RevKeen\Analytics\Requests\AnalyticsCheckoutAbandonmentListRequest;
use RevKeen\Analytics\Types\AnalyticsCheckoutAbandonmentListResponse;
use RevKeen\Analytics\Types\AnalyticsCheckoutWinbackGetSummaryResponse;
use RevKeen\Analytics\Requests\AnalyticsCheckoutWinbackListRequest;
use RevKeen\Analytics\Types\AnalyticsCheckoutWinbackListResponse;

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
     * Get Monthly Recurring Revenue metrics and growth
     *
     * @param AnalyticsRevenueGetMrrSummaryRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsRevenueGetMrrSummaryResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function revenueGetmrrsummary(AnalyticsRevenueGetMrrSummaryRequest $request = new AnalyticsRevenueGetMrrSummaryRequest(), ?array $options = null): AnalyticsRevenueGetMrrSummaryResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->asOfDate != null) {
            $query['asOfDate'] = JsonSerializer::serializeDateTime($request->asOfDate);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/revenue/mrr-summary",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsRevenueGetMrrSummaryResponse::fromJson($json);
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
     * Get revenue data over time with configurable granularity
     *
     * @param AnalyticsRevenueGetTimeSeriesRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsRevenueGetTimeSeriesResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function revenueGettimeseries(AnalyticsRevenueGetTimeSeriesRequest $request, ?array $options = null): AnalyticsRevenueGetTimeSeriesResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['startDate'] = JsonSerializer::serializeDateTime($request->startDate);
        $query['endDate'] = JsonSerializer::serializeDateTime($request->endDate);
        if ($request->granularity != null) {
            $query['granularity'] = $request->granularity;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/revenue/time-series",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsRevenueGetTimeSeriesResponse::fromJson($json);
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
     * Returns Accounts Receivable aging buckets with invoice counts and amounts
     *
     * @param AnalyticsInvoicesGetArAgingRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsInvoicesGetArAgingResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function invoicesGetaraging(AnalyticsInvoicesGetArAgingRequest $request = new AnalyticsInvoicesGetArAgingRequest(), ?array $options = null): AnalyticsInvoicesGetArAgingResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->asOfDate != null) {
            $query['asOfDate'] = JsonSerializer::serializeDateTime($request->asOfDate);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/invoices/ar-aging",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsInvoicesGetArAgingResponse::fromJson($json);
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
     * Calculate DSO and collection health metrics
     *
     * @param AnalyticsCollectionsGetDsoRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCollectionsGetDsoResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function collectionsGetdso(AnalyticsCollectionsGetDsoRequest $request = new AnalyticsCollectionsGetDsoRequest(), ?array $options = null): AnalyticsCollectionsGetDsoResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->startDate != null) {
            $query['startDate'] = JsonSerializer::serializeDateTime($request->startDate);
        }
        if ($request->endDate != null) {
            $query['endDate'] = JsonSerializer::serializeDateTime($request->endDate);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/collections/dso",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCollectionsGetDsoResponse::fromJson($json);
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
     * Calculate customer lifetime value metrics
     *
     * @param AnalyticsCustomersGetLtvRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCustomersGetLtvResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersGetltv(AnalyticsCustomersGetLtvRequest $request = new AnalyticsCustomersGetLtvRequest(), ?array $options = null): AnalyticsCustomersGetLtvResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->topN != null) {
            $query['topN'] = $request->topN;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/customers/ltv",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCustomersGetLtvResponse::fromJson($json);
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
     * Get analytics for a specific customer
     *
     * @param string $customerId Customer UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCustomersRetrieveResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersRetrieve(string $customerId, ?array $options = null): AnalyticsCustomersRetrieveResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/customers/{$customerId}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCustomersRetrieveResponse::fromJson($json);
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
     * Get payment link performance metrics
     *
     * @param AnalyticsPaymentLinksGetConversionRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsPaymentLinksGetConversionResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function paymentlinksGetconversion(AnalyticsPaymentLinksGetConversionRequest $request = new AnalyticsPaymentLinksGetConversionRequest(), ?array $options = null): AnalyticsPaymentLinksGetConversionResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->startDate != null) {
            $query['startDate'] = JsonSerializer::serializeDateTime($request->startDate);
        }
        if ($request->endDate != null) {
            $query['endDate'] = JsonSerializer::serializeDateTime($request->endDate);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/payment-links/conversion",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsPaymentLinksGetConversionResponse::fromJson($json);
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
     * Get stage-by-stage checkout conversion funnel metrics. Shows sessions, drop-offs, and conversion rates at each step.
     *
     * @param AnalyticsCheckoutGetFunnelRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCheckoutGetFunnelResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function checkoutGetfunnel(AnalyticsCheckoutGetFunnelRequest $request = new AnalyticsCheckoutGetFunnelRequest(), ?array $options = null): AnalyticsCheckoutGetFunnelResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->startDate != null) {
            $query['startDate'] = JsonSerializer::serializeDateTime($request->startDate);
        }
        if ($request->endDate != null) {
            $query['endDate'] = JsonSerializer::serializeDateTime($request->endDate);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/checkout/funnel",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCheckoutGetFunnelResponse::fromJson($json);
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
     * Get aggregated abandonment alert metrics by status and severity
     *
     * @param AnalyticsCheckoutAbandonmentGetSummaryRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCheckoutAbandonmentGetSummaryResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function checkoutAbandonmentGetsummary(AnalyticsCheckoutAbandonmentGetSummaryRequest $request = new AnalyticsCheckoutAbandonmentGetSummaryRequest(), ?array $options = null): AnalyticsCheckoutAbandonmentGetSummaryResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->startDate != null) {
            $query['startDate'] = JsonSerializer::serializeDateTime($request->startDate);
        }
        if ($request->endDate != null) {
            $query['endDate'] = JsonSerializer::serializeDateTime($request->endDate);
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/checkout/abandonment/summary",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCheckoutAbandonmentGetSummaryResponse::fromJson($json);
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
     * Get paginated list of abandonment alerts with filtering
     *
     * @param AnalyticsCheckoutAbandonmentListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCheckoutAbandonmentListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function checkoutAbandonmentList(AnalyticsCheckoutAbandonmentListRequest $request = new AnalyticsCheckoutAbandonmentListRequest(), ?array $options = null): AnalyticsCheckoutAbandonmentListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->severity != null) {
            $query['severity'] = $request->severity;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['pageSize'] = $request->pageSize;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/checkout/abandonment",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCheckoutAbandonmentListResponse::fromJson($json);
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
     * Get aggregated winback opportunity metrics by type and status
     *
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCheckoutWinbackGetSummaryResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function checkoutWinbackGetsummary(?array $options = null): AnalyticsCheckoutWinbackGetSummaryResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/checkout/winback/summary",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCheckoutWinbackGetSummaryResponse::fromJson($json);
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
     * Get paginated list of winback opportunities with filtering
     *
     * @param AnalyticsCheckoutWinbackListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return AnalyticsCheckoutWinbackListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function checkoutWinbackList(AnalyticsCheckoutWinbackListRequest $request = new AnalyticsCheckoutWinbackListRequest(), ?array $options = null): AnalyticsCheckoutWinbackListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->type != null) {
            $query['type'] = $request->type;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->minValueCents != null) {
            $query['minValueCents'] = $request->minValueCents;
        }
        if ($request->page != null) {
            $query['page'] = $request->page;
        }
        if ($request->pageSize != null) {
            $query['pageSize'] = $request->pageSize;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "analytics/checkout/winback",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return AnalyticsCheckoutWinbackListResponse::fromJson($json);
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
