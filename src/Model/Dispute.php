<?php
/**
 * Dispute
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
 * Dispute Class Doc Comment
 *
 * @category Class
 * @description A dispute (chargeback) represents a customer&#39;s challenge to a charge with their card issuer. Track lifecycle stages and submit evidence to contest.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Dispute implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Dispute';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'public_id' => 'string',
        'payment_id' => 'string',
        'parent_transaction_id' => 'string',
        'gateway' => 'string',
        'gateway_dispute_id' => 'string',
        'gateway_transaction_id' => 'string',
        'amount_minor' => 'float',
        'currency' => 'string',
        'reason_code' => 'string',
        'reason' => 'string',
        'network_reason_code' => 'string',
        'network_reason_description' => 'string',
        'customer_name' => 'string',
        'card_brand' => 'string',
        'card_last4' => 'string',
        'evidence_due_by' => 'string',
        'evidence_submitted' => 'bool',
        'evidence_submitted_at' => 'string',
        'status' => 'string',
        'resolution' => 'string',
        'resolved_at' => 'string',
        'disputed_at' => 'string',
        'created_at' => 'string'
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
        'public_id' => null,
        'payment_id' => 'uuid',
        'parent_transaction_id' => 'uuid',
        'gateway' => null,
        'gateway_dispute_id' => null,
        'gateway_transaction_id' => null,
        'amount_minor' => null,
        'currency' => null,
        'reason_code' => null,
        'reason' => null,
        'network_reason_code' => null,
        'network_reason_description' => null,
        'customer_name' => null,
        'card_brand' => null,
        'card_last4' => null,
        'evidence_due_by' => null,
        'evidence_submitted' => null,
        'evidence_submitted_at' => null,
        'status' => null,
        'resolution' => null,
        'resolved_at' => null,
        'disputed_at' => null,
        'created_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'public_id' => false,
        'payment_id' => true,
        'parent_transaction_id' => true,
        'gateway' => false,
        'gateway_dispute_id' => false,
        'gateway_transaction_id' => true,
        'amount_minor' => false,
        'currency' => false,
        'reason_code' => true,
        'reason' => true,
        'network_reason_code' => true,
        'network_reason_description' => true,
        'customer_name' => true,
        'card_brand' => true,
        'card_last4' => true,
        'evidence_due_by' => true,
        'evidence_submitted' => false,
        'evidence_submitted_at' => true,
        'status' => false,
        'resolution' => true,
        'resolved_at' => true,
        'disputed_at' => false,
        'created_at' => false
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
        'public_id' => 'public_id',
        'payment_id' => 'payment_id',
        'parent_transaction_id' => 'parent_transaction_id',
        'gateway' => 'gateway',
        'gateway_dispute_id' => 'gateway_dispute_id',
        'gateway_transaction_id' => 'gateway_transaction_id',
        'amount_minor' => 'amount_minor',
        'currency' => 'currency',
        'reason_code' => 'reason_code',
        'reason' => 'reason',
        'network_reason_code' => 'network_reason_code',
        'network_reason_description' => 'network_reason_description',
        'customer_name' => 'customer_name',
        'card_brand' => 'card_brand',
        'card_last4' => 'card_last4',
        'evidence_due_by' => 'evidence_due_by',
        'evidence_submitted' => 'evidence_submitted',
        'evidence_submitted_at' => 'evidence_submitted_at',
        'status' => 'status',
        'resolution' => 'resolution',
        'resolved_at' => 'resolved_at',
        'disputed_at' => 'disputed_at',
        'created_at' => 'created_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'public_id' => 'setPublicId',
        'payment_id' => 'setPaymentId',
        'parent_transaction_id' => 'setParentTransactionId',
        'gateway' => 'setGateway',
        'gateway_dispute_id' => 'setGatewayDisputeId',
        'gateway_transaction_id' => 'setGatewayTransactionId',
        'amount_minor' => 'setAmountMinor',
        'currency' => 'setCurrency',
        'reason_code' => 'setReasonCode',
        'reason' => 'setReason',
        'network_reason_code' => 'setNetworkReasonCode',
        'network_reason_description' => 'setNetworkReasonDescription',
        'customer_name' => 'setCustomerName',
        'card_brand' => 'setCardBrand',
        'card_last4' => 'setCardLast4',
        'evidence_due_by' => 'setEvidenceDueBy',
        'evidence_submitted' => 'setEvidenceSubmitted',
        'evidence_submitted_at' => 'setEvidenceSubmittedAt',
        'status' => 'setStatus',
        'resolution' => 'setResolution',
        'resolved_at' => 'setResolvedAt',
        'disputed_at' => 'setDisputedAt',
        'created_at' => 'setCreatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'public_id' => 'getPublicId',
        'payment_id' => 'getPaymentId',
        'parent_transaction_id' => 'getParentTransactionId',
        'gateway' => 'getGateway',
        'gateway_dispute_id' => 'getGatewayDisputeId',
        'gateway_transaction_id' => 'getGatewayTransactionId',
        'amount_minor' => 'getAmountMinor',
        'currency' => 'getCurrency',
        'reason_code' => 'getReasonCode',
        'reason' => 'getReason',
        'network_reason_code' => 'getNetworkReasonCode',
        'network_reason_description' => 'getNetworkReasonDescription',
        'customer_name' => 'getCustomerName',
        'card_brand' => 'getCardBrand',
        'card_last4' => 'getCardLast4',
        'evidence_due_by' => 'getEvidenceDueBy',
        'evidence_submitted' => 'getEvidenceSubmitted',
        'evidence_submitted_at' => 'getEvidenceSubmittedAt',
        'status' => 'getStatus',
        'resolution' => 'getResolution',
        'resolved_at' => 'getResolvedAt',
        'disputed_at' => 'getDisputedAt',
        'created_at' => 'getCreatedAt'
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

    public const STATUS_NEEDS_RESPONSE = 'needs_response';
    public const STATUS_UNDER_REVIEW = 'under_review';
    public const STATUS_WON = 'won';
    public const STATUS_LOST = 'lost';
    public const STATUS_WARNING_CLOSED = 'warning_closed';
    public const STATUS_WARNING_NEEDS_RESPONSE = 'warning_needs_response';
    public const RESOLUTION_WON = 'won';
    public const RESOLUTION_LOST = 'lost';
    public const RESOLUTION_WITHDRAWN = 'withdrawn';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_NEEDS_RESPONSE,
            self::STATUS_UNDER_REVIEW,
            self::STATUS_WON,
            self::STATUS_LOST,
            self::STATUS_WARNING_CLOSED,
            self::STATUS_WARNING_NEEDS_RESPONSE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getResolutionAllowableValues()
    {
        return [
            self::RESOLUTION_WON,
            self::RESOLUTION_LOST,
            self::RESOLUTION_WITHDRAWN,
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
        $this->setIfExists('public_id', $data ?? [], null);
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('parent_transaction_id', $data ?? [], null);
        $this->setIfExists('gateway', $data ?? [], null);
        $this->setIfExists('gateway_dispute_id', $data ?? [], null);
        $this->setIfExists('gateway_transaction_id', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('reason_code', $data ?? [], null);
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('network_reason_code', $data ?? [], null);
        $this->setIfExists('network_reason_description', $data ?? [], null);
        $this->setIfExists('customer_name', $data ?? [], null);
        $this->setIfExists('card_brand', $data ?? [], null);
        $this->setIfExists('card_last4', $data ?? [], null);
        $this->setIfExists('evidence_due_by', $data ?? [], null);
        $this->setIfExists('evidence_submitted', $data ?? [], null);
        $this->setIfExists('evidence_submitted_at', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('resolution', $data ?? [], null);
        $this->setIfExists('resolved_at', $data ?? [], null);
        $this->setIfExists('disputed_at', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
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
        if ($this->container['public_id'] === null) {
            $invalidProperties[] = "'public_id' can't be null";
        }
        if ($this->container['payment_id'] === null && !$this->isNullableSetToNull('payment_id')) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if ($this->container['parent_transaction_id'] === null && !$this->isNullableSetToNull('parent_transaction_id')) {
            $invalidProperties[] = "'parent_transaction_id' can't be null";
        }
        if ($this->container['gateway'] === null) {
            $invalidProperties[] = "'gateway' can't be null";
        }
        if ($this->container['gateway_dispute_id'] === null) {
            $invalidProperties[] = "'gateway_dispute_id' can't be null";
        }
        if ($this->container['gateway_transaction_id'] === null && !$this->isNullableSetToNull('gateway_transaction_id')) {
            $invalidProperties[] = "'gateway_transaction_id' can't be null";
        }
        if ($this->container['amount_minor'] === null) {
            $invalidProperties[] = "'amount_minor' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['reason_code'] === null && !$this->isNullableSetToNull('reason_code')) {
            $invalidProperties[] = "'reason_code' can't be null";
        }
        if ($this->container['reason'] === null && !$this->isNullableSetToNull('reason')) {
            $invalidProperties[] = "'reason' can't be null";
        }
        if ($this->container['network_reason_code'] === null && !$this->isNullableSetToNull('network_reason_code')) {
            $invalidProperties[] = "'network_reason_code' can't be null";
        }
        if ($this->container['network_reason_description'] === null && !$this->isNullableSetToNull('network_reason_description')) {
            $invalidProperties[] = "'network_reason_description' can't be null";
        }
        if ($this->container['customer_name'] === null && !$this->isNullableSetToNull('customer_name')) {
            $invalidProperties[] = "'customer_name' can't be null";
        }
        if ($this->container['card_brand'] === null && !$this->isNullableSetToNull('card_brand')) {
            $invalidProperties[] = "'card_brand' can't be null";
        }
        if ($this->container['card_last4'] === null && !$this->isNullableSetToNull('card_last4')) {
            $invalidProperties[] = "'card_last4' can't be null";
        }
        if ($this->container['evidence_due_by'] === null && !$this->isNullableSetToNull('evidence_due_by')) {
            $invalidProperties[] = "'evidence_due_by' can't be null";
        }
        if ($this->container['evidence_submitted'] === null) {
            $invalidProperties[] = "'evidence_submitted' can't be null";
        }
        if ($this->container['evidence_submitted_at'] === null && !$this->isNullableSetToNull('evidence_submitted_at')) {
            $invalidProperties[] = "'evidence_submitted_at' can't be null";
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

        if ($this->container['resolution'] === null && !$this->isNullableSetToNull('resolution')) {
            $invalidProperties[] = "'resolution' can't be null";
        }
        $allowedValues = $this->getResolutionAllowableValues();
        if (!is_null($this->container['resolution']) && !in_array($this->container['resolution'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'resolution', must be one of '%s'",
                $this->container['resolution'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['resolved_at'] === null && !$this->isNullableSetToNull('resolved_at')) {
            $invalidProperties[] = "'resolved_at' can't be null";
        }
        if ($this->container['disputed_at'] === null) {
            $invalidProperties[] = "'disputed_at' can't be null";
        }
        if ($this->container['created_at'] === null) {
            $invalidProperties[] = "'created_at' can't be null";
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
     * @param string $id Unique identifier for the dispute
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
     * Gets public_id
     *
     * @return string
     */
    public function getPublicId()
    {
        return $this->container['public_id'];
    }

    /**
     * Sets public_id
     *
     * @param string $public_id Public-facing dispute identifier
     *
     * @return self
     */
    public function setPublicId($public_id)
    {
        if (is_null($public_id)) {
            throw new \InvalidArgumentException('non-nullable public_id cannot be null');
        }
        $this->container['public_id'] = $public_id;

        return $this;
    }

    /**
     * Gets payment_id
     *
     * @return string|null
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param string|null $payment_id The original payment ID this dispute is for (alias for parent_transaction_id)
     *
     * @return self
     */
    public function setPaymentId($payment_id)
    {
        if (is_null($payment_id)) {
            array_push($this->openAPINullablesSetToNull, 'payment_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payment_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['payment_id'] = $payment_id;

        return $this;
    }

    /**
     * Gets parent_transaction_id
     *
     * @return string|null
     */
    public function getParentTransactionId()
    {
        return $this->container['parent_transaction_id'];
    }

    /**
     * Sets parent_transaction_id
     *
     * @param string|null $parent_transaction_id Parent transaction ID in unified transaction model. Same as payment_id for disputes.
     *
     * @return self
     */
    public function setParentTransactionId($parent_transaction_id)
    {
        if (is_null($parent_transaction_id)) {
            array_push($this->openAPINullablesSetToNull, 'parent_transaction_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('parent_transaction_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['parent_transaction_id'] = $parent_transaction_id;

        return $this;
    }

    /**
     * Gets gateway
     *
     * @return string
     */
    public function getGateway()
    {
        return $this->container['gateway'];
    }

    /**
     * Sets gateway
     *
     * @param string $gateway Name of the payment processor that handled the original transaction
     *
     * @return self
     */
    public function setGateway($gateway)
    {
        if (is_null($gateway)) {
            throw new \InvalidArgumentException('non-nullable gateway cannot be null');
        }
        $this->container['gateway'] = $gateway;

        return $this;
    }

    /**
     * Gets gateway_dispute_id
     *
     * @return string
     */
    public function getGatewayDisputeId()
    {
        return $this->container['gateway_dispute_id'];
    }

    /**
     * Sets gateway_dispute_id
     *
     * @param string $gateway_dispute_id Dispute identifier assigned by the payment gateway
     *
     * @return self
     */
    public function setGatewayDisputeId($gateway_dispute_id)
    {
        if (is_null($gateway_dispute_id)) {
            throw new \InvalidArgumentException('non-nullable gateway_dispute_id cannot be null');
        }
        $this->container['gateway_dispute_id'] = $gateway_dispute_id;

        return $this;
    }

    /**
     * Gets gateway_transaction_id
     *
     * @return string|null
     */
    public function getGatewayTransactionId()
    {
        return $this->container['gateway_transaction_id'];
    }

    /**
     * Sets gateway_transaction_id
     *
     * @param string|null $gateway_transaction_id Original transaction identifier from the payment gateway
     *
     * @return self
     */
    public function setGatewayTransactionId($gateway_transaction_id)
    {
        if (is_null($gateway_transaction_id)) {
            array_push($this->openAPINullablesSetToNull, 'gateway_transaction_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('gateway_transaction_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['gateway_transaction_id'] = $gateway_transaction_id;

        return $this;
    }

    /**
     * Gets amount_minor
     *
     * @return float
     */
    public function getAmountMinor()
    {
        return $this->container['amount_minor'];
    }

    /**
     * Sets amount_minor
     *
     * @param float $amount_minor Disputed amount in cents
     *
     * @return self
     */
    public function setAmountMinor($amount_minor)
    {
        if (is_null($amount_minor)) {
            throw new \InvalidArgumentException('non-nullable amount_minor cannot be null');
        }
        $this->container['amount_minor'] = $amount_minor;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency Three-letter ISO 4217 currency code
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets reason_code
     *
     * @return string|null
     */
    public function getReasonCode()
    {
        return $this->container['reason_code'];
    }

    /**
     * Sets reason_code
     *
     * @param string|null $reason_code Card network reason code
     *
     * @return self
     */
    public function setReasonCode($reason_code)
    {
        if (is_null($reason_code)) {
            array_push($this->openAPINullablesSetToNull, 'reason_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reason_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reason_code'] = $reason_code;

        return $this;
    }

    /**
     * Gets reason
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string|null $reason Human-readable reason for the dispute
     *
     * @return self
     */
    public function setReason($reason)
    {
        if (is_null($reason)) {
            array_push($this->openAPINullablesSetToNull, 'reason');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('reason', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets network_reason_code
     *
     * @return string|null
     */
    public function getNetworkReasonCode()
    {
        return $this->container['network_reason_code'];
    }

    /**
     * Sets network_reason_code
     *
     * @param string|null $network_reason_code Card network-specific reason code
     *
     * @return self
     */
    public function setNetworkReasonCode($network_reason_code)
    {
        if (is_null($network_reason_code)) {
            array_push($this->openAPINullablesSetToNull, 'network_reason_code');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('network_reason_code', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['network_reason_code'] = $network_reason_code;

        return $this;
    }

    /**
     * Gets network_reason_description
     *
     * @return string|null
     */
    public function getNetworkReasonDescription()
    {
        return $this->container['network_reason_description'];
    }

    /**
     * Sets network_reason_description
     *
     * @param string|null $network_reason_description Card network-specific reason description
     *
     * @return self
     */
    public function setNetworkReasonDescription($network_reason_description)
    {
        if (is_null($network_reason_description)) {
            array_push($this->openAPINullablesSetToNull, 'network_reason_description');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('network_reason_description', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['network_reason_description'] = $network_reason_description;

        return $this;
    }

    /**
     * Gets customer_name
     *
     * @return string|null
     */
    public function getCustomerName()
    {
        return $this->container['customer_name'];
    }

    /**
     * Sets customer_name
     *
     * @param string|null $customer_name Name of the customer who filed the dispute
     *
     * @return self
     */
    public function setCustomerName($customer_name)
    {
        if (is_null($customer_name)) {
            array_push($this->openAPINullablesSetToNull, 'customer_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('customer_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['customer_name'] = $customer_name;

        return $this;
    }

    /**
     * Gets card_brand
     *
     * @return string|null
     */
    public function getCardBrand()
    {
        return $this->container['card_brand'];
    }

    /**
     * Sets card_brand
     *
     * @param string|null $card_brand Card brand used for the original payment
     *
     * @return self
     */
    public function setCardBrand($card_brand)
    {
        if (is_null($card_brand)) {
            array_push($this->openAPINullablesSetToNull, 'card_brand');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_brand', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_brand'] = $card_brand;

        return $this;
    }

    /**
     * Gets card_last4
     *
     * @return string|null
     */
    public function getCardLast4()
    {
        return $this->container['card_last4'];
    }

    /**
     * Sets card_last4
     *
     * @param string|null $card_last4 Last four digits of the card used for the original payment
     *
     * @return self
     */
    public function setCardLast4($card_last4)
    {
        if (is_null($card_last4)) {
            array_push($this->openAPINullablesSetToNull, 'card_last4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('card_last4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['card_last4'] = $card_last4;

        return $this;
    }

    /**
     * Gets evidence_due_by
     *
     * @return string|null
     */
    public function getEvidenceDueBy()
    {
        return $this->container['evidence_due_by'];
    }

    /**
     * Sets evidence_due_by
     *
     * @param string|null $evidence_due_by Deadline for submitting evidence to contest the dispute
     *
     * @return self
     */
    public function setEvidenceDueBy($evidence_due_by)
    {
        if (is_null($evidence_due_by)) {
            array_push($this->openAPINullablesSetToNull, 'evidence_due_by');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('evidence_due_by', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['evidence_due_by'] = $evidence_due_by;

        return $this;
    }

    /**
     * Gets evidence_submitted
     *
     * @return bool
     */
    public function getEvidenceSubmitted()
    {
        return $this->container['evidence_submitted'];
    }

    /**
     * Sets evidence_submitted
     *
     * @param bool $evidence_submitted Whether evidence has been submitted for this dispute
     *
     * @return self
     */
    public function setEvidenceSubmitted($evidence_submitted)
    {
        if (is_null($evidence_submitted)) {
            throw new \InvalidArgumentException('non-nullable evidence_submitted cannot be null');
        }
        $this->container['evidence_submitted'] = $evidence_submitted;

        return $this;
    }

    /**
     * Gets evidence_submitted_at
     *
     * @return string|null
     */
    public function getEvidenceSubmittedAt()
    {
        return $this->container['evidence_submitted_at'];
    }

    /**
     * Sets evidence_submitted_at
     *
     * @param string|null $evidence_submitted_at Timestamp when evidence was submitted
     *
     * @return self
     */
    public function setEvidenceSubmittedAt($evidence_submitted_at)
    {
        if (is_null($evidence_submitted_at)) {
            array_push($this->openAPINullablesSetToNull, 'evidence_submitted_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('evidence_submitted_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['evidence_submitted_at'] = $evidence_submitted_at;

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
     * @param string $status Current status of the dispute lifecycle
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
     * Gets resolution
     *
     * @return string|null
     */
    public function getResolution()
    {
        return $this->container['resolution'];
    }

    /**
     * Sets resolution
     *
     * @param string|null $resolution Final resolution outcome of the dispute
     *
     * @return self
     */
    public function setResolution($resolution)
    {
        if (is_null($resolution)) {
            array_push($this->openAPINullablesSetToNull, 'resolution');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('resolution', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getResolutionAllowableValues();
        if (!is_null($resolution) && !in_array($resolution, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'resolution', must be one of '%s'",
                    $resolution,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['resolution'] = $resolution;

        return $this;
    }

    /**
     * Gets resolved_at
     *
     * @return string|null
     */
    public function getResolvedAt()
    {
        return $this->container['resolved_at'];
    }

    /**
     * Sets resolved_at
     *
     * @param string|null $resolved_at Timestamp when the dispute was resolved
     *
     * @return self
     */
    public function setResolvedAt($resolved_at)
    {
        if (is_null($resolved_at)) {
            array_push($this->openAPINullablesSetToNull, 'resolved_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('resolved_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['resolved_at'] = $resolved_at;

        return $this;
    }

    /**
     * Gets disputed_at
     *
     * @return string
     */
    public function getDisputedAt()
    {
        return $this->container['disputed_at'];
    }

    /**
     * Sets disputed_at
     *
     * @param string $disputed_at Timestamp when the dispute was filed
     *
     * @return self
     */
    public function setDisputedAt($disputed_at)
    {
        if (is_null($disputed_at)) {
            throw new \InvalidArgumentException('non-nullable disputed_at cannot be null');
        }
        $this->container['disputed_at'] = $disputed_at;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string $created_at Timestamp when the dispute record was created
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


