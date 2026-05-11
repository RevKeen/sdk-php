<?php
/**
 * InvoiceSubscriptionTerms
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
 * InvoiceSubscriptionTerms Class Doc Comment
 *
 * @category Class
 * @description Subscription billing terms for recurring invoices
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class InvoiceSubscriptionTerms implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Invoice_subscription_terms';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'collection_method' => 'string',
        'start_mode' => 'string',
        'start_date' => 'string',
        'duration_type' => 'string',
        'duration_count' => 'int',
        'end_date' => 'string',
        'first_payment_behavior' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'collection_method' => null,
        'start_mode' => null,
        'start_date' => null,
        'duration_type' => null,
        'duration_count' => null,
        'end_date' => null,
        'first_payment_behavior' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'collection_method' => false,
        'start_mode' => false,
        'start_date' => false,
        'duration_type' => false,
        'duration_count' => false,
        'end_date' => false,
        'first_payment_behavior' => false
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
        'collection_method' => 'collection_method',
        'start_mode' => 'start_mode',
        'start_date' => 'start_date',
        'duration_type' => 'duration_type',
        'duration_count' => 'duration_count',
        'end_date' => 'end_date',
        'first_payment_behavior' => 'first_payment_behavior'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'collection_method' => 'setCollectionMethod',
        'start_mode' => 'setStartMode',
        'start_date' => 'setStartDate',
        'duration_type' => 'setDurationType',
        'duration_count' => 'setDurationCount',
        'end_date' => 'setEndDate',
        'first_payment_behavior' => 'setFirstPaymentBehavior'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'collection_method' => 'getCollectionMethod',
        'start_mode' => 'getStartMode',
        'start_date' => 'getStartDate',
        'duration_type' => 'getDurationType',
        'duration_count' => 'getDurationCount',
        'end_date' => 'getEndDate',
        'first_payment_behavior' => 'getFirstPaymentBehavior'
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

    public const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    public const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';
    public const START_MODE_WHEN_PAID = 'when_paid';
    public const START_MODE_ON_INVOICE_DATE = 'on_invoice_date';
    public const START_MODE_FIRST_OF_NEXT_MONTH = 'first_of_next_month';
    public const START_MODE_SPECIFIC_DATE = 'specific_date';
    public const DURATION_TYPE_UNTIL_CANCELLED = 'until_cancelled';
    public const DURATION_TYPE_FIXED_CYCLES = 'fixed_cycles';
    public const DURATION_TYPE_END_DATE = 'end_date';
    public const FIRST_PAYMENT_BEHAVIOR_CHARGE_FIRST_CYCLE_NOW = 'charge_first_cycle_now';
    public const FIRST_PAYMENT_BEHAVIOR_DEFER_FIRST_CYCLE_TO_START_DATE = 'defer_first_cycle_to_start_date';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCollectionMethodAllowableValues()
    {
        return [
            self::COLLECTION_METHOD_CHARGE_AUTOMATICALLY,
            self::COLLECTION_METHOD_SEND_INVOICE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStartModeAllowableValues()
    {
        return [
            self::START_MODE_WHEN_PAID,
            self::START_MODE_ON_INVOICE_DATE,
            self::START_MODE_FIRST_OF_NEXT_MONTH,
            self::START_MODE_SPECIFIC_DATE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDurationTypeAllowableValues()
    {
        return [
            self::DURATION_TYPE_UNTIL_CANCELLED,
            self::DURATION_TYPE_FIXED_CYCLES,
            self::DURATION_TYPE_END_DATE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFirstPaymentBehaviorAllowableValues()
    {
        return [
            self::FIRST_PAYMENT_BEHAVIOR_CHARGE_FIRST_CYCLE_NOW,
            self::FIRST_PAYMENT_BEHAVIOR_DEFER_FIRST_CYCLE_TO_START_DATE,
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
        $this->setIfExists('collection_method', $data ?? [], null);
        $this->setIfExists('start_mode', $data ?? [], null);
        $this->setIfExists('start_date', $data ?? [], null);
        $this->setIfExists('duration_type', $data ?? [], null);
        $this->setIfExists('duration_count', $data ?? [], null);
        $this->setIfExists('end_date', $data ?? [], null);
        $this->setIfExists('first_payment_behavior', $data ?? [], null);
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

        if ($this->container['collection_method'] === null) {
            $invalidProperties[] = "'collection_method' can't be null";
        }
        $allowedValues = $this->getCollectionMethodAllowableValues();
        if (!is_null($this->container['collection_method']) && !in_array($this->container['collection_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'collection_method', must be one of '%s'",
                $this->container['collection_method'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['start_mode'] === null) {
            $invalidProperties[] = "'start_mode' can't be null";
        }
        $allowedValues = $this->getStartModeAllowableValues();
        if (!is_null($this->container['start_mode']) && !in_array($this->container['start_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'start_mode', must be one of '%s'",
                $this->container['start_mode'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['duration_type'] === null) {
            $invalidProperties[] = "'duration_type' can't be null";
        }
        $allowedValues = $this->getDurationTypeAllowableValues();
        if (!is_null($this->container['duration_type']) && !in_array($this->container['duration_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'duration_type', must be one of '%s'",
                $this->container['duration_type'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['duration_count']) && ($this->container['duration_count'] < 1)) {
            $invalidProperties[] = "invalid value for 'duration_count', must be bigger than or equal to 1.";
        }

        if ($this->container['first_payment_behavior'] === null) {
            $invalidProperties[] = "'first_payment_behavior' can't be null";
        }
        $allowedValues = $this->getFirstPaymentBehaviorAllowableValues();
        if (!is_null($this->container['first_payment_behavior']) && !in_array($this->container['first_payment_behavior'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'first_payment_behavior', must be one of '%s'",
                $this->container['first_payment_behavior'],
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
     * Gets collection_method
     *
     * @return string
     */
    public function getCollectionMethod()
    {
        return $this->container['collection_method'];
    }

    /**
     * Sets collection_method
     *
     * @param string $collection_method How to collect payment for recurring invoices
     *
     * @return self
     */
    public function setCollectionMethod($collection_method)
    {
        if (is_null($collection_method)) {
            throw new \InvalidArgumentException('non-nullable collection_method cannot be null');
        }
        $allowedValues = $this->getCollectionMethodAllowableValues();
        if (!in_array($collection_method, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'collection_method', must be one of '%s'",
                    $collection_method,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['collection_method'] = $collection_method;

        return $this;
    }

    /**
     * Gets start_mode
     *
     * @return string
     */
    public function getStartMode()
    {
        return $this->container['start_mode'];
    }

    /**
     * Sets start_mode
     *
     * @param string $start_mode When the subscription billing cycle starts
     *
     * @return self
     */
    public function setStartMode($start_mode)
    {
        if (is_null($start_mode)) {
            throw new \InvalidArgumentException('non-nullable start_mode cannot be null');
        }
        $allowedValues = $this->getStartModeAllowableValues();
        if (!in_array($start_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'start_mode', must be one of '%s'",
                    $start_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['start_mode'] = $start_mode;

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
     * @param string|null $start_date Start date (ISO 8601) — required when start_mode is 'specific_date'
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
     * Gets duration_type
     *
     * @return string
     */
    public function getDurationType()
    {
        return $this->container['duration_type'];
    }

    /**
     * Sets duration_type
     *
     * @param string $duration_type How the subscription duration is determined
     *
     * @return self
     */
    public function setDurationType($duration_type)
    {
        if (is_null($duration_type)) {
            throw new \InvalidArgumentException('non-nullable duration_type cannot be null');
        }
        $allowedValues = $this->getDurationTypeAllowableValues();
        if (!in_array($duration_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'duration_type', must be one of '%s'",
                    $duration_type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['duration_type'] = $duration_type;

        return $this;
    }

    /**
     * Gets duration_count
     *
     * @return int|null
     */
    public function getDurationCount()
    {
        return $this->container['duration_count'];
    }

    /**
     * Sets duration_count
     *
     * @param int|null $duration_count Number of billing cycles — required when duration_type is 'fixed_cycles'
     *
     * @return self
     */
    public function setDurationCount($duration_count)
    {
        if (is_null($duration_count)) {
            throw new \InvalidArgumentException('non-nullable duration_count cannot be null');
        }

        if (($duration_count < 1)) {
            throw new \InvalidArgumentException('invalid value for $duration_count when calling InvoiceSubscriptionTerms., must be bigger than or equal to 1.');
        }

        $this->container['duration_count'] = $duration_count;

        return $this;
    }

    /**
     * Gets end_date
     *
     * @return string|null
     */
    public function getEndDate()
    {
        return $this->container['end_date'];
    }

    /**
     * Sets end_date
     *
     * @param string|null $end_date End date (ISO 8601) — required when duration_type is 'end_date'
     *
     * @return self
     */
    public function setEndDate($end_date)
    {
        if (is_null($end_date)) {
            throw new \InvalidArgumentException('non-nullable end_date cannot be null');
        }
        $this->container['end_date'] = $end_date;

        return $this;
    }

    /**
     * Gets first_payment_behavior
     *
     * @return string
     */
    public function getFirstPaymentBehavior()
    {
        return $this->container['first_payment_behavior'];
    }

    /**
     * Sets first_payment_behavior
     *
     * @param string $first_payment_behavior Whether to charge the first cycle immediately or defer to the start date
     *
     * @return self
     */
    public function setFirstPaymentBehavior($first_payment_behavior)
    {
        if (is_null($first_payment_behavior)) {
            throw new \InvalidArgumentException('non-nullable first_payment_behavior cannot be null');
        }
        $allowedValues = $this->getFirstPaymentBehaviorAllowableValues();
        if (!in_array($first_payment_behavior, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'first_payment_behavior', must be one of '%s'",
                    $first_payment_behavior,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['first_payment_behavior'] = $first_payment_behavior;

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


