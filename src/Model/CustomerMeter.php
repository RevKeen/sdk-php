<?php
/**
 * CustomerMeter
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
 * CustomerMeter Class Doc Comment
 *
 * @category Class
 * @description An on-the-fly aggregate of a customer&#39;s consumption for a single meter. RevKeen computes this live from &#x60;usage_events&#x60; — there is no separate &#x60;customer_meters&#x60; table to keep in sync.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CustomerMeter implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CustomerMeter';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'object' => 'string',
        'customer_id' => 'string',
        'meter_id' => 'string',
        'meter_name' => 'string',
        'meter_event_name' => 'string',
        'aggregation' => 'string',
        'unit_name' => 'string',
        'total_quantity' => 'float',
        'event_count' => 'int',
        'last_event_at' => '\DateTime'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'object' => null,
        'customer_id' => 'uuid',
        'meter_id' => 'uuid',
        'meter_name' => null,
        'meter_event_name' => null,
        'aggregation' => null,
        'unit_name' => null,
        'total_quantity' => null,
        'event_count' => null,
        'last_event_at' => 'date-time'
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'object' => false,
        'customer_id' => false,
        'meter_id' => false,
        'meter_name' => false,
        'meter_event_name' => false,
        'aggregation' => false,
        'unit_name' => true,
        'total_quantity' => false,
        'event_count' => false,
        'last_event_at' => true
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
        'object' => 'object',
        'customer_id' => 'customer_id',
        'meter_id' => 'meter_id',
        'meter_name' => 'meter_name',
        'meter_event_name' => 'meter_event_name',
        'aggregation' => 'aggregation',
        'unit_name' => 'unit_name',
        'total_quantity' => 'total_quantity',
        'event_count' => 'event_count',
        'last_event_at' => 'last_event_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'object' => 'setObject',
        'customer_id' => 'setCustomerId',
        'meter_id' => 'setMeterId',
        'meter_name' => 'setMeterName',
        'meter_event_name' => 'setMeterEventName',
        'aggregation' => 'setAggregation',
        'unit_name' => 'setUnitName',
        'total_quantity' => 'setTotalQuantity',
        'event_count' => 'setEventCount',
        'last_event_at' => 'setLastEventAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'object' => 'getObject',
        'customer_id' => 'getCustomerId',
        'meter_id' => 'getMeterId',
        'meter_name' => 'getMeterName',
        'meter_event_name' => 'getMeterEventName',
        'aggregation' => 'getAggregation',
        'unit_name' => 'getUnitName',
        'total_quantity' => 'getTotalQuantity',
        'event_count' => 'getEventCount',
        'last_event_at' => 'getLastEventAt'
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

    public const OBJECT_CUSTOMER_METER = 'customer_meter';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getObjectAllowableValues()
    {
        return [
            self::OBJECT_CUSTOMER_METER,
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
        $this->setIfExists('object', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('meter_id', $data ?? [], null);
        $this->setIfExists('meter_name', $data ?? [], null);
        $this->setIfExists('meter_event_name', $data ?? [], null);
        $this->setIfExists('aggregation', $data ?? [], null);
        $this->setIfExists('unit_name', $data ?? [], null);
        $this->setIfExists('total_quantity', $data ?? [], null);
        $this->setIfExists('event_count', $data ?? [], null);
        $this->setIfExists('last_event_at', $data ?? [], null);
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

        if ($this->container['customer_id'] === null) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if ($this->container['meter_id'] === null) {
            $invalidProperties[] = "'meter_id' can't be null";
        }
        if ($this->container['meter_name'] === null) {
            $invalidProperties[] = "'meter_name' can't be null";
        }
        if ($this->container['meter_event_name'] === null) {
            $invalidProperties[] = "'meter_event_name' can't be null";
        }
        if ($this->container['aggregation'] === null) {
            $invalidProperties[] = "'aggregation' can't be null";
        }
        if ($this->container['unit_name'] === null && !$this->isNullableSetToNull('unit_name')) {
            $invalidProperties[] = "'unit_name' can't be null";
        }
        if ($this->container['total_quantity'] === null) {
            $invalidProperties[] = "'total_quantity' can't be null";
        }
        if ($this->container['event_count'] === null) {
            $invalidProperties[] = "'event_count' can't be null";
        }
        if ($this->container['last_event_at'] === null && !$this->isNullableSetToNull('last_event_at')) {
            $invalidProperties[] = "'last_event_at' can't be null";
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
     * Gets meter_id
     *
     * @return string
     */
    public function getMeterId()
    {
        return $this->container['meter_id'];
    }

    /**
     * Sets meter_id
     *
     * @param string $meter_id meter_id
     *
     * @return self
     */
    public function setMeterId($meter_id)
    {
        if (is_null($meter_id)) {
            throw new \InvalidArgumentException('non-nullable meter_id cannot be null');
        }
        $this->container['meter_id'] = $meter_id;

        return $this;
    }

    /**
     * Gets meter_name
     *
     * @return string
     */
    public function getMeterName()
    {
        return $this->container['meter_name'];
    }

    /**
     * Sets meter_name
     *
     * @param string $meter_name meter_name
     *
     * @return self
     */
    public function setMeterName($meter_name)
    {
        if (is_null($meter_name)) {
            throw new \InvalidArgumentException('non-nullable meter_name cannot be null');
        }
        $this->container['meter_name'] = $meter_name;

        return $this;
    }

    /**
     * Gets meter_event_name
     *
     * @return string
     */
    public function getMeterEventName()
    {
        return $this->container['meter_event_name'];
    }

    /**
     * Sets meter_event_name
     *
     * @param string $meter_event_name The `event_name` the merchant's code posts to /v2/usage-events for this meter.
     *
     * @return self
     */
    public function setMeterEventName($meter_event_name)
    {
        if (is_null($meter_event_name)) {
            throw new \InvalidArgumentException('non-nullable meter_event_name cannot be null');
        }
        $this->container['meter_event_name'] = $meter_event_name;

        return $this;
    }

    /**
     * Gets aggregation
     *
     * @return string
     */
    public function getAggregation()
    {
        return $this->container['aggregation'];
    }

    /**
     * Sets aggregation
     *
     * @param string $aggregation How quantities are aggregated. Typical values: `sum`, `count`, `max`, `unique`.
     *
     * @return self
     */
    public function setAggregation($aggregation)
    {
        if (is_null($aggregation)) {
            throw new \InvalidArgumentException('non-nullable aggregation cannot be null');
        }
        $this->container['aggregation'] = $aggregation;

        return $this;
    }

    /**
     * Gets unit_name
     *
     * @return string|null
     */
    public function getUnitName()
    {
        return $this->container['unit_name'];
    }

    /**
     * Sets unit_name
     *
     * @param string|null $unit_name Human-readable unit for display (e.g. `tokens`, `requests`, `GB`). Merchant-configurable.
     *
     * @return self
     */
    public function setUnitName($unit_name)
    {
        if (is_null($unit_name)) {
            array_push($this->openAPINullablesSetToNull, 'unit_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('unit_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['unit_name'] = $unit_name;

        return $this;
    }

    /**
     * Gets total_quantity
     *
     * @return float
     */
    public function getTotalQuantity()
    {
        return $this->container['total_quantity'];
    }

    /**
     * Sets total_quantity
     *
     * @param float $total_quantity Aggregate across all usage events for this (customer, meter) pair. The aggregation function applied matches the meter's `aggregation` field.
     *
     * @return self
     */
    public function setTotalQuantity($total_quantity)
    {
        if (is_null($total_quantity)) {
            throw new \InvalidArgumentException('non-nullable total_quantity cannot be null');
        }
        $this->container['total_quantity'] = $total_quantity;

        return $this;
    }

    /**
     * Gets event_count
     *
     * @return int
     */
    public function getEventCount()
    {
        return $this->container['event_count'];
    }

    /**
     * Sets event_count
     *
     * @param int $event_count Number of `usage_events` rows that contributed to the aggregate. Diagnostic — not the aggregate itself.
     *
     * @return self
     */
    public function setEventCount($event_count)
    {
        if (is_null($event_count)) {
            throw new \InvalidArgumentException('non-nullable event_count cannot be null');
        }
        $this->container['event_count'] = $event_count;

        return $this;
    }

    /**
     * Gets last_event_at
     *
     * @return \DateTime|null
     */
    public function getLastEventAt()
    {
        return $this->container['last_event_at'];
    }

    /**
     * Sets last_event_at
     *
     * @param \DateTime|null $last_event_at Timestamp of the most recent usage event. Null if no events have been recorded.
     *
     * @return self
     */
    public function setLastEventAt($last_event_at)
    {
        if (is_null($last_event_at)) {
            array_push($this->openAPINullablesSetToNull, 'last_event_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last_event_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['last_event_at'] = $last_event_at;

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


