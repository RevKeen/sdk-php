<?php
/**
 * CardDetails
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
 * CardDetails Class Doc Comment
 *
 * @category Class
 * @description Card details (if type is &#39;card&#39;)
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CardDetails implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CardDetails';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'brand' => 'string',
        'last4' => 'string',
        'exp_month' => 'int',
        'exp_year' => 'int',
        'funding' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'brand' => null,
        'last4' => null,
        'exp_month' => null,
        'exp_year' => null,
        'funding' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'brand' => true,
        'last4' => true,
        'exp_month' => true,
        'exp_year' => true,
        'funding' => true
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
        'brand' => 'brand',
        'last4' => 'last4',
        'exp_month' => 'exp_month',
        'exp_year' => 'exp_year',
        'funding' => 'funding'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'brand' => 'setBrand',
        'last4' => 'setLast4',
        'exp_month' => 'setExpMonth',
        'exp_year' => 'setExpYear',
        'funding' => 'setFunding'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'brand' => 'getBrand',
        'last4' => 'getLast4',
        'exp_month' => 'getExpMonth',
        'exp_year' => 'getExpYear',
        'funding' => 'getFunding'
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

    public const BRAND_VISA = 'visa';
    public const BRAND_MASTERCARD = 'mastercard';
    public const BRAND_AMEX = 'amex';
    public const BRAND_DISCOVER = 'discover';
    public const BRAND_DINERS = 'diners';
    public const BRAND_JCB = 'jcb';
    public const BRAND_UNIONPAY = 'unionpay';
    public const BRAND_UNKNOWN = 'unknown';
    public const FUNDING_CREDIT = 'credit';
    public const FUNDING_DEBIT = 'debit';
    public const FUNDING_PREPAID = 'prepaid';
    public const FUNDING_UNKNOWN = 'unknown';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBrandAllowableValues()
    {
        return [
            self::BRAND_VISA,
            self::BRAND_MASTERCARD,
            self::BRAND_AMEX,
            self::BRAND_DISCOVER,
            self::BRAND_DINERS,
            self::BRAND_JCB,
            self::BRAND_UNIONPAY,
            self::BRAND_UNKNOWN,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getFundingAllowableValues()
    {
        return [
            self::FUNDING_CREDIT,
            self::FUNDING_DEBIT,
            self::FUNDING_PREPAID,
            self::FUNDING_UNKNOWN,
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
        $this->setIfExists('brand', $data ?? [], null);
        $this->setIfExists('last4', $data ?? [], null);
        $this->setIfExists('exp_month', $data ?? [], null);
        $this->setIfExists('exp_year', $data ?? [], null);
        $this->setIfExists('funding', $data ?? [], null);
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

        if ($this->container['brand'] === null && !$this->isNullableSetToNull('brand')) {
            $invalidProperties[] = "'brand' can't be null";
        }
        $allowedValues = $this->getBrandAllowableValues();
        if (!is_null($this->container['brand']) && !in_array($this->container['brand'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'brand', must be one of '%s'",
                $this->container['brand'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['last4'] === null && !$this->isNullableSetToNull('last4')) {
            $invalidProperties[] = "'last4' can't be null";
        }
        if ((mb_strlen($this->container['last4']) > 4)) {
            $invalidProperties[] = "invalid value for 'last4', the character length must be smaller than or equal to 4.";
        }

        if ((mb_strlen($this->container['last4']) < 4)) {
            $invalidProperties[] = "invalid value for 'last4', the character length must be bigger than or equal to 4.";
        }

        if ($this->container['exp_month'] === null && !$this->isNullableSetToNull('exp_month')) {
            $invalidProperties[] = "'exp_month' can't be null";
        }
        if (($this->container['exp_month'] > 12)) {
            $invalidProperties[] = "invalid value for 'exp_month', must be smaller than or equal to 12.";
        }

        if (($this->container['exp_month'] < 1)) {
            $invalidProperties[] = "invalid value for 'exp_month', must be bigger than or equal to 1.";
        }

        if ($this->container['exp_year'] === null && !$this->isNullableSetToNull('exp_year')) {
            $invalidProperties[] = "'exp_year' can't be null";
        }
        if ($this->container['funding'] === null && !$this->isNullableSetToNull('funding')) {
            $invalidProperties[] = "'funding' can't be null";
        }
        $allowedValues = $this->getFundingAllowableValues();
        if (!is_null($this->container['funding']) && !in_array($this->container['funding'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'funding', must be one of '%s'",
                $this->container['funding'],
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
     * Gets brand
     *
     * @return string|null
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string|null $brand The card brand
     *
     * @return self
     */
    public function setBrand($brand)
    {
        if (is_null($brand)) {
            array_push($this->openAPINullablesSetToNull, 'brand');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('brand', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getBrandAllowableValues();
        if (!is_null($brand) && !in_array($brand, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'brand', must be one of '%s'",
                    $brand,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets last4
     *
     * @return string|null
     */
    public function getLast4()
    {
        return $this->container['last4'];
    }

    /**
     * Sets last4
     *
     * @param string|null $last4 The last 4 digits of the card number
     *
     * @return self
     */
    public function setLast4($last4)
    {
        if (is_null($last4)) {
            array_push($this->openAPINullablesSetToNull, 'last4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('last4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        if (!is_null($last4) && (mb_strlen($last4) > 4)) {
            throw new \InvalidArgumentException('invalid length for $last4 when calling CardDetails., must be smaller than or equal to 4.');
        }
        if (!is_null($last4) && (mb_strlen($last4) < 4)) {
            throw new \InvalidArgumentException('invalid length for $last4 when calling CardDetails., must be bigger than or equal to 4.');
        }

        $this->container['last4'] = $last4;

        return $this;
    }

    /**
     * Gets exp_month
     *
     * @return int|null
     */
    public function getExpMonth()
    {
        return $this->container['exp_month'];
    }

    /**
     * Sets exp_month
     *
     * @param int|null $exp_month Expiration month (1-12)
     *
     * @return self
     */
    public function setExpMonth($exp_month)
    {
        if (is_null($exp_month)) {
            array_push($this->openAPINullablesSetToNull, 'exp_month');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('exp_month', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($exp_month) && ($exp_month > 12)) {
            throw new \InvalidArgumentException('invalid value for $exp_month when calling CardDetails., must be smaller than or equal to 12.');
        }
        if (!is_null($exp_month) && ($exp_month < 1)) {
            throw new \InvalidArgumentException('invalid value for $exp_month when calling CardDetails., must be bigger than or equal to 1.');
        }

        $this->container['exp_month'] = $exp_month;

        return $this;
    }

    /**
     * Gets exp_year
     *
     * @return int|null
     */
    public function getExpYear()
    {
        return $this->container['exp_year'];
    }

    /**
     * Sets exp_year
     *
     * @param int|null $exp_year Expiration year
     *
     * @return self
     */
    public function setExpYear($exp_year)
    {
        if (is_null($exp_year)) {
            array_push($this->openAPINullablesSetToNull, 'exp_year');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('exp_year', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['exp_year'] = $exp_year;

        return $this;
    }

    /**
     * Gets funding
     *
     * @return string|null
     */
    public function getFunding()
    {
        return $this->container['funding'];
    }

    /**
     * Sets funding
     *
     * @param string|null $funding The card funding type
     *
     * @return self
     */
    public function setFunding($funding)
    {
        if (is_null($funding)) {
            array_push($this->openAPINullablesSetToNull, 'funding');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('funding', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $allowedValues = $this->getFundingAllowableValues();
        if (!is_null($funding) && !in_array($funding, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'funding', must be one of '%s'",
                    $funding,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['funding'] = $funding;

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


