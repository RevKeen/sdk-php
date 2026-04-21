<?php
/**
 * SubscriptionCreateResponseData
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
 * SubscriptionCreateResponseData Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SubscriptionCreateResponseData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SubscriptionCreateResponse_data';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'merchant_id' => 'string',
        'customer_id' => 'string',
        'product_id' => 'string',
        'price_id' => 'string',
        'plan_id' => 'string',
        'status' => 'string',
        'quantity' => 'int',
        'amount_minor' => 'int',
        'currency' => 'string',
        'billing_interval' => 'string',
        'current_period_start' => '\DateTime',
        'current_period_end' => '\DateTime',
        'trial_end' => '\DateTime',
        'canceled_at' => '\DateTime',
        'created_at' => '\DateTime',
        'updated_at' => '\DateTime',
        'dunning' => '\RevKeen\Model\SubscriptionCreateResponseDataDunning'
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
        'merchant_id' => 'uuid',
        'customer_id' => 'uuid',
        'product_id' => 'uuid',
        'price_id' => 'uuid',
        'plan_id' => 'uuid',
        'status' => null,
        'quantity' => null,
        'amount_minor' => null,
        'currency' => null,
        'billing_interval' => null,
        'current_period_start' => 'date-time',
        'current_period_end' => 'date-time',
        'trial_end' => 'date-time',
        'canceled_at' => 'date-time',
        'created_at' => 'date-time',
        'updated_at' => 'date-time',
        'dunning' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'merchant_id' => false,
        'customer_id' => false,
        'product_id' => false,
        'price_id' => false,
        'plan_id' => false,
        'status' => false,
        'quantity' => false,
        'amount_minor' => false,
        'currency' => false,
        'billing_interval' => false,
        'current_period_start' => false,
        'current_period_end' => false,
        'trial_end' => false,
        'canceled_at' => false,
        'created_at' => false,
        'updated_at' => false,
        'dunning' => false
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
        'merchant_id' => 'merchantId',
        'customer_id' => 'customerId',
        'product_id' => 'productId',
        'price_id' => 'priceId',
        'plan_id' => 'planId',
        'status' => 'status',
        'quantity' => 'quantity',
        'amount_minor' => 'amountMinor',
        'currency' => 'currency',
        'billing_interval' => 'billingInterval',
        'current_period_start' => 'currentPeriodStart',
        'current_period_end' => 'currentPeriodEnd',
        'trial_end' => 'trialEnd',
        'canceled_at' => 'canceledAt',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'dunning' => 'dunning'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'merchant_id' => 'setMerchantId',
        'customer_id' => 'setCustomerId',
        'product_id' => 'setProductId',
        'price_id' => 'setPriceId',
        'plan_id' => 'setPlanId',
        'status' => 'setStatus',
        'quantity' => 'setQuantity',
        'amount_minor' => 'setAmountMinor',
        'currency' => 'setCurrency',
        'billing_interval' => 'setBillingInterval',
        'current_period_start' => 'setCurrentPeriodStart',
        'current_period_end' => 'setCurrentPeriodEnd',
        'trial_end' => 'setTrialEnd',
        'canceled_at' => 'setCanceledAt',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt',
        'dunning' => 'setDunning'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'merchant_id' => 'getMerchantId',
        'customer_id' => 'getCustomerId',
        'product_id' => 'getProductId',
        'price_id' => 'getPriceId',
        'plan_id' => 'getPlanId',
        'status' => 'getStatus',
        'quantity' => 'getQuantity',
        'amount_minor' => 'getAmountMinor',
        'currency' => 'getCurrency',
        'billing_interval' => 'getBillingInterval',
        'current_period_start' => 'getCurrentPeriodStart',
        'current_period_end' => 'getCurrentPeriodEnd',
        'trial_end' => 'getTrialEnd',
        'canceled_at' => 'getCanceledAt',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt',
        'dunning' => 'getDunning'
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

    public const STATUS_TRIALING = 'trialing';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_PAST_DUE = 'past_due';
    public const STATUS_PAUSED = 'paused';
    public const STATUS_CANCELED = 'canceled';
    public const STATUS_EXPIRED = 'expired';
    public const BILLING_INTERVAL_DAY = 'day';
    public const BILLING_INTERVAL_WEEK = 'week';
    public const BILLING_INTERVAL_MONTH = 'month';
    public const BILLING_INTERVAL_YEAR = 'year';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_TRIALING,
            self::STATUS_ACTIVE,
            self::STATUS_PAST_DUE,
            self::STATUS_PAUSED,
            self::STATUS_CANCELED,
            self::STATUS_EXPIRED,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingIntervalAllowableValues()
    {
        return [
            self::BILLING_INTERVAL_DAY,
            self::BILLING_INTERVAL_WEEK,
            self::BILLING_INTERVAL_MONTH,
            self::BILLING_INTERVAL_YEAR,
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
        $this->setIfExists('merchant_id', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('product_id', $data ?? [], null);
        $this->setIfExists('price_id', $data ?? [], null);
        $this->setIfExists('plan_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('quantity', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('billing_interval', $data ?? [], null);
        $this->setIfExists('current_period_start', $data ?? [], null);
        $this->setIfExists('current_period_end', $data ?? [], null);
        $this->setIfExists('trial_end', $data ?? [], null);
        $this->setIfExists('canceled_at', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
        $this->setIfExists('dunning', $data ?? [], null);
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
        if ($this->container['merchant_id'] === null) {
            $invalidProperties[] = "'merchant_id' can't be null";
        }
        if ($this->container['customer_id'] === null) {
            $invalidProperties[] = "'customer_id' can't be null";
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

        if ($this->container['quantity'] === null) {
            $invalidProperties[] = "'quantity' can't be null";
        }
        if (($this->container['quantity'] < 1)) {
            $invalidProperties[] = "invalid value for 'quantity', must be bigger than or equal to 1.";
        }

        if ($this->container['amount_minor'] === null) {
            $invalidProperties[] = "'amount_minor' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ((mb_strlen($this->container['currency']) > 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be smaller than or equal to 3.";
        }

        if ((mb_strlen($this->container['currency']) < 3)) {
            $invalidProperties[] = "invalid value for 'currency', the character length must be bigger than or equal to 3.";
        }

        if ($this->container['billing_interval'] === null) {
            $invalidProperties[] = "'billing_interval' can't be null";
        }
        $allowedValues = $this->getBillingIntervalAllowableValues();
        if (!is_null($this->container['billing_interval']) && !in_array($this->container['billing_interval'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billing_interval', must be one of '%s'",
                $this->container['billing_interval'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['current_period_start'] === null) {
            $invalidProperties[] = "'current_period_start' can't be null";
        }
        if ($this->container['current_period_end'] === null) {
            $invalidProperties[] = "'current_period_end' can't be null";
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
     * Gets merchant_id
     *
     * @return string
     */
    public function getMerchantId()
    {
        return $this->container['merchant_id'];
    }

    /**
     * Sets merchant_id
     *
     * @param string $merchant_id merchant_id
     *
     * @return self
     */
    public function setMerchantId($merchant_id)
    {
        if (is_null($merchant_id)) {
            throw new \InvalidArgumentException('non-nullable merchant_id cannot be null');
        }
        $this->container['merchant_id'] = $merchant_id;

        return $this;
    }

    /**
     * Gets customer_id
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->container['customer_id'];
    }

    /**
     * Sets customer_id
     *
     * @param string $customer_id customer_id
     *
     * @return self
     */
    public function setCustomerId($customer_id)
    {
        if (is_null($customer_id)) {
            throw new \InvalidArgumentException('non-nullable customer_id cannot be null');
        }
        $this->container['customer_id'] = $customer_id;

        return $this;
    }

    /**
     * Gets product_id
     *
     * @return string|null
     */
    public function getProductId()
    {
        return $this->container['product_id'];
    }

    /**
     * Sets product_id
     *
     * @param string|null $product_id product_id
     *
     * @return self
     */
    public function setProductId($product_id)
    {
        if (is_null($product_id)) {
            throw new \InvalidArgumentException('non-nullable product_id cannot be null');
        }
        $this->container['product_id'] = $product_id;

        return $this;
    }

    /**
     * Gets price_id
     *
     * @return string|null
     */
    public function getPriceId()
    {
        return $this->container['price_id'];
    }

    /**
     * Sets price_id
     *
     * @param string|null $price_id price_id
     *
     * @return self
     */
    public function setPriceId($price_id)
    {
        if (is_null($price_id)) {
            throw new \InvalidArgumentException('non-nullable price_id cannot be null');
        }
        $this->container['price_id'] = $price_id;

        return $this;
    }

    /**
     * Gets plan_id
     *
     * @return string|null
     */
    public function getPlanId()
    {
        return $this->container['plan_id'];
    }

    /**
     * Sets plan_id
     *
     * @param string|null $plan_id plan_id
     *
     * @return self
     */
    public function setPlanId($plan_id)
    {
        if (is_null($plan_id)) {
            throw new \InvalidArgumentException('non-nullable plan_id cannot be null');
        }
        $this->container['plan_id'] = $plan_id;

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
     * @param string $status status
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
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int $quantity quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        if (is_null($quantity)) {
            throw new \InvalidArgumentException('non-nullable quantity cannot be null');
        }

        if (($quantity < 1)) {
            throw new \InvalidArgumentException('invalid value for $quantity when calling SubscriptionCreateResponseData., must be bigger than or equal to 1.');
        }

        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets amount_minor
     *
     * @return int
     */
    public function getAmountMinor()
    {
        return $this->container['amount_minor'];
    }

    /**
     * Sets amount_minor
     *
     * @param int $amount_minor amount_minor
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
     * @param string $currency currency
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        if ((mb_strlen($currency) > 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling SubscriptionCreateResponseData., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling SubscriptionCreateResponseData., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets billing_interval
     *
     * @return string
     */
    public function getBillingInterval()
    {
        return $this->container['billing_interval'];
    }

    /**
     * Sets billing_interval
     *
     * @param string $billing_interval billing_interval
     *
     * @return self
     */
    public function setBillingInterval($billing_interval)
    {
        if (is_null($billing_interval)) {
            throw new \InvalidArgumentException('non-nullable billing_interval cannot be null');
        }
        $allowedValues = $this->getBillingIntervalAllowableValues();
        if (!in_array($billing_interval, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billing_interval', must be one of '%s'",
                    $billing_interval,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billing_interval'] = $billing_interval;

        return $this;
    }

    /**
     * Gets current_period_start
     *
     * @return \DateTime
     */
    public function getCurrentPeriodStart()
    {
        return $this->container['current_period_start'];
    }

    /**
     * Sets current_period_start
     *
     * @param \DateTime $current_period_start current_period_start
     *
     * @return self
     */
    public function setCurrentPeriodStart($current_period_start)
    {
        if (is_null($current_period_start)) {
            throw new \InvalidArgumentException('non-nullable current_period_start cannot be null');
        }
        $this->container['current_period_start'] = $current_period_start;

        return $this;
    }

    /**
     * Gets current_period_end
     *
     * @return \DateTime
     */
    public function getCurrentPeriodEnd()
    {
        return $this->container['current_period_end'];
    }

    /**
     * Sets current_period_end
     *
     * @param \DateTime $current_period_end current_period_end
     *
     * @return self
     */
    public function setCurrentPeriodEnd($current_period_end)
    {
        if (is_null($current_period_end)) {
            throw new \InvalidArgumentException('non-nullable current_period_end cannot be null');
        }
        $this->container['current_period_end'] = $current_period_end;

        return $this;
    }

    /**
     * Gets trial_end
     *
     * @return \DateTime|null
     */
    public function getTrialEnd()
    {
        return $this->container['trial_end'];
    }

    /**
     * Sets trial_end
     *
     * @param \DateTime|null $trial_end trial_end
     *
     * @return self
     */
    public function setTrialEnd($trial_end)
    {
        if (is_null($trial_end)) {
            throw new \InvalidArgumentException('non-nullable trial_end cannot be null');
        }
        $this->container['trial_end'] = $trial_end;

        return $this;
    }

    /**
     * Gets canceled_at
     *
     * @return \DateTime|null
     */
    public function getCanceledAt()
    {
        return $this->container['canceled_at'];
    }

    /**
     * Sets canceled_at
     *
     * @param \DateTime|null $canceled_at canceled_at
     *
     * @return self
     */
    public function setCanceledAt($canceled_at)
    {
        if (is_null($canceled_at)) {
            throw new \InvalidArgumentException('non-nullable canceled_at cannot be null');
        }
        $this->container['canceled_at'] = $canceled_at;

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
     * Gets dunning
     *
     * @return \RevKeen\Model\SubscriptionCreateResponseDataDunning|null
     */
    public function getDunning()
    {
        return $this->container['dunning'];
    }

    /**
     * Sets dunning
     *
     * @param \RevKeen\Model\SubscriptionCreateResponseDataDunning|null $dunning dunning
     *
     * @return self
     */
    public function setDunning($dunning)
    {
        if (is_null($dunning)) {
            throw new \InvalidArgumentException('non-nullable dunning cannot be null');
        }
        $this->container['dunning'] = $dunning;

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


