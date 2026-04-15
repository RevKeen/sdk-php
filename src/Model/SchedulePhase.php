<?php
/**
 * SchedulePhase
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-01-15` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Sandbox** | `https://sandbox-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Sandbox** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
 *
 * The version of the OpenAPI document: 2026-01-15
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
 * SchedulePhase Class Doc Comment
 *
 * @category Class
 * @description A time-bounded phase within a subscription schedule, with its own pricing, quantities, and billing configuration.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SchedulePhase implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SchedulePhase';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'items' => '\RevKeen\Model\PhaseItem[]',
        'start_date' => 'string',
        'end_date' => 'string',
        'proration_behavior' => 'string',
        'billing_cycle_anchor' => 'string',
        'default_payment_method' => 'string',
        'collection_method' => 'string',
        'coupon' => 'string',
        'trial_end' => 'string',
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
        'items' => null,
        'start_date' => null,
        'end_date' => null,
        'proration_behavior' => null,
        'billing_cycle_anchor' => null,
        'default_payment_method' => 'uuid',
        'collection_method' => null,
        'coupon' => null,
        'trial_end' => null,
        'metadata' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'items' => false,
        'start_date' => false,
        'end_date' => true,
        'proration_behavior' => false,
        'billing_cycle_anchor' => true,
        'default_payment_method' => true,
        'collection_method' => false,
        'coupon' => true,
        'trial_end' => true,
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
        'items' => 'items',
        'start_date' => 'start_date',
        'end_date' => 'end_date',
        'proration_behavior' => 'proration_behavior',
        'billing_cycle_anchor' => 'billing_cycle_anchor',
        'default_payment_method' => 'default_payment_method',
        'collection_method' => 'collection_method',
        'coupon' => 'coupon',
        'trial_end' => 'trial_end',
        'metadata' => 'metadata'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'items' => 'setItems',
        'start_date' => 'setStartDate',
        'end_date' => 'setEndDate',
        'proration_behavior' => 'setProrationBehavior',
        'billing_cycle_anchor' => 'setBillingCycleAnchor',
        'default_payment_method' => 'setDefaultPaymentMethod',
        'collection_method' => 'setCollectionMethod',
        'coupon' => 'setCoupon',
        'trial_end' => 'setTrialEnd',
        'metadata' => 'setMetadata'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'items' => 'getItems',
        'start_date' => 'getStartDate',
        'end_date' => 'getEndDate',
        'proration_behavior' => 'getProrationBehavior',
        'billing_cycle_anchor' => 'getBillingCycleAnchor',
        'default_payment_method' => 'getDefaultPaymentMethod',
        'collection_method' => 'getCollectionMethod',
        'coupon' => 'getCoupon',
        'trial_end' => 'getTrialEnd',
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

    public const PRORATION_BEHAVIOR_CREATE_PRORATIONS = 'create_prorations';
    public const PRORATION_BEHAVIOR_NONE = 'none';
    public const PRORATION_BEHAVIOR_ALWAYS_INVOICE = 'always_invoice';
    public const COLLECTION_METHOD_CHARGE_AUTOMATICALLY = 'charge_automatically';
    public const COLLECTION_METHOD_SEND_INVOICE = 'send_invoice';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProrationBehaviorAllowableValues()
    {
        return [
            self::PRORATION_BEHAVIOR_CREATE_PRORATIONS,
            self::PRORATION_BEHAVIOR_NONE,
            self::PRORATION_BEHAVIOR_ALWAYS_INVOICE,
        ];
    }

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
        $this->setIfExists('items', $data ?? [], null);
        $this->setIfExists('start_date', $data ?? [], null);
        $this->setIfExists('end_date', $data ?? [], null);
        $this->setIfExists('proration_behavior', $data ?? [], null);
        $this->setIfExists('billing_cycle_anchor', $data ?? [], null);
        $this->setIfExists('default_payment_method', $data ?? [], null);
        $this->setIfExists('collection_method', $data ?? [], null);
        $this->setIfExists('coupon', $data ?? [], null);
        $this->setIfExists('trial_end', $data ?? [], null);
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

        if ($this->container['items'] === null) {
            $invalidProperties[] = "'items' can't be null";
        }
        if ((count($this->container['items']) < 1)) {
            $invalidProperties[] = "invalid value for 'items', number of items must be greater than or equal to 1.";
        }

        if ($this->container['start_date'] === null) {
            $invalidProperties[] = "'start_date' can't be null";
        }
        $allowedValues = $this->getProrationBehaviorAllowableValues();
        if (!is_null($this->container['proration_behavior']) && !in_array($this->container['proration_behavior'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'proration_behavior', must be one of '%s'",
                $this->container['proration_behavior'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getCollectionMethodAllowableValues();
        if (!is_null($this->container['collection_method']) && !in_array($this->container['collection_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'collection_method', must be one of '%s'",
                $this->container['collection_method'],
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
     * Gets items
     *
     * @return \RevKeen\Model\PhaseItem[]
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \RevKeen\Model\PhaseItem[] $items Products/prices included in this phase
     *
     * @return self
     */
    public function setItems($items)
    {
        if (is_null($items)) {
            throw new \InvalidArgumentException('non-nullable items cannot be null');
        }


        if ((count($items) < 1)) {
            throw new \InvalidArgumentException('invalid length for $items when calling SchedulePhase., number of items must be greater than or equal to 1.');
        }
        $this->container['items'] = $items;

        return $this;
    }

    /**
     * Gets start_date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->container['start_date'];
    }

    /**
     * Sets start_date
     *
     * @param string $start_date When this phase starts (ISO 8601 date)
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
     * @param string|null $end_date When this phase ends (null for indefinite)
     *
     * @return self
     */
    public function setEndDate($end_date)
    {
        if (is_null($end_date)) {
            array_push($this->openAPINullablesSetToNull, 'end_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('end_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['end_date'] = $end_date;

        return $this;
    }

    /**
     * Gets proration_behavior
     *
     * @return string|null
     */
    public function getProrationBehavior()
    {
        return $this->container['proration_behavior'];
    }

    /**
     * Sets proration_behavior
     *
     * @param string|null $proration_behavior How to handle prorations when entering this phase
     *
     * @return self
     */
    public function setProrationBehavior($proration_behavior)
    {
        if (is_null($proration_behavior)) {
            throw new \InvalidArgumentException('non-nullable proration_behavior cannot be null');
        }
        $allowedValues = $this->getProrationBehaviorAllowableValues();
        if (!in_array($proration_behavior, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'proration_behavior', must be one of '%s'",
                    $proration_behavior,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['proration_behavior'] = $proration_behavior;

        return $this;
    }

    /**
     * Gets billing_cycle_anchor
     *
     * @return string|null
     */
    public function getBillingCycleAnchor()
    {
        return $this->container['billing_cycle_anchor'];
    }

    /**
     * Sets billing_cycle_anchor
     *
     * @param string|null $billing_cycle_anchor Override billing cycle anchor for this phase
     *
     * @return self
     */
    public function setBillingCycleAnchor($billing_cycle_anchor)
    {
        if (is_null($billing_cycle_anchor)) {
            array_push($this->openAPINullablesSetToNull, 'billing_cycle_anchor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('billing_cycle_anchor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['billing_cycle_anchor'] = $billing_cycle_anchor;

        return $this;
    }

    /**
     * Gets default_payment_method
     *
     * @return string|null
     */
    public function getDefaultPaymentMethod()
    {
        return $this->container['default_payment_method'];
    }

    /**
     * Sets default_payment_method
     *
     * @param string|null $default_payment_method Payment method to use for this phase
     *
     * @return self
     */
    public function setDefaultPaymentMethod($default_payment_method)
    {
        if (is_null($default_payment_method)) {
            array_push($this->openAPINullablesSetToNull, 'default_payment_method');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('default_payment_method', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['default_payment_method'] = $default_payment_method;

        return $this;
    }

    /**
     * Gets collection_method
     *
     * @return string|null
     */
    public function getCollectionMethod()
    {
        return $this->container['collection_method'];
    }

    /**
     * Sets collection_method
     *
     * @param string|null $collection_method How to collect payment for this phase
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
     * Gets coupon
     *
     * @return string|null
     */
    public function getCoupon()
    {
        return $this->container['coupon'];
    }

    /**
     * Sets coupon
     *
     * @param string|null $coupon Coupon code to apply during this phase
     *
     * @return self
     */
    public function setCoupon($coupon)
    {
        if (is_null($coupon)) {
            array_push($this->openAPINullablesSetToNull, 'coupon');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('coupon', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['coupon'] = $coupon;

        return $this;
    }

    /**
     * Gets trial_end
     *
     * @return string|null
     */
    public function getTrialEnd()
    {
        return $this->container['trial_end'];
    }

    /**
     * Sets trial_end
     *
     * @param string|null $trial_end End of trial period (if applicable)
     *
     * @return self
     */
    public function setTrialEnd($trial_end)
    {
        if (is_null($trial_end)) {
            array_push($this->openAPINullablesSetToNull, 'trial_end');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('trial_end', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['trial_end'] = $trial_end;

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
     * @param array<string,mixed>|null $metadata Phase-specific metadata
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


