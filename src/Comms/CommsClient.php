<?php

namespace RevKeen\Comms;

use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;
use RevKeen\Comms\Requests\CommsMessagesSendRequest;
use RevKeen\Comms\Types\CommsMessagesSendResponse;
use RevKeen\Exceptions\RevkeenException;
use RevKeen\Exceptions\RevkeenApiException;
use RevKeen\Core\Json\JsonApiRequest;
use RevKeen\Environments;
use RevKeen\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use RevKeen\Comms\Requests\CommsThreadsListRequest;
use RevKeen\Comms\Types\CommsThreadsListResponse;
use RevKeen\Comms\Requests\CommsMessagesListRequest;
use RevKeen\Comms\Types\CommsMessagesListResponse;

class CommsClient
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
     * Send a direct message to a customer via email, SMS, or WhatsApp
     *
     * @param CommsMessagesSendRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CommsMessagesSendResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function messagesSend(CommsMessagesSendRequest $request, ?array $options = null): CommsMessagesSendResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "comms/send",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CommsMessagesSendResponse::fromJson($json);
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
     * List conversation threads for the authenticated merchant
     *
     * @param CommsThreadsListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CommsThreadsListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function threadsList(CommsThreadsListRequest $request = new CommsThreadsListRequest(), ?array $options = null): CommsThreadsListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->customerId != null) {
            $query['customerId'] = $request->customerId;
        }
        if ($request->status != null) {
            $query['status'] = $request->status;
        }
        if ($request->channel != null) {
            $query['channel'] = $request->channel;
        }
        if ($request->invoiceId != null) {
            $query['invoiceId'] = $request->invoiceId;
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
                    path: "comms/threads",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CommsThreadsListResponse::fromJson($json);
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
     * List all messages in a conversation thread
     *
     * @param string $threadId Thread UUID
     * @param CommsMessagesListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CommsMessagesListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function messagesList(string $threadId, CommsMessagesListRequest $request = new CommsMessagesListRequest(), ?array $options = null): CommsMessagesListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
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
                    path: "comms/threads/{$threadId}/messages",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CommsMessagesListResponse::fromJson($json);
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
