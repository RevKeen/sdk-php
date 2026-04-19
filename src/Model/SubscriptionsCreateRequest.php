<?php
/**
 * SubscriptionsCreateRequest
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Sandbox** | `https://sandbox-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Sandbox** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * SubscriptionsCreateRequest Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SubscriptionsCreateRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'subscriptions_create_request';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'customer_id' => 'string',
        'business_id' => 'string',
        'product_id' => 'string',
        'plan_id' => 'string',
        'price_id' => 'string',
        'payment_method_id' => 'string',
        'start_date' => 'string',
        'currency' => 'string',
        'quantity' => 'int',
        'trial_end' => '\DateTime',
        'billing_anchor_day' => 'int',
        'pause_at_period_end' => 'bool',
        'cancel_at_period_end' => 'bool',
        'billing_starts_on' => '\DateTime',
        'billing_end_strategy' => 'string',
        'billing_ends_on' => '\DateTime',
        'billing_max_cycles' => 'int',
        'proration_mode' => 'string',
        'metadata' => 'array<string,mixed>'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'customer_id' => 'uuid',
        'business_id' => 'uuid',
        'product_id' => 'uuid',
        'plan_id' => 'uuid',
        'price_id' => 'uuid',
        'payment_method_id' => 'uuid',
        'start_date' => null,
        'currency' => null,
        'quantity' => null,
        'trial_end' => 'date-time',
        'billing_anchor_day' => null,
        'pause_at_period_end' => null,
        'cancel_at_period_end' => null,
        'billing_starts_on' => 'date-time',
        'billing_end_strategy' => null,
        'billing_ends_on' => 'date-time',
        'billing_max_cycles' => null,
        'proration_mode' => null,
        'metadata' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'customer_id' => false,
        'business_id' => false,
        'product_id' => false,
        'plan_id' => false,
        'price_id' => false,
        'payment_method_id' => false,
        'start_date' => false,
        'currency' => false,
        'quantity' => false,
        'trial_end' => false,
        'billing_anchor_day' => false,
        'pause_at_period_end' => false,
        'cancel_at_period_end' => false,
        'billing_starts_on' => false,
        'billing_end_strategy' => false,
        'billing_ends_on' => false,
        'billing_max_cycles' => false,
        'proration_mode' => false,
        'metadata' => false
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
        'customer_id' => 'customerId',
        'business_id' => 'businessId',
        'product_id' => 'productId',
        'plan_id' => 'planId',
        'price_id' => 'priceId',
        'payment_method_id' => 'paymentMethodId',
        'start_date' => 'startDate',
        'currency' => 'currency',
        'quantity' => 'quantity',
        'trial_end' => 'trialEnd',
        'billing_anchor_day' => 'billingAnchorDay',
        'pause_at_period_end' => 'pauseAtPeriodEnd',
        'cancel_at_period_end' => 'cancelAtPeriodEnd',
        'billing_starts_on' => 'billingStartsOn',
        'billing_end_strategy' => 'billingEndStrategy',
        'billing_ends_on' => 'billingEndsOn',
        'billing_max_cycles' => 'billingMaxCycles',
        'proration_mode' => 'prorationMode',
        'metadata' => 'metadata'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'customer_id' => 'setCustomerId',
        'business_id' => 'setBusinessId',
        'product_id' => 'setProductId',
        'plan_id' => 'setPlanId',
        'price_id' => 'setPriceId',
        'payment_method_id' => 'setPaymentMethodId',
        'start_date' => 'setStartDate',
        'currency' => 'setCurrency',
        'quantity' => 'setQuantity',
        'trial_end' => 'setTrialEnd',
        'billing_anchor_day' => 'setBillingAnchorDay',
        'pause_at_period_end' => 'setPauseAtPeriodEnd',
        'cancel_at_period_end' => 'setCancelAtPeriodEnd',
        'billing_starts_on' => 'setBillingStartsOn',
        'billing_end_strategy' => 'setBillingEndStrategy',
        'billing_ends_on' => 'setBillingEndsOn',
        'billing_max_cycles' => 'setBillingMaxCycles',
        'proration_mode' => 'setProrationMode',
        'metadata' => 'setMetadata'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'customer_id' => 'getCustomerId',
        'business_id' => 'getBusinessId',
        'product_id' => 'getProductId',
        'plan_id' => 'getPlanId',
        'price_id' => 'getPriceId',
        'payment_method_id' => 'getPaymentMethodId',
        'start_date' => 'getStartDate',
        'currency' => 'getCurrency',
        'quantity' => 'getQuantity',
        'trial_end' => 'getTrialEnd',
        'billing_anchor_day' => 'getBillingAnchorDay',
        'pause_at_period_end' => 'getPauseAtPeriodEnd',
        'cancel_at_period_end' => 'getCancelAtPeriodEnd',
        'billing_starts_on' => 'getBillingStartsOn',
        'billing_end_strategy' => 'getBillingEndStrategy',
        'billing_ends_on' => 'getBillingEndsOn',
        'billing_max_cycles' => 'getBillingMaxCycles',
        'proration_mode' => 'getProrationMode',
        'metadata' => 'getMetadata'
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

    public const BILLING_END_STRATEGY_INDEFINITE = 'indefinite';
    public const BILLING_END_STRATEGY_ON_DATE = 'on_date';
    public const BILLING_END_STRATEGY_AFTER_CYCLES = 'after_cycles';
    public const PRORATION_MODE_IMMEDIATE = 'immediate';
    public const PRORATION_MODE_NEXT_INVOICE = 'next_invoice';
    public const PRORATION_MODE_NONE = 'none';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingEndStrategyAllowableValues()
    {
        return [
            self::BILLING_END_STRATEGY_INDEFINITE,
            self::BILLING_END_STRATEGY_ON_DATE,
            self::BILLING_END_STRATEGY_AFTER_CYCLES,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProrationModeAllowableValues()
    {
        return [
            self::PRORATION_MODE_IMMEDIATE,
            self::PRORATION_MODE_NEXT_INVOICE,
            self::PRORATION_MODE_NONE,
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
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('business_id', $data ?? [], null);
        $this->setIfExists('product_id', $data ?? [], null);
        $this->setIfExists('plan_id', $data ?? [], null);
        $this->setIfExists('price_id', $data ?? [], null);
        $this->setIfExists('payment_method_id', $data ?? [], null);
        $this->setIfExists('start_date', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], 'USD');
        $this->setIfExists('quantity', $data ?? [], 1);
        $this->setIfExists('trial_end', $data ?? [], null);
        $this->setIfExists('billing_anchor_day', $data ?? [], null);
        $this->setIfExists('pause_at_period_end', $data ?? [], null);
        $this->setIfExists('cancel_at_period_end', $data ?? [], null);
        $this->setIfExists('billing_starts_on', $data ?? [], null);
        $this->setIfExists('billing_end_strategy', $data ?? [], null);
        $this->setIfExists('billing_ends_on', $data ?? [], null);
        $this->setIfExists('billing_max_cycles', $data ?? [], null);
        $this->setIfExists('proration_mode', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
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

        if ($this->container['customer_id'] === null) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if (!is_null($this->container['quantity']) && ($this->container['quantity'] < 1)) {
            $invalidProperties[] = "invalid value for 'quantity', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['billing_anchor_day']) && ($this->container['billing_anchor_day'] > 31)) {
            $invalidProperties[] = "invalid value for 'billing_anchor_day', must be smaller than or equal to 31.";
        }

        if (!is_null($this->container['billing_anchor_day']) && ($this->container['billing_anchor_day'] < 1)) {
            $invalidProperties[] = "invalid value for 'billing_anchor_day', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getBillingEndStrategyAllowableValues();
        if (!is_null($this->container['billing_end_strategy']) && !in_array($this->container['billing_end_strategy'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billing_end_strategy', must be one of '%s'",
                $this->container['billing_end_strategy'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['billing_max_cycles']) && ($this->container['billing_max_cycles'] < 1)) {
            $invalidProperties[] = "invalid value for 'billing_max_cycles', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getProrationModeAllowableValues();
        if (!is_null($this->container['proration_mode']) && !in_array($this->container['proration_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'proration_mode', must be one of '%s'",
                $this->container['proration_mode'],
                implode("', '", $allowedValues)
            );
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
     * Gets business_id
     *
     * @return string|null
     */
    public function getBusinessId()
    {
        return $this->container['business_id'];
    }

    /**
     * Sets business_id
     *
     * @param string|null $business_id business_id
     *
     * @return self
     */
    public function setBusinessId($business_id)
    {
        if (is_null($business_id)) {
            throw new \InvalidArgumentException('non-nullable business_id cannot be null');
        }
        $this->container['business_id'] = $business_id;

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
     * Gets payment_method_id
     *
     * @return string|null
     */
    public function getPaymentMethodId()
    {
        return $this->container['payment_method_id'];
    }

    /**
     * Sets payment_method_id
     *
     * @param string|null $payment_method_id payment_method_id
     *
     * @return self
     */
    public function setPaymentMethodId($payment_method_id)
    {
        if (is_null($payment_method_id)) {
            throw new \InvalidArgumentException('non-nullable payment_method_id cannot be null');
        }
        $this->container['payment_method_id'] = $payment_method_id;

        return $this;
    }

    /**
     * Gets start_date
     *
     * @return string|null
     */
    public function getStartDate()
    {
        return $this->container['start_date'];
    }

    /**
     * Sets start_date
     *
     * @param string|null $start_date start_date
     *
     * @return self
     */
    public function setStartDate($start_date)
    {
        if (is_null($start_date)) {
            throw new \InvalidArgumentException('non-nullable start_date cannot be null');
        }
        $this->container['start_date'] = $start_date;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency currency
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
     * Gets quantity
     *
     * @return int|null
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int|null $quantity quantity
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        if (is_null($quantity)) {
            throw new \InvalidArgumentException('non-nullable quantity cannot be null');
        }

        if (($quantity < 1)) {
            throw new \InvalidArgumentException('invalid value for $quantity when calling SubscriptionsCreateRequest., must be bigger than or equal to 1.');
        }

        $this->container['quantity'] = $quantity;

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
     * Gets billing_anchor_day
     *
     * @return int|null
     */
    public function getBillingAnchorDay()
    {
        return $this->container['billing_anchor_day'];
    }

    /**
     * Sets billing_anchor_day
     *
     * @param int|null $billing_anchor_day billing_anchor_day
     *
     * @return self
     */
    public function setBillingAnchorDay($billing_anchor_day)
    {
        if (is_null($billing_anchor_day)) {
            throw new \InvalidArgumentException('non-nullable billing_anchor_day cannot be null');
        }

        if (($billing_anchor_day > 31)) {
            throw new \InvalidArgumentException('invalid value for $billing_anchor_day when calling SubscriptionsCreateRequest., must be smaller than or equal to 31.');
        }
        if (($billing_anchor_day < 1)) {
            throw new \InvalidArgumentException('invalid value for $billing_anchor_day when calling SubscriptionsCreateRequest., must be bigger than or equal to 1.');
        }

        $this->container['billing_anchor_day'] = $billing_anchor_day;

        return $this;
    }

    /**
     * Gets pause_at_period_end
     *
     * @return bool|null
     */
    public function getPauseAtPeriodEnd()
    {
        return $this->container['pause_at_period_end'];
    }

    /**
     * Sets pause_at_period_end
     *
     * @param bool|null $pause_at_period_end pause_at_period_end
     *
     * @return self
     */
    public function setPauseAtPeriodEnd($pause_at_period_end)
    {
        if (is_null($pause_at_period_end)) {
            throw new \InvalidArgumentException('non-nullable pause_at_period_end cannot be null');
        }
        $this->container['pause_at_period_end'] = $pause_at_period_end;

        return $this;
    }

    /**
     * Gets cancel_at_period_end
     *
     * @return bool|null
     */
    public function getCancelAtPeriodEnd()
    {
        return $this->container['cancel_at_period_end'];
    }

    /**
     * Sets cancel_at_period_end
     *
     * @param bool|null $cancel_at_period_end cancel_at_period_end
     *
     * @return self
     */
    public function setCancelAtPeriodEnd($cancel_at_period_end)
    {
        if (is_null($cancel_at_period_end)) {
            throw new \InvalidArgumentException('non-nullable cancel_at_period_end cannot be null');
        }
        $this->container['cancel_at_period_end'] = $cancel_at_period_end;

        return $this;
    }

    /**
     * Gets billing_starts_on
     *
     * @return \DateTime|null
     */
    public function getBillingStartsOn()
    {
        return $this->container['billing_starts_on'];
    }

    /**
     * Sets billing_starts_on
     *
     * @param \DateTime|null $billing_starts_on billing_starts_on
     *
     * @return self
     */
    public function setBillingStartsOn($billing_starts_on)
    {
        if (is_null($billing_starts_on)) {
            throw new \InvalidArgumentException('non-nullable billing_starts_on cannot be null');
        }
        $this->container['billing_starts_on'] = $billing_starts_on;

        return $this;
    }

    /**
     * Gets billing_end_strategy
     *
     * @return string|null
     */
    public function getBillingEndStrategy()
    {
        return $this->container['billing_end_strategy'];
    }

    /**
     * Sets billing_end_strategy
     *
     * @param string|null $billing_end_strategy billing_end_strategy
     *
     * @return self
     */
    public function setBillingEndStrategy($billing_end_strategy)
    {
        if (is_null($billing_end_strategy)) {
            throw new \InvalidArgumentException('non-nullable billing_end_strategy cannot be null');
        }
        $allowedValues = $this->getBillingEndStrategyAllowableValues();
        if (!in_array($billing_end_strategy, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billing_end_strategy', must be one of '%s'",
                    $billing_end_strategy,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billing_end_strategy'] = $billing_end_strategy;

        return $this;
    }

    /**
     * Gets billing_ends_on
     *
     * @return \DateTime|null
     */
    public function getBillingEndsOn()
    {
        return $this->container['billing_ends_on'];
    }

    /**
     * Sets billing_ends_on
     *
     * @param \DateTime|null $billing_ends_on billing_ends_on
     *
     * @return self
     */
    public function setBillingEndsOn($billing_ends_on)
    {
        if (is_null($billing_ends_on)) {
            throw new \InvalidArgumentException('non-nullable billing_ends_on cannot be null');
        }
        $this->container['billing_ends_on'] = $billing_ends_on;

        return $this;
    }

    /**
     * Gets billing_max_cycles
     *
     * @return int|null
     */
    public function getBillingMaxCycles()
    {
        return $this->container['billing_max_cycles'];
    }

    /**
     * Sets billing_max_cycles
     *
     * @param int|null $billing_max_cycles billing_max_cycles
     *
     * @return self
     */
    public function setBillingMaxCycles($billing_max_cycles)
    {
        if (is_null($billing_max_cycles)) {
            throw new \InvalidArgumentException('non-nullable billing_max_cycles cannot be null');
        }

        if (($billing_max_cycles < 1)) {
            throw new \InvalidArgumentException('invalid value for $billing_max_cycles when calling SubscriptionsCreateRequest., must be bigger than or equal to 1.');
        }

        $this->container['billing_max_cycles'] = $billing_max_cycles;

        return $this;
    }

    /**
     * Gets proration_mode
     *
     * @return string|null
     */
    public function getProrationMode()
    {
        return $this->container['proration_mode'];
    }

    /**
     * Sets proration_mode
     *
     * @param string|null $proration_mode proration_mode
     *
     * @return self
     */
    public function setProrationMode($proration_mode)
    {
        if (is_null($proration_mode)) {
            throw new \InvalidArgumentException('non-nullable proration_mode cannot be null');
        }
        $allowedValues = $this->getProrationModeAllowableValues();
        if (!in_array($proration_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'proration_mode', must be one of '%s'",
                    $proration_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['proration_mode'] = $proration_mode;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return array<string,mixed>|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param array<string,mixed>|null $metadata metadata
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        if (is_null($metadata)) {
            throw new \InvalidArgumentException('non-nullable metadata cannot be null');
        }
        $this->container['metadata'] = $metadata;

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


