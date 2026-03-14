<?php

namespace RevKeen\Entitlements;

use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;
use RevKeen\Entitlements\Requests\CustomersEntitlementsListRequest;
use RevKeen\Entitlements\Types\CustomersEntitlementsListResponse;
use RevKeen\Exceptions\RevkeenException;
use RevKeen\Exceptions\RevkeenApiException;
use RevKeen\Core\Json\JsonApiRequest;
use RevKeen\Environments;
use RevKeen\Core\Client\HttpMethod;
use JsonException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Client\ClientExceptionInterface;
use RevKeen\Entitlements\Requests\CustomersEntitlementsGrantRequest;
use RevKeen\Entitlements\Types\CustomersEntitlementsGrantResponse;
use RevKeen\Entitlements\Requests\CustomersEntitlementsRevokeByKeyRequest;
use RevKeen\Entitlements\Types\CustomersEntitlementsRevokeByKeyResponse;
use RevKeen\Entitlements\Requests\CustomersEntitlementsCheckRequest;
use RevKeen\Entitlements\Types\CustomersEntitlementsCheckResponse;
use RevKeen\Entitlements\Types\CustomersEntitlementsRevokeByIdResponse;

class EntitlementsClient
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
     * Retrieve all entitlements (benefits/features) for a specific customer. Includes computed access status based on subscription state.
     *
     * @param string $customerId Customer UUID
     * @param CustomersEntitlementsListRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CustomersEntitlementsListResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersEntitlementsList(string $customerId, CustomersEntitlementsListRequest $request = new CustomersEntitlementsListRequest(), ?array $options = null): CustomersEntitlementsListResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->includeExpired != null) {
            $query['includeExpired'] = $request->includeExpired;
        }
        if ($request->benefitType != null) {
            $query['benefitType'] = $request->benefitType;
        }
        if ($request->category != null) {
            $query['category'] = $request->category;
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
                    path: "customers/{$customerId}/entitlements",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CustomersEntitlementsListResponse::fromJson($json);
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
     * Grant a benefit/entitlement to a customer. Provide either benefitId or benefitKey to identify the benefit. Emits an entitlement.granted webhook event.
     *
     * @param string $customerId Customer UUID
     * @param CustomersEntitlementsGrantRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CustomersEntitlementsGrantResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersEntitlementsGrant(string $customerId, CustomersEntitlementsGrantRequest $request = new CustomersEntitlementsGrantRequest(), ?array $options = null): CustomersEntitlementsGrantResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "customers/{$customerId}/entitlements",
                    method: HttpMethod::POST,
                    body: $request,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CustomersEntitlementsGrantResponse::fromJson($json);
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
     * Revoke an entitlement from a customer by benefit key. Provide benefitKey as a query parameter. Emits an entitlement.revoked webhook event.
     *
     * @param string $customerId Customer UUID
     * @param CustomersEntitlementsRevokeByKeyRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CustomersEntitlementsRevokeByKeyResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersEntitlementsRevokeByKey(string $customerId, CustomersEntitlementsRevokeByKeyRequest $request = new CustomersEntitlementsRevokeByKeyRequest(), ?array $options = null): CustomersEntitlementsRevokeByKeyResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        if ($request->benefitKey != null) {
            $query['benefitKey'] = $request->benefitKey;
        }
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "customers/{$customerId}/entitlements",
                    method: HttpMethod::DELETE,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CustomersEntitlementsRevokeByKeyResponse::fromJson($json);
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
     * Check if a customer has access to a specific benefit by key. This is the primary endpoint for feature gating and licensing checks.
     *
     * @param string $customerId Customer UUID
     * @param CustomersEntitlementsCheckRequest $request
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CustomersEntitlementsCheckResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersEntitlementsCheck(string $customerId, CustomersEntitlementsCheckRequest $request, ?array $options = null): CustomersEntitlementsCheckResponse
    {
        $options = array_merge($this->options, $options ?? []);
        $query = [];
        $query['benefitKey'] = $request->benefitKey;
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "customers/{$customerId}/entitlements/check",
                    method: HttpMethod::GET,
                    query: $query,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CustomersEntitlementsCheckResponse::fromJson($json);
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
     * Revoke a specific entitlement from a customer by entitlement ID. Emits an entitlement.revoked webhook event.
     *
     * @param string $customerId Customer UUID
     * @param string $entitlementId Entitlement UUID
     * @param ?array{
     *   baseUrl?: string,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     *   queryParameters?: array<string, mixed>,
     *   bodyProperties?: array<string, mixed>,
     * } $options
     * @return CustomersEntitlementsRevokeByIdResponse
     * @throws RevkeenException
     * @throws RevkeenApiException
     */
    public function customersEntitlementsRevokeById(string $customerId, string $entitlementId, ?array $options = null): CustomersEntitlementsRevokeByIdResponse
    {
        $options = array_merge($this->options, $options ?? []);
        try {
            $response = $this->client->sendRequest(
                new JsonApiRequest(
                    baseUrl: $options['baseUrl'] ?? $this->client->options['baseUrl'] ?? Environments::Default_->value,
                    path: "customers/{$customerId}/entitlements/{$entitlementId}",
                    method: HttpMethod::DELETE,
                ),
                $options,
            );
            $statusCode = $response->getStatusCode();
            if ($statusCode >= 200 && $statusCode < 400) {
                $json = $response->getBody()->getContents();
                return CustomersEntitlementsRevokeByIdResponse::fromJson($json);
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
