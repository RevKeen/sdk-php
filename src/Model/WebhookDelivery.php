<?php
/**
 * WebhookDelivery
 *
 * PHP version 8.1
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * RevKeen API
 *
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
 *
 * The version of the OpenAPI document: 2026-05-01
 * Contact: info@revkeen.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.18.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace RevKeen\Model;

use \ArrayAccess;
use \RevKeen\ObjectSerializer;

/**
 * WebhookDelivery Class Doc Comment
 *
 * @category Class
 * @description A record of a single webhook delivery attempt chain to one endpoint for one event. Use these records to debug specific delivery failures and to retry individual deliveries.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class WebhookDelivery implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'WebhookDelivery';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'object' => 'string',
        'endpoint_id' => 'string',
        'event_id' => 'string',
        'event_type' => 'string',
        'status' => 'string',
        'attempts' => 'int',
        'max_attempts' => 'int',
        'last_status_code' => 'int',
        'last_error' => 'string',
        'last_error_code' => 'string',
        'last_duration_ms' => 'int',
        'last_attempt_at' => '\DateTime',
        'next_retry_at' => '\DateTime',
        'delivered_at' => '\DateTime',
        'dead_lettered_at' => '\DateTime',
        'dead_letter_reason' => 'string',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => 'uuid',
        'object' => null,
        'endpoint_id' => 'uuid',
        'event_id' => 'uuid',
        'event_type' => null,
        'status' => null,
        'attempts' => null,
        'max_attempts' => null,
        'last_status_code' => null,
        'last_error' => null,
        'last_error_code' => null,
        'last_duration_ms' => null,
        'last_attempt_at' => 'date-time',
        'next_retry_at' => 'date-time',
        'delivered_at' => 'date-time',
        'dead_lettered_at' => 'date-time',
        'dead_letter_reason' => null,
        'created_at' => 'date-time',
        'updated_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'object' => false,
        'endpoint_id' => false,
        'event_id' => false,
        'event_type' => true,
        'status' => false,
        'attempts' => false,
        'max_attempts' => false,
        'last_status_code' => true,
        'last_error' => true,
        'last_error_code' => true,
        'last_duration_ms' => true,
        'last_attempt_at' => true,
        'next_retry_at' => true,
        'delivered_at' => true,
        'dead_lettered_at' => true,
        'dead_letter_reason' => true,
        'created_at' => false,
        'updated_at' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id' => 'id',
        'object' => 'object',
        'endpoint_id' => 'endpoint_id',
        'event_id' => 'event_id',
        'event_type' => 'event_type',
        'status' => 'status',
        'attempts' => 'attempts',
        'max_attempts' => 'max_attempts',
        'last_status_code' => 'last_status_code',
        'last_error' => 'last_error',
        'last_error_code' => 'last_error_code',
        'last_duration_ms' => 'last_duration_ms',
        'last_attempt_at' => 'last_attempt_at',
        'next_retry_at' => 'next_retry_at',
        'delivered_at' => 'delivered_at',
        'dead_lettered_at' => 'dead_lettered_at',
        'dead_letter_reason' => 'dead_letter_reason',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'object' => 'setObject',
        'endpoint_id' => 'setEndpointId',
        'event_id' => 'setEventId',
        'event_type' => 'setEventType',
        'status' => 'setStatus',
        'attempts' => 'setAttempts',
        'max_attempts' => 'setMaxAttempts',
        'last_status_code' => 'setLastStatusCode',
        'last_error' => 'setLastError',
        'last_error_code' => 'setLastErrorCode',
        'last_duration_ms' => 'setLastDurationMs',
        'last_attempt_at' => 'setLastAttemptAt',
        'next_retry_at' => 'setNextRetryAt',
        'delivered_at' => 'setDeliveredAt',
        'dead_lettered_at' => 'setDeadLetteredAt',
        'dead_letter_reason' => 'setDeadLetterReason',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'object' => 'getObject',
        'endpoint_id' => 'getEndpointId',
        'event_id' => 'getEventId',
        'event_type' => 'getEventType',
        'status' => 'getStatus',
        'attempts' => 'getAttempts',
        'max_attempts' => 'getMaxAttempts',
        'last_status_code' => 'getLastStatusCode',
        'last_error' => 'getLastError',
        'last_error_code' => 'getLastErrorCode',
        'last_duration_ms' => 'getLastDurationMs',
        'last_attempt_at' => 'getLastAttemptAt',
        'next_retry_at' => 'getNextRetryAt',
        'delivered_at' => 'getDeliveredAt',
        'dead_lettered_at' => 'getDeadLetteredAt',
        'dead_letter_reason' => 'getDeadLetterReason',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const OBJECT_WEBHOOK_DELIVERY = 'webhook_delivery';
    public const STATUS_PENDING = 'pending';
    public const STATUS_SUCCEEDED = 'succeeded';
    public const STATUS_FAILED = 'failed';
    public const STATUS_DEAD_LETTERED = 'dead_lettered';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_WEBHOOK_DELIVERY,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_SUCCEEDED,
            self::STATUS_FAILED,
            self::STATUS_DEAD_LETTERED,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('endpoint_id', $data ?? [], null);
        $this->setIfExists('event_id', $data ?? [], null);
        $this->setIfExists('event_type', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('attempts', $data ?? [], null);
        $this->setIfExists('max_attempts', $data ?? [], null);
        $this->setIfExists('last_status_code', $data ?? [], null);
        $this->setIfExists('last_error', $data ?? [], null);
        $this->setIfExists('last_error_code', $data ?? [], null);
        $this->setIfExists('last_duration_ms', $data ?? [], null);
        $this->setIfExists('last_attempt_at', $data ?? [], null);
        $this->setIfExists('next_retry_at', $data ?? [], null);
        $this->setIfExists('delivered_at', $data ?? [], null);
        $this->setIfExists('dead_lettered_at', $data ?? [], null);
        $this->setIfExists('dead_letter_reason', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['object'] === null) {
            $invalidProperties[] = "'object' can't be null";
        }
        $allowedValues = $this->getObjectAllowableValues();
        if (!is_null($this->container['object']) && !in_array($this->container['object'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'object', must be one of '%s'",
                $this->container['object'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['endpoint_id'] === null) {
            $invalidProperties[] = "'endpoint_id' can't be null";
        }
        if ($this->container['event_id'] === null) {
            $invalidProperties[] = "'event_id' can't be null";
        }
        if ($this->container['event_type'] === null && !$this->isNullableSetToNull('event_type')) {
            $invalidProperties[] = "'event_type' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['attempts'] === null) {
            $invalidProperties[] = "'attempts' can't be null";
        }
        if ($this->container['max_attempts'] === null) {
            $invalidProperties[] = "'max_attempts' can't be null";
        }
        if ($this->container['last_status_code'] === null && !$this->isNullableSetToNull('last_status_code')) {
            $invalidProperties[] = "'last_status_code' can't be null";
        }
        if ($this->container['last_error'] === null && !$this->isNullableSetToNull('last_error')) {
            $invalidProperties[] = "'last_error' can't be null";
        }
        if ($this->container['last_error_code'] === null && !$this->isNullableSetToNull('last_error_code')) {
            $invalidProperties[] = "'last_error_code' can't be null";
        }
        if ($this->container['last_duration_ms'] === null && !$this->isNullableSetToNull('last_duration_ms')) {
            $invalidProperties[] = "'last_duration_ms' can't be null";
        }
        if ($this->container['last_attempt_at'] === null && !$this->isNullableSetToNull('last_attempt_at')) {
            $invalidProperties[] = "'last_attempt_at' can't be null";
        }
        if ($this->container['next_retry_at'] === null && !$this->isNullableSetToNull('next_retry_at')) {
            $invalidProperties[] = "'next_retry_at' can't be null";
        }
        if ($this->container['delivered_at'] === null && !$this->isNullableSetToNull('delivered_at')) {
            $invalidProperties[] = "'delivered_at' can't be null";
        }
        if ($this->container['dead_lettered_at'] === null && !$this->isNullableSetToNull('dead_lettered_at')) {
            $invalidProperties[] = "'dead_lettered_at' can't be null";
        }
        if ($this->container['dead_letter_reason'] === null && !$this->isNullableSetToNull('dead_letter_reason')) {
            $invalidProperties[] = "'dead_letter_reason' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
        }
        if ($this->container['updated_at'] === null) {
            $invalidProperties[] = "'updated_at' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets object
     *
     * @return string
     */
    public function getObject()
    {
        return $this->container['object'];
    }

    /**
     * Sets object
     *
     * @param string $object object
     *
     * @return self
     */
    public function setObject($object)
    {
        if (is_null($object)) {
            throw new \InvalidArgumentException('non-nullable object cannot be null');
        }
        $allowedValues = $this->getObjectAllowableValues();
        if (!in_array($object, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'object', must be one of '%s'",
                    $object,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['object'] = $object;

        return $this;
    }

    /**
     * Gets endpoint_id
     *
     * @return string
     */
    public function getEndpointId()
    {
        return $this->container['endpoint_id'];
    }

    /**
     * Sets endpoint_id
     *
     * @param string $endpoint_id endpoint_id
     *
     * @return self
     */
    public function setEndpointId($endpoint_id)
    {
        if (is_null($endpoint_id)) {
            throw new \InvalidArgumentException('non-nullable endpoint_id cannot be null');
        }
        $this->container['endpoint_id'] = $endpoint_id;

        return $this;
    }

    /**
     * Gets event_id
     *
     * @return string
     */
    public function getEventId()
    {
        return $this->container['event_id'];
    }

    /**
     * Sets event_id
     *
     * @param string $event_id The event this delivery attempted to send.
     *
     * @return self
     */
    public function setEventId($event_id)
    {
        if (is_null($event_id)) {
            throw new \InvalidArgumentException('non-nullable event_id cannot be null');
        }
        $this->container['event_id'] = $event_id;

        return $this;
    }

    /**
     * Gets event_type
     *
     * @return string|null
     */
    public function getEventType()
    {
        return $this->container['event_type'];
    }

    /**
     * Sets event_type
     *
     * @param string|null $event_type event_type
     *
     * @return self
     */
    public function setEventType($event_type)
    {
        if (is_null($event_type)) {
            array_push($this->openAPINullablesSetToNull, 'event_type');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('event_type', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['event_type'] = $event_type;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Delivery state. pending: queued or retrying. succeeded: 2xx response received. failed: last attempt failed, may retry based on attempts/max_attempts. dead_lettered: max attempts exhausted, will not retry automatically.
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets attempts
     *
     * @return int
     */
    public function getAttempts()
    {
        return $this->container['attempts'];
    }

    /**
     * Sets attempts
     *
     * @param int $attempts attempts
     *
     * @return self
     */
    public function setAttempts($attempts)
    {
        if (is_null($attempts)) {
            throw new \InvalidArgumentException('non-nullable attempts cannot be null');
        }
        $this->container['attempts'] = $attempts;

        return $this;
    }

    /**
     * Gets max_attempts
     *
     * @return int
     */
    public function getMaxAttempts()
    {
        return $this->container['max_attempts'];
    }

    /**
     * Sets max_attempts
     *
     * @param int $max_attempts max_attempts
     *
     * @return self
     */
    public function setMaxAttempts($max_attempts)
    {
        if (is_null($max_attempts)) {
            throw new \InvalidArgumentException('non-nullable max_attempts cannot be null');
        }
        $this->container['max_attempts'] = $max_attempts;

        return $this;
    }

    /**
     * Gets last_status_code
     *
     * @return int|null
     */
    public function getLastStatusCode()
    {
        return $this->container['last_status_code'];
    }

    /**
     * Sets last_status_code
     *
     * @param int|null $last_status_code HTTP status code returned on the last attempt.
     *
     * @return self
     */
    public function setLastStatusCode($last_status_code)
    {
        if (is_null($last_status_code)) {
            array_push($this->openAPINullablesSetToNull, 'last_status_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_status_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['last_status_code'] = $last_status_code;

        return $this;
    }

    /**
     * Gets last_error
     *
     * @return string|null
     */
    public function getLastError()
    {
        return $this->container['last_error'];
    }

    /**
     * Sets last_error
     *
     * @param string|null $last_error Truncated error message from the last failed attempt.
     *
     * @return self
     */
    public function setLastError($last_error)
    {
        if (is_null($last_error)) {
            array_push($this->openAPINullablesSetToNull, 'last_error');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_error', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['last_error'] = $last_error;

        return $this;
    }

    /**
     * Gets last_error_code
     *
     * @return string|null
     */
    public function getLastErrorCode()
    {
        return $this->container['last_error_code'];
    }

    /**
     * Sets last_error_code
     *
     * @param string|null $last_error_code last_error_code
     *
     * @return self
     */
    public function setLastErrorCode($last_error_code)
    {
        if (is_null($last_error_code)) {
            array_push($this->openAPINullablesSetToNull, 'last_error_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_error_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['last_error_code'] = $last_error_code;

        return $this;
    }

    /**
     * Gets last_duration_ms
     *
     * @return int|null
     */
    public function getLastDurationMs()
    {
        return $this->container['last_duration_ms'];
    }

    /**
     * Sets last_duration_ms
     *
     * @param int|null $last_duration_ms last_duration_ms
     *
     * @return self
     */
    public function setLastDurationMs($last_duration_ms)
    {
        if (is_null($last_duration_ms)) {
            array_push($this->openAPINullablesSetToNull, 'last_duration_ms');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_duration_ms', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['last_duration_ms'] = $last_duration_ms;

        return $this;
    }

    /**
     * Gets last_attempt_at
     *
     * @return \DateTime|null
     */
    public function getLastAttemptAt()
    {
        return $this->container['last_attempt_at'];
    }

    /**
     * Sets last_attempt_at
     *
     * @param \DateTime|null $last_attempt_at last_attempt_at
     *
     * @return self
     */
    public function setLastAttemptAt($last_attempt_at)
    {
        if (is_null($last_attempt_at)) {
            array_push($this->openAPINullablesSetToNull, 'last_attempt_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_attempt_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['last_attempt_at'] = $last_attempt_at;

        return $this;
    }

    /**
     * Gets next_retry_at
     *
     * @return \DateTime|null
     */
    public function getNextRetryAt()
    {
        return $this->container['next_retry_at'];
    }

    /**
     * Sets next_retry_at
     *
     * @param \DateTime|null $next_retry_at next_retry_at
     *
     * @return self
     */
    public function setNextRetryAt($next_retry_at)
    {
        if (is_null($next_retry_at)) {
            array_push($this->openAPINullablesSetToNull, 'next_retry_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('next_retry_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['next_retry_at'] = $next_retry_at;

        return $this;
    }

    /**
     * Gets delivered_at
     *
     * @return \DateTime|null
     */
    public function getDeliveredAt()
    {
        return $this->container['delivered_at'];
    }

    /**
     * Sets delivered_at
     *
     * @param \DateTime|null $delivered_at delivered_at
     *
     * @return self
     */
    public function setDeliveredAt($delivered_at)
    {
        if (is_null($delivered_at)) {
            array_push($this->openAPINullablesSetToNull, 'delivered_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('delivered_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['delivered_at'] = $delivered_at;

        return $this;
    }

    /**
     * Gets dead_lettered_at
     *
     * @return \DateTime|null
     */
    public function getDeadLetteredAt()
    {
        return $this->container['dead_lettered_at'];
    }

    /**
     * Sets dead_lettered_at
     *
     * @param \DateTime|null $dead_lettered_at dead_lettered_at
     *
     * @return self
     */
    public function setDeadLetteredAt($dead_lettered_at)
    {
        if (is_null($dead_lettered_at)) {
            array_push($this->openAPINullablesSetToNull, 'dead_lettered_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dead_lettered_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['dead_lettered_at'] = $dead_lettered_at;

        return $this;
    }

    /**
     * Gets dead_letter_reason
     *
     * @return string|null
     */
    public function getDeadLetterReason()
    {
        return $this->container['dead_letter_reason'];
    }

    /**
     * Sets dead_letter_reason
     *
     * @param string|null $dead_letter_reason dead_letter_reason
     *
     * @return self
     */
    public function setDeadLetterReason($dead_letter_reason)
    {
        if (is_null($dead_letter_reason)) {
            array_push($this->openAPINullablesSetToNull, 'dead_letter_reason');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('dead_letter_reason', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['dead_letter_reason'] = $dead_letter_reason;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param \DateTime $created_at created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            throw new \InvalidArgumentException('non-nullable created_at cannot be null');
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param \DateTime $updated_at updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            throw new \InvalidArgumentException('non-nullable updated_at cannot be null');
        }
        $this->container['updated_at'] = $updated_at;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer|string $offset Offset
     *
     * @return boolean
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer|string $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer|string $offset Offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


