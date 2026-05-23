<?php
/**
 * CreateProductRequest
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * CreateProductRequest Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a new product, including name, billing type, and pricing.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateProductRequest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateProductRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'product_id' => 'string',
        'name' => 'string',
        'description' => 'string',
        'kind' => 'string',
        'pricing_model' => 'string',
        'amount_minor' => 'int',
        'currency' => 'string',
        'interval' => 'string',
        'interval_count' => 'int',
        'trial_days' => 'int',
        'usage_meter_id' => 'string',
        'slug' => 'string',
        'fulfillment_type' => 'string',
        'billing_anchor_rule' => 'string',
        'billing_anchor_day' => 'int',
        'first_charge_behavior' => 'string',
        'end_behavior' => 'string',
        'max_payments' => 'int',
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
        'product_id' => null,
        'name' => null,
        'description' => null,
        'kind' => null,
        'pricing_model' => null,
        'amount_minor' => null,
        'currency' => null,
        'interval' => null,
        'interval_count' => null,
        'trial_days' => null,
        'usage_meter_id' => null,
        'slug' => null,
        'fulfillment_type' => null,
        'billing_anchor_rule' => null,
        'billing_anchor_day' => null,
        'first_charge_behavior' => null,
        'end_behavior' => null,
        'max_payments' => null,
        'metadata' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'product_id' => false,
        'name' => false,
        'description' => true,
        'kind' => false,
        'pricing_model' => false,
        'amount_minor' => false,
        'currency' => false,
        'interval' => true,
        'interval_count' => true,
        'trial_days' => false,
        'usage_meter_id' => true,
        'slug' => false,
        'fulfillment_type' => false,
        'billing_anchor_rule' => false,
        'billing_anchor_day' => true,
        'first_charge_behavior' => false,
        'end_behavior' => false,
        'max_payments' => true,
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
        'product_id' => 'product_id',
        'name' => 'name',
        'description' => 'description',
        'kind' => 'kind',
        'pricing_model' => 'pricing_model',
        'amount_minor' => 'amount_minor',
        'currency' => 'currency',
        'interval' => 'interval',
        'interval_count' => 'interval_count',
        'trial_days' => 'trial_days',
        'usage_meter_id' => 'usage_meter_id',
        'slug' => 'slug',
        'fulfillment_type' => 'fulfillment_type',
        'billing_anchor_rule' => 'billing_anchor_rule',
        'billing_anchor_day' => 'billing_anchor_day',
        'first_charge_behavior' => 'first_charge_behavior',
        'end_behavior' => 'end_behavior',
        'max_payments' => 'max_payments',
        'metadata' => 'metadata'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'product_id' => 'setProductId',
        'name' => 'setName',
        'description' => 'setDescription',
        'kind' => 'setKind',
        'pricing_model' => 'setPricingModel',
        'amount_minor' => 'setAmountMinor',
        'currency' => 'setCurrency',
        'interval' => 'setInterval',
        'interval_count' => 'setIntervalCount',
        'trial_days' => 'setTrialDays',
        'usage_meter_id' => 'setUsageMeterId',
        'slug' => 'setSlug',
        'fulfillment_type' => 'setFulfillmentType',
        'billing_anchor_rule' => 'setBillingAnchorRule',
        'billing_anchor_day' => 'setBillingAnchorDay',
        'first_charge_behavior' => 'setFirstChargeBehavior',
        'end_behavior' => 'setEndBehavior',
        'max_payments' => 'setMaxPayments',
        'metadata' => 'setMetadata'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'product_id' => 'getProductId',
        'name' => 'getName',
        'description' => 'getDescription',
        'kind' => 'getKind',
        'pricing_model' => 'getPricingModel',
        'amount_minor' => 'getAmountMinor',
        'currency' => 'getCurrency',
        'interval' => 'getInterval',
        'interval_count' => 'getIntervalCount',
        'trial_days' => 'getTrialDays',
        'usage_meter_id' => 'getUsageMeterId',
        'slug' => 'getSlug',
        'fulfillment_type' => 'getFulfillmentType',
        'billing_anchor_rule' => 'getBillingAnchorRule',
        'billing_anchor_day' => 'getBillingAnchorDay',
        'first_charge_behavior' => 'getFirstChargeBehavior',
        'end_behavior' => 'getEndBehavior',
        'max_payments' => 'getMaxPayments',
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

    public const KIND_SUBSCRIPTION = 'subscription';
    public const KIND_ONE_TIME = 'one_time';
    public const KIND_USAGE = 'usage';
    public const PRICING_MODEL_ONE_TIME = 'one_time';
    public const PRICING_MODEL_RECURRING = 'recurring';
    public const PRICING_MODEL_USAGE = 'usage';
    public const FULFILLMENT_TYPE_NONE = 'none';
    public const FULFILLMENT_TYPE_DIGITAL = 'digital';
    public const FULFILLMENT_TYPE_PHYSICAL = 'physical';
    public const BILLING_ANCHOR_RULE_SAME_DAY = 'same_day';
    public const BILLING_ANCHOR_RULE_DAY_OF_MONTH = 'day_of_month';
    public const BILLING_ANCHOR_RULE_LAST_DAY = 'last_day';
    public const FIRST_CHARGE_BEHAVIOR_IMMEDIATE = 'immediate';
    public const FIRST_CHARGE_BEHAVIOR_NEXT_ANCHOR = 'next_anchor';
    public const FIRST_CHARGE_BEHAVIOR_PRORATE = 'prorate';
    public const END_BEHAVIOR_UNTIL_CANCELED = 'until_canceled';
    public const END_BEHAVIOR_FIXED_PAYMENTS = 'fixed_payments';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getKindAllowableValues()
    {
        return [
            self::KIND_SUBSCRIPTION,
            self::KIND_ONE_TIME,
            self::KIND_USAGE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPricingModelAllowableValues()
    {
        return [
            self::PRICING_MODEL_ONE_TIME,
            self::PRICING_MODEL_RECURRING,
            self::PRICING_MODEL_USAGE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFulfillmentTypeAllowableValues()
    {
        return [
            self::FULFILLMENT_TYPE_NONE,
            self::FULFILLMENT_TYPE_DIGITAL,
            self::FULFILLMENT_TYPE_PHYSICAL,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBillingAnchorRuleAllowableValues()
    {
        return [
            self::BILLING_ANCHOR_RULE_SAME_DAY,
            self::BILLING_ANCHOR_RULE_DAY_OF_MONTH,
            self::BILLING_ANCHOR_RULE_LAST_DAY,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFirstChargeBehaviorAllowableValues()
    {
        return [
            self::FIRST_CHARGE_BEHAVIOR_IMMEDIATE,
            self::FIRST_CHARGE_BEHAVIOR_NEXT_ANCHOR,
            self::FIRST_CHARGE_BEHAVIOR_PRORATE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getEndBehaviorAllowableValues()
    {
        return [
            self::END_BEHAVIOR_UNTIL_CANCELED,
            self::END_BEHAVIOR_FIXED_PAYMENTS,
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
        $this->setIfExists('product_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('kind', $data ?? [], null);
        $this->setIfExists('pricing_model', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], 'USD');
        $this->setIfExists('interval', $data ?? [], null);
        $this->setIfExists('interval_count', $data ?? [], null);
        $this->setIfExists('trial_days', $data ?? [], null);
        $this->setIfExists('usage_meter_id', $data ?? [], null);
        $this->setIfExists('slug', $data ?? [], null);
        $this->setIfExists('fulfillment_type', $data ?? [], 'none');
        $this->setIfExists('billing_anchor_rule', $data ?? [], null);
        $this->setIfExists('billing_anchor_day', $data ?? [], null);
        $this->setIfExists('first_charge_behavior', $data ?? [], null);
        $this->setIfExists('end_behavior', $data ?? [], null);
        $this->setIfExists('max_payments', $data ?? [], null);
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

        if ($this->container['product_id'] === null) {
            $invalidProperties[] = "'product_id' can't be null";
        }
        if ((mb_strlen($this->container['product_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'product_id', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ((mb_strlen($this->container['name']) < 1)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['kind'] === null) {
            $invalidProperties[] = "'kind' can't be null";
        }
        $allowedValues = $this->getKindAllowableValues();
        if (!is_null($this->container['kind']) && !in_array($this->container['kind'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'kind', must be one of '%s'",
                $this->container['kind'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['pricing_model'] === null) {
            $invalidProperties[] = "'pricing_model' can't be null";
        }
        $allowedValues = $this->getPricingModelAllowableValues();
        if (!is_null($this->container['pricing_model']) && !in_array($this->container['pricing_model'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'pricing_model', must be one of '%s'",
                $this->container['pricing_model'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['amount_minor'] === null) {
            $invalidProperties[] = "'amount_minor' can't be null";
        }
        if (($this->container['amount_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'amount_minor', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['trial_days']) && ($this->container['trial_days'] < 0)) {
            $invalidProperties[] = "invalid value for 'trial_days', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getFulfillmentTypeAllowableValues();
        if (!is_null($this->container['fulfillment_type']) && !in_array($this->container['fulfillment_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'fulfillment_type', must be one of '%s'",
                $this->container['fulfillment_type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getBillingAnchorRuleAllowableValues();
        if (!is_null($this->container['billing_anchor_rule']) && !in_array($this->container['billing_anchor_rule'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'billing_anchor_rule', must be one of '%s'",
                $this->container['billing_anchor_rule'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['billing_anchor_day']) && ($this->container['billing_anchor_day'] > 31)) {
            $invalidProperties[] = "invalid value for 'billing_anchor_day', must be smaller than or equal to 31.";
        }

        if (!is_null($this->container['billing_anchor_day']) && ($this->container['billing_anchor_day'] < 1)) {
            $invalidProperties[] = "invalid value for 'billing_anchor_day', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getFirstChargeBehaviorAllowableValues();
        if (!is_null($this->container['first_charge_behavior']) && !in_array($this->container['first_charge_behavior'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'first_charge_behavior', must be one of '%s'",
                $this->container['first_charge_behavior'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getEndBehaviorAllowableValues();
        if (!is_null($this->container['end_behavior']) && !in_array($this->container['end_behavior'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'end_behavior', must be one of '%s'",
                $this->container['end_behavior'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['max_payments']) && ($this->container['max_payments'] > 999)) {
            $invalidProperties[] = "invalid value for 'max_payments', must be smaller than or equal to 999.";
        }

        if (!is_null($this->container['max_payments']) && ($this->container['max_payments'] < 1)) {
            $invalidProperties[] = "invalid value for 'max_payments', must be bigger than or equal to 1.";
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
     * Gets product_id
     *
     * @return string
     */
    public function getProductId()
    {
        return $this->container['product_id'];
    }

    /**
     * Sets product_id
     *
     * @param string $product_id product_id
     *
     * @return self
     */
    public function setProductId($product_id)
    {
        if (is_null($product_id)) {
            throw new \InvalidArgumentException('non-nullable product_id cannot be null');
        }

        if ((mb_strlen($product_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $product_id when calling CreateProductRequest., must be bigger than or equal to 1.');
        }

        $this->container['product_id'] = $product_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }

        if ((mb_strlen($name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $name when calling CreateProductRequest., must be bigger than or equal to 1.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description description
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            array_push($this->openAPINullablesSetToNull, 'description');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('description', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets kind
     *
     * @return string
     */
    public function getKind()
    {
        return $this->container['kind'];
    }

    /**
     * Sets kind
     *
     * @param string $kind kind
     *
     * @return self
     */
    public function setKind($kind)
    {
        if (is_null($kind)) {
            throw new \InvalidArgumentException('non-nullable kind cannot be null');
        }
        $allowedValues = $this->getKindAllowableValues();
        if (!in_array($kind, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'kind', must be one of '%s'",
                    $kind,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['kind'] = $kind;

        return $this;
    }

    /**
     * Gets pricing_model
     *
     * @return string
     */
    public function getPricingModel()
    {
        return $this->container['pricing_model'];
    }

    /**
     * Sets pricing_model
     *
     * @param string $pricing_model pricing_model
     *
     * @return self
     */
    public function setPricingModel($pricing_model)
    {
        if (is_null($pricing_model)) {
            throw new \InvalidArgumentException('non-nullable pricing_model cannot be null');
        }
        $allowedValues = $this->getPricingModelAllowableValues();
        if (!in_array($pricing_model, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'pricing_model', must be one of '%s'",
                    $pricing_model,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['pricing_model'] = $pricing_model;

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

        if (($amount_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $amount_minor when calling CreateProductRequest., must be bigger than or equal to 0.');
        }

        $this->container['amount_minor'] = $amount_minor;

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
     * Gets interval
     *
     * @return string|null
     */
    public function getInterval()
    {
        return $this->container['interval'];
    }

    /**
     * Sets interval
     *
     * @param string|null $interval interval
     *
     * @return self
     */
    public function setInterval($interval)
    {
        if (is_null($interval)) {
            array_push($this->openAPINullablesSetToNull, 'interval');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('interval', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['interval'] = $interval;

        return $this;
    }

    /**
     * Gets interval_count
     *
     * @return int|null
     */
    public function getIntervalCount()
    {
        return $this->container['interval_count'];
    }

    /**
     * Sets interval_count
     *
     * @param int|null $interval_count interval_count
     *
     * @return self
     */
    public function setIntervalCount($interval_count)
    {
        if (is_null($interval_count)) {
            array_push($this->openAPINullablesSetToNull, 'interval_count');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('interval_count', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['interval_count'] = $interval_count;

        return $this;
    }

    /**
     * Gets trial_days
     *
     * @return int|null
     */
    public function getTrialDays()
    {
        return $this->container['trial_days'];
    }

    /**
     * Sets trial_days
     *
     * @param int|null $trial_days trial_days
     *
     * @return self
     */
    public function setTrialDays($trial_days)
    {
        if (is_null($trial_days)) {
            throw new \InvalidArgumentException('non-nullable trial_days cannot be null');
        }

        if (($trial_days < 0)) {
            throw new \InvalidArgumentException('invalid value for $trial_days when calling CreateProductRequest., must be bigger than or equal to 0.');
        }

        $this->container['trial_days'] = $trial_days;

        return $this;
    }

    /**
     * Gets usage_meter_id
     *
     * @return string|null
     */
    public function getUsageMeterId()
    {
        return $this->container['usage_meter_id'];
    }

    /**
     * Sets usage_meter_id
     *
     * @param string|null $usage_meter_id usage_meter_id
     *
     * @return self
     */
    public function setUsageMeterId($usage_meter_id)
    {
        if (is_null($usage_meter_id)) {
            array_push($this->openAPINullablesSetToNull, 'usage_meter_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('usage_meter_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['usage_meter_id'] = $usage_meter_id;

        return $this;
    }

    /**
     * Gets slug
     *
     * @return string|null
     */
    public function getSlug()
    {
        return $this->container['slug'];
    }

    /**
     * Sets slug
     *
     * @param string|null $slug slug
     *
     * @return self
     */
    public function setSlug($slug)
    {
        if (is_null($slug)) {
            throw new \InvalidArgumentException('non-nullable slug cannot be null');
        }
        $this->container['slug'] = $slug;

        return $this;
    }

    /**
     * Gets fulfillment_type
     *
     * @return string|null
     */
    public function getFulfillmentType()
    {
        return $this->container['fulfillment_type'];
    }

    /**
     * Sets fulfillment_type
     *
     * @param string|null $fulfillment_type Fulfillment type for the product. Defaults to 'none' (service).
     *
     * @return self
     */
    public function setFulfillmentType($fulfillment_type)
    {
        if (is_null($fulfillment_type)) {
            throw new \InvalidArgumentException('non-nullable fulfillment_type cannot be null');
        }
        $allowedValues = $this->getFulfillmentTypeAllowableValues();
        if (!in_array($fulfillment_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'fulfillment_type', must be one of '%s'",
                    $fulfillment_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['fulfillment_type'] = $fulfillment_type;

        return $this;
    }

    /**
     * Gets billing_anchor_rule
     *
     * @return string|null
     */
    public function getBillingAnchorRule()
    {
        return $this->container['billing_anchor_rule'];
    }

    /**
     * Sets billing_anchor_rule
     *
     * @param string|null $billing_anchor_rule How billing dates are calculated. same_day: Bill on same day as start. day_of_month: Bill on specific day (1-31). last_day: Bill on last day of month.
     *
     * @return self
     */
    public function setBillingAnchorRule($billing_anchor_rule)
    {
        if (is_null($billing_anchor_rule)) {
            throw new \InvalidArgumentException('non-nullable billing_anchor_rule cannot be null');
        }
        $allowedValues = $this->getBillingAnchorRuleAllowableValues();
        if (!in_array($billing_anchor_rule, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'billing_anchor_rule', must be one of '%s'",
                    $billing_anchor_rule,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['billing_anchor_rule'] = $billing_anchor_rule;

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
     * @param int|null $billing_anchor_day Day of month (1-31) when billing_anchor_rule is 'day_of_month'
     *
     * @return self
     */
    public function setBillingAnchorDay($billing_anchor_day)
    {
        if (is_null($billing_anchor_day)) {
            array_push($this->openAPINullablesSetToNull, 'billing_anchor_day');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('billing_anchor_day', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($billing_anchor_day) && ($billing_anchor_day > 31)) {
            throw new \InvalidArgumentException('invalid value for $billing_anchor_day when calling CreateProductRequest., must be smaller than or equal to 31.');
        }
        if (!is_null($billing_anchor_day) && ($billing_anchor_day < 1)) {
            throw new \InvalidArgumentException('invalid value for $billing_anchor_day when calling CreateProductRequest., must be bigger than or equal to 1.');
        }

        $this->container['billing_anchor_day'] = $billing_anchor_day;

        return $this;
    }

    /**
     * Gets first_charge_behavior
     *
     * @return string|null
     */
    public function getFirstChargeBehavior()
    {
        return $this->container['first_charge_behavior'];
    }

    /**
     * Sets first_charge_behavior
     *
     * @param string|null $first_charge_behavior When first payment is collected. immediate: Charge on start. next_anchor: Charge on first scheduled date. prorate: Prorate until first date.
     *
     * @return self
     */
    public function setFirstChargeBehavior($first_charge_behavior)
    {
        if (is_null($first_charge_behavior)) {
            throw new \InvalidArgumentException('non-nullable first_charge_behavior cannot be null');
        }
        $allowedValues = $this->getFirstChargeBehaviorAllowableValues();
        if (!in_array($first_charge_behavior, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'first_charge_behavior', must be one of '%s'",
                    $first_charge_behavior,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['first_charge_behavior'] = $first_charge_behavior;

        return $this;
    }

    /**
     * Gets end_behavior
     *
     * @return string|null
     */
    public function getEndBehavior()
    {
        return $this->container['end_behavior'];
    }

    /**
     * Sets end_behavior
     *
     * @param string|null $end_behavior How subscription ends. until_canceled: Runs forever. fixed_payments: Ends after N billing cycles.
     *
     * @return self
     */
    public function setEndBehavior($end_behavior)
    {
        if (is_null($end_behavior)) {
            throw new \InvalidArgumentException('non-nullable end_behavior cannot be null');
        }
        $allowedValues = $this->getEndBehaviorAllowableValues();
        if (!in_array($end_behavior, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'end_behavior', must be one of '%s'",
                    $end_behavior,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['end_behavior'] = $end_behavior;

        return $this;
    }

    /**
     * Gets max_payments
     *
     * @return int|null
     */
    public function getMaxPayments()
    {
        return $this->container['max_payments'];
    }

    /**
     * Sets max_payments
     *
     * @param int|null $max_payments Max billing cycles when end_behavior is 'fixed_payments'
     *
     * @return self
     */
    public function setMaxPayments($max_payments)
    {
        if (is_null($max_payments)) {
            array_push($this->openAPINullablesSetToNull, 'max_payments');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('max_payments', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($max_payments) && ($max_payments > 999)) {
            throw new \InvalidArgumentException('invalid value for $max_payments when calling CreateProductRequest., must be smaller than or equal to 999.');
        }
        if (!is_null($max_payments) && ($max_payments < 1)) {
            throw new \InvalidArgumentException('invalid value for $max_payments when calling CreateProductRequest., must be bigger than or equal to 1.');
        }

        $this->container['max_payments'] = $max_payments;

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
     * @param array<string,mixed>|null $metadata Arbitrary key-value metadata for the product
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


