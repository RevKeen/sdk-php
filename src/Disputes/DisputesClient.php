<?php

namespace RevKeen\Disputes;

use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;
use RevKeen\Disputes\Requests\DisputesListRequest;
use RevKeen\Disputes\Types\DisputesListResponse;
use RevKeen\Exceptions\RevkeenException;
use RevKeen\Exceptions\RevkeenApiException;
use RevKeen\Core\Json\JsonApiRequest;
use RevKeen\Environments;
use RevKeen\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use RevKeen\Disputes\Requests\DisputesGetOpenRequest;
use RevKeen\Disputes\Types\DisputesGetOpenResponse;
use RevKeen\Disputes\Types\DisputesRetrieveResponse;

class DisputesClient
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
     * Retrieve a paginated list of disputes/chargebacks with optional filters. Results are ordered by disputed date (newest first).
     *
     * @param DisputesListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DisputesListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function list(DisputesListRequest $request = new DisputesListRequest(), ?array $options = null): DisputesListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->resolution != null) {
            $query['resolution'] = $request->resolution;
        }
        if ($request->paymentId != null) {
            $query['payment_id'] = $request->paymentId;
        }
        if ($request->gateway != null) {
            $query['gateway'] = $request->gateway;
        }
        if ($request->disputedAfter != null) {
            $query['disputed_after'] = $request->disputedAfter;
        }
        if ($request->disputedBefore != null) {
            $query['disputed_before'] = $request->disputedBefore;
        }
        if ($request->needsEvidence != null) {
            $query['needs_evidence'] = $request->needsEvidence;
        }
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        if ($request->offset != null) {
            $query['offset'] = $request->offset;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "disputes",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DisputesListResponse::fromJson($json);
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
     * Retrieve disputes that need evidence submission, ordered by due date (most urgent first). Use this to prioritize dispute responses.
     *
     * @param DisputesGetOpenRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DisputesGetOpenResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function getopen(DisputesGetOpenRequest $request = new DisputesGetOpenRequest(), ?array $options = null): DisputesGetOpenResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->limit != null) {
            $query['limit'] = $request->limit;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "disputes/open",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DisputesGetOpenResponse::fromJson($json);
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
     * Retrieve a single dispute by its public ID (dsp_xxx) or internal UUID.
     *
     * @param string $id Dispute public ID (dsp_xxx) or UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return DisputesRetrieveResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function retrieve(string $id, ?array $options = null): DisputesRetrieveResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "disputes/{$id}",
                    method: HttpMethod::GET,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return DisputesRetrieveResponse::fromJson($json);
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
