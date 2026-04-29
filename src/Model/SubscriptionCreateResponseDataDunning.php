<?php
/**
 * SubscriptionCreateResponseDataDunning
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
 * SubscriptionCreateResponseDataDunning Class Doc Comment
 *
 * @category Class
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SubscriptionCreateResponseDataDunning implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SubscriptionCreateResponse_data_dunning';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'is_in_dunning' => 'bool',
        'phase' => 'float',
        'phase_label' => 'string',
        'phase_severity' => 'string',
        'retry_count' => 'float',
        'total_possible_retries' => 'float',
        'next_retry_at' => '\DateTime',
        'days_in_dunning' => 'float',
        'access_restricted' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'is_in_dunning' => null,
        'phase' => null,
        'phase_label' => null,
        'phase_severity' => null,
        'retry_count' => null,
        'total_possible_retries' => null,
        'next_retry_at' => 'date-time',
        'days_in_dunning' => null,
        'access_restricted' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'is_in_dunning' => false,
        'phase' => true,
        'phase_label' => true,
        'phase_severity' => true,
        'retry_count' => false,
        'total_possible_retries' => false,
        'next_retry_at' => true,
        'days_in_dunning' => false,
        'access_restricted' => false
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
        'is_in_dunning' => 'isInDunning',
        'phase' => 'phase',
        'phase_label' => 'phaseLabel',
        'phase_severity' => 'phaseSeverity',
        'retry_count' => 'retryCount',
        'total_possible_retries' => 'totalPossibleRetries',
        'next_retry_at' => 'nextRetryAt',
        'days_in_dunning' => 'daysInDunning',
        'access_restricted' => 'accessRestricted'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'is_in_dunning' => 'setIsInDunning',
        'phase' => 'setPhase',
        'phase_label' => 'setPhaseLabel',
        'phase_severity' => 'setPhaseSeverity',
        'retry_count' => 'setRetryCount',
        'total_possible_retries' => 'setTotalPossibleRetries',
        'next_retry_at' => 'setNextRetryAt',
        'days_in_dunning' => 'setDaysInDunning',
        'access_restricted' => 'setAccessRestricted'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'is_in_dunning' => 'getIsInDunning',
        'phase' => 'getPhase',
        'phase_label' => 'getPhaseLabel',
        'phase_severity' => 'getPhaseSeverity',
        'retry_count' => 'getRetryCount',
        'total_possible_retries' => 'getTotalPossibleRetries',
        'next_retry_at' => 'getNextRetryAt',
        'days_in_dunning' => 'getDaysInDunning',
        'access_restricted' => 'getAccessRestricted'
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

    public const PHASE_SEVERITY_INFO = 'info';
    public const PHASE_SEVERITY_WARNING = 'warning';
    public const PHASE_SEVERITY_CRITICAL = 'critical';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPhaseSeverityAllowableValues()
    {
        return [
            self::PHASE_SEVERITY_INFO,
            self::PHASE_SEVERITY_WARNING,
            self::PHASE_SEVERITY_CRITICAL,
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
        $this->setIfExists('is_in_dunning', $data ?? [], null);
        $this->setIfExists('phase', $data ?? [], null);
        $this->setIfExists('phase_label', $data ?? [], null);
        $this->setIfExists('phase_severity', $data ?? [], null);
        $this->setIfExists('retry_count', $data ?? [], null);
        $this->setIfExists('total_possible_retries', $data ?? [], null);
        $this->setIfExists('next_retry_at', $data ?? [], null);
        $this->setIfExists('days_in_dunning', $data ?? [], null);
        $this->setIfExists('access_restricted', $data ?? [], null);
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

        if ($this->container['is_in_dunning'] === null) {
            $invalidProperties[] = "'is_in_dunning' can't be null";
        }
        if ($this->container['phase'] === null && !$this->isNullableSetToNull('phase')) {
            $invalidProperties[] = "'phase' can't be null";
        }
        if ($this->container['phase_label'] === null && !$this->isNullableSetToNull('phase_label')) {
            $invalidProperties[] = "'phase_label' can't be null";
        }
        if ($this->container['phase_severity'] === null && !$this->isNullableSetToNull('phase_severity')) {
            $invalidProperties[] = "'phase_severity' can't be null";
        }
        $allowedValues = $this->getPhaseSeverityAllowableValues();
        if (!is_null($this->container['phase_severity']) && !in_array($this->container['phase_severity'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'phase_severity', must be one of '%s'",
                $this->container['phase_severity'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['retry_count'] === null) {
            $invalidProperties[] = "'retry_count' can't be null";
        }
        if ($this->container['total_possible_retries'] === null) {
            $invalidProperties[] = "'total_possible_retries' can't be null";
        }
        if ($this->container['next_retry_at'] === null && !$this->isNullableSetToNull('next_retry_at')) {
            $invalidProperties[] = "'next_retry_at' can't be null";
        }
        if ($this->container['days_in_dunning'] === null) {
            $invalidProperties[] = "'days_in_dunning' can't be null";
        }
        if ($this->container['access_restricted'] === null) {
            $invalidProperties[] = "'access_restricted' can't be null";
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
     * Gets is_in_dunning
     *
     * @return bool
     */
    public function getIsInDunning()
    {
        return $this->container['is_in_dunning'];
    }

    /**
     * Sets is_in_dunning
     *
     * @param bool $is_in_dunning is_in_dunning
     *
     * @return self
     */
    public function setIsInDunning($is_in_dunning)
    {
        if (is_null($is_in_dunning)) {
            throw new \InvalidArgumentException('non-nullable is_in_dunning cannot be null');
        }
        $this->container['is_in_dunning'] = $is_in_dunning;

        return $this;
    }

    /**
     * Gets phase
     *
     * @return float|null
     */
    public function getPhase()
    {
        return $this->container['phase'];
    }

    /**
     * Sets phase
     *
     * @param float|null $phase phase
     *
     * @return self
     */
    public function setPhase($phase)
    {
        if (is_null($phase)) {
            array_push($this->openAPINullablesSetToNull, 'phase');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('phase', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['phase'] = $phase;

        return $this;
    }

    /**
     * Gets phase_label
     *
     * @return string|null
     */
    public function getPhaseLabel()
    {
        return $this->container['phase_label'];
    }

    /**
     * Sets phase_label
     *
     * @param string|null $phase_label phase_label
     *
     * @return self
     */
    public function setPhaseLabel($phase_label)
    {
        if (is_null($phase_label)) {
            array_push($this->openAPINullablesSetToNull, 'phase_label');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('phase_label', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['phase_label'] = $phase_label;

        return $this;
    }

    /**
     * Gets phase_severity
     *
     * @return string|null
     */
    public function getPhaseSeverity()
    {
        return $this->container['phase_severity'];
    }

    /**
     * Sets phase_severity
     *
     * @param string|null $phase_severity phase_severity
     *
     * @return self
     */
    public function setPhaseSeverity($phase_severity)
    {
        if (is_null($phase_severity)) {
            array_push($this->openAPINullablesSetToNull, 'phase_severity');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('phase_severity', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getPhaseSeverityAllowableValues();
        if (!is_null($phase_severity) && !in_array($phase_severity, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'phase_severity', must be one of '%s'",
                    $phase_severity,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['phase_severity'] = $phase_severity;

        return $this;
    }

    /**
     * Gets retry_count
     *
     * @return float
     */
    public function getRetryCount()
    {
        return $this->container['retry_count'];
    }

    /**
     * Sets retry_count
     *
     * @param float $retry_count retry_count
     *
     * @return self
     */
    public function setRetryCount($retry_count)
    {
        if (is_null($retry_count)) {
            throw new \InvalidArgumentException('non-nullable retry_count cannot be null');
        }
        $this->container['retry_count'] = $retry_count;

        return $this;
    }

    /**
     * Gets total_possible_retries
     *
     * @return float
     */
    public function getTotalPossibleRetries()
    {
        return $this->container['total_possible_retries'];
    }

    /**
     * Sets total_possible_retries
     *
     * @param float $total_possible_retries total_possible_retries
     *
     * @return self
     */
    public function setTotalPossibleRetries($total_possible_retries)
    {
        if (is_null($total_possible_retries)) {
            throw new \InvalidArgumentException('non-nullable total_possible_retries cannot be null');
        }
        $this->container['total_possible_retries'] = $total_possible_retries;

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
     * Gets days_in_dunning
     *
     * @return float
     */
    public function getDaysInDunning()
    {
        return $this->container['days_in_dunning'];
    }

    /**
     * Sets days_in_dunning
     *
     * @param float $days_in_dunning days_in_dunning
     *
     * @return self
     */
    public function setDaysInDunning($days_in_dunning)
    {
        if (is_null($days_in_dunning)) {
            throw new \InvalidArgumentException('non-nullable days_in_dunning cannot be null');
        }
        $this->container['days_in_dunning'] = $days_in_dunning;

        return $this;
    }

    /**
     * Gets access_restricted
     *
     * @return bool
     */
    public function getAccessRestricted()
    {
        return $this->container['access_restricted'];
    }

    /**
     * Sets access_restricted
     *
     * @param bool $access_restricted access_restricted
     *
     * @return self
     */
    public function setAccessRestricted($access_restricted)
    {
        if (is_null($access_restricted)) {
            throw new \InvalidArgumentException('non-nullable access_restricted cannot be null');
        }
        $this->container['access_restricted'] = $access_restricted;

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


