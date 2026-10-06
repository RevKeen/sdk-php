<?php

/**
 * CreateRefundInput
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your merchant API key in the `x-api-key` header, or as `Authorization: Bearer <key>` — both are accepted. Create and manage keys in the [Dashboard](https://app.revkeen.com/dashboard/settings/general?tab=developer). Use `rk_sandbox_*` for staging/test and `rk_live_*` for production. Keys are scoped, rollable, IP-lockable and revocable; the raw secret is shown once, at creation.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Access tokens are opaque, prefixed `rkoa_`, and sent via `Authorization: Bearer rkoa_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `cart:read` | View cart session details | |  | `cart:write` | Create and mutate cart sessions, line items, add-ons | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `entitlements:read` | View customer entitlements / feature access | |  | `entitlements:write` | Grant and revoke customer entitlements | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Errors  Every non-2xx response uses one envelope: `{ \"error\": { \"type\", \"code\", \"message\", ... } }`. Branch on `error.type` and `error.code`; treat `error.message` as display text only. Error bodies never echo the credential you presented.  | Status | `error.type` | Notes | |--------|--------------|-------| | `400` | `invalid_request_error` | Schema validation failed. `details.fields` maps each rejected parameter to its reasons. | | `401` | `authentication_error` | Missing, invalid, expired or revoked credential. Always carries `WWW-Authenticate: Bearer realm=\"revkeen-api\"`. | | `402` | `card_error` | Declined by the issuer or processor; see `decline_code`. | | `403` | `authorization_error` | The caller is identified but the action is denied — scope, IP allowlist, origin, or merchant mismatch. | | `409` | `invalid_request_error` or `idempotency_error` | Resource-state conflict, or an `Idempotency-Key` replayed with a different body. | | `429` | `rate_limit_error` | See Rate Limits below. | | `500` | `api_error` | Retry with exponential backoff, quoting `error.request_id`. |  `401` codes: `authentication_failed`, `invalid_api_key`, `expired_api_key`, `api_key_revoked`, `session_invalid`, `merchant_required`.  `403` codes: `insufficient_permissions`, `forbidden`, `ip_not_allowed`, `tenant_scope_mismatch`, `no_organization`, `no_merchant`, `merchant_mismatch`, `cart_disabled`, `origin_not_allowed`, `verification_required`, `read_only_impersonation_blocked`, `publishable_key_restricted`, `internal_only`.  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  Each API key (`rk_live_*`, `rk_sandbox_*`, `rk_pk_*`) may make **600 requests per minute**, in production and staging alike. The limit is per key, counted over a 60-second window, with no separate burst allowance. Some endpoints apply their own, lower limits.  An over-limit key is still valid: it receives `429`, never `401`. Wait for `Retry-After` and retry; do not re-authenticate or rotate the key.  A rate-limited request returns `429` with `type: rate_limit_error`, `code: rate_limit_exceeded` and `details.retry_after` in whole seconds.  | Header | Meaning | |--------|---------| | `Retry-After` | Whole seconds to wait before retrying. Present on every `429`. | | `X-RateLimit-Limit` | Requests permitted in the current window, when the limiter publishes one. | | `X-RateLimit-Remaining` | Requests left in the current window. | | `X-RateLimit-Reset` | UNIX timestamp in **seconds** at which the window resets. |
 *
 * The version of the OpenAPI document: 2026-05-01
 * Contact: support@revkeen.com
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.24.0
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
 * CreateRefundInput Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a refund. Specify the transaction ID and optionally a partial amount.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateRefundInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'CreateRefundInput';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'payment_id' => 'string',
        'amount_minor' => 'MoneyMinor',
        'reason' => 'string',
        'reason_details' => 'string',
        'restock_line_items' => '\RevKeen\Model\CreateRefundInputRestockLineItemsInner[]'
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     * @phpstan-var array<string, string|null>
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'payment_id' => 'uuid',
        'amount_minor' => 'int64',
        'reason' => null,
        'reason_details' => null,
        'restock_line_items' => null
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var boolean[]
     */
    protected static array $openAPINullables = [
        'payment_id' => false,
        'amount_minor' => false,
        'reason' => false,
        'reason_details' => false,
        'restock_line_items' => false
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
        'payment_id' => 'payment_id',
        'amount_minor' => 'amount_minor',
        'reason' => 'reason',
        'reason_details' => 'reason_details',
        'restock_line_items' => 'restock_line_items'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payment_id' => 'setPaymentId',
        'amount_minor' => 'setAmountMinor',
        'reason' => 'setReason',
        'reason_details' => 'setReasonDetails',
        'restock_line_items' => 'setRestockLineItems'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payment_id' => 'getPaymentId',
        'amount_minor' => 'getAmountMinor',
        'reason' => 'getReason',
        'reason_details' => 'getReasonDetails',
        'restock_line_items' => 'getRestockLineItems'
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

    public const REASON_CUSTOMER_REQUEST = 'customer_request';
    public const REASON_DUPLICATE = 'duplicate';
    public const REASON_FRAUDULENT = 'fraudulent';
    public const REASON_PRODUCT_NOT_RECEIVED = 'product_not_received';
    public const REASON_PRODUCT_UNACCEPTABLE = 'product_unacceptable';
    public const REASON_SUBSCRIPTION_CANCELED = 'subscription_canceled';
    public const REASON_OTHER = 'other';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReasonAllowableValues()
    {
        return [
            self::REASON_CUSTOMER_REQUEST,
            self::REASON_DUPLICATE,
            self::REASON_FRAUDULENT,
            self::REASON_PRODUCT_NOT_RECEIVED,
            self::REASON_PRODUCT_UNACCEPTABLE,
            self::REASON_SUBSCRIPTION_CANCELED,
            self::REASON_OTHER,
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
        $this->setIfExists('payment_id', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('reason_details', $data ?? [], null);
        $this->setIfExists('restock_line_items', $data ?? [], null);
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

        $value = $fields[$variableName] ?? $defaultValue;
        if (
            $value !== null
            && in_array(
                ltrim(self::$openAPITypes[$variableName], '\\'),
                ['MoneyMinor', \RevKeen\Runtime\MoneyMinor::class],
                true
            )
            && !$value instanceof \RevKeen\Runtime\MoneyMinor
        ) {
            if (array_key_exists($variableName, $fields)) {
                throw new \InvalidArgumentException("$variableName requires a MoneyMinor value.");
            }
            $value = new \RevKeen\Runtime\MoneyMinor($value);
        }

        $this->container[$variableName] = $value;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['payment_id'] === null) {
            $invalidProperties[] = "'payment_id' can't be null";
        }
        if (!is_null($this->container['amount_minor']) && ($this->container['amount_minor']->value() < 1)) {
            $invalidProperties[] = "invalid value for 'amount_minor', must be bigger than or equal to 1.";
        }

        $allowedValues = $this->getReasonAllowableValues();
        if (!is_null($this->container['reason']) && !in_array($this->container['reason'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'reason', must be one of '%s'",
                $this->container['reason'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['reason_details']) && (mb_strlen($this->container['reason_details']) > 500)) {
            $invalidProperties[] = "invalid value for 'reason_details', the character length must be smaller than or equal to 500.";
        }

        if (!is_null($this->container['restock_line_items']) && (count($this->container['restock_line_items']) > 100)) {
            $invalidProperties[] = "invalid value for 'restock_line_items', number of items must be less than or equal to 100.";
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
     * Gets payment_id
     *
     * @return string
     */
    public function getPaymentId()
    {
        return $this->container['payment_id'];
    }

    /**
     * Sets payment_id
     *
     * @param string $payment_id The ID of the payment to refund
     *
     * @return self
     */
    public function setPaymentId($payment_id)
    {
        if (is_null($payment_id)) {
            throw new \InvalidArgumentException('non-nullable payment_id cannot be null');
        }
        $this->container['payment_id'] = $payment_id;

        return $this;
    }

    /**
     * Gets amount_minor
     *
     * @return \RevKeen\Runtime\MoneyMinor|null
     */
    public function getAmountMinor()
    {
        return $this->container['amount_minor'];
    }

    /**
     * Sets amount_minor
     *
     * @param \RevKeen\Runtime\MoneyMinor|null $amount_minor Amount to refund in cents. If not provided, refunds the full remaining amount.
     *
     * @return self
     */
    public function setAmountMinor($amount_minor)
    {
        if (is_null($amount_minor)) {
            throw new \InvalidArgumentException('non-nullable amount_minor cannot be null');
        }
        if (!is_null($amount_minor) && !$amount_minor instanceof \RevKeen\Runtime\MoneyMinor) {
            throw new \InvalidArgumentException('$amount_minor requires a MoneyMinor value.');
        }
        if (($amount_minor->value() < 1)) {
            throw new \InvalidArgumentException('invalid value for $amount_minor when calling CreateRefundInput., must be bigger than or equal to 1.');
        }

        $this->container['amount_minor'] = $amount_minor;

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
     * @param string|null $reason Reason for the refund
     *
     * @return self
     */
    public function setReason($reason)
    {
        if (is_null($reason)) {
            throw new \InvalidArgumentException('non-nullable reason cannot be null');
        }
        $allowedValues = $this->getReasonAllowableValues();
        if (!in_array($reason, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'reason', must be one of '%s'",
                    $reason,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['reason'] = $reason;

        return $this;
    }

    /**
     * Gets reason_details
     *
     * @return string|null
     */
    public function getReasonDetails()
    {
        return $this->container['reason_details'];
    }

    /**
     * Sets reason_details
     *
     * @param string|null $reason_details Additional details about the refund reason
     *
     * @return self
     */
    public function setReasonDetails($reason_details)
    {
        if (is_null($reason_details)) {
            throw new \InvalidArgumentException('non-nullable reason_details cannot be null');
        }
        if ((mb_strlen($reason_details) > 500)) {
            throw new \InvalidArgumentException('invalid length for $reason_details when calling CreateRefundInput., must be smaller than or equal to 500.');
        }

        $this->container['reason_details'] = $reason_details;

        return $this;
    }

    /**
     * Gets restock_line_items
     *
     * @return \RevKeen\Model\CreateRefundInputRestockLineItemsInner[]|null
     */
    public function getRestockLineItems()
    {
        return $this->container['restock_line_items'];
    }

    /**
     * Sets restock_line_items
     *
     * @param \RevKeen\Model\CreateRefundInputRestockLineItemsInner[]|null $restock_line_items Units to put back on sale once the refund succeeds, by invoice line. Omit to restock nothing: an amount alone never restocks.
     *
     * @return self
     */
    public function setRestockLineItems($restock_line_items)
    {
        if (is_null($restock_line_items)) {
            throw new \InvalidArgumentException('non-nullable restock_line_items cannot be null');
        }
        if ((count($restock_line_items) > 100)) {
            throw new \InvalidArgumentException('invalid value for $restock_line_items when calling CreateRefundInput., number of items must be less than or equal to 100.');
        }
        $this->container['restock_line_items'] = $restock_line_items;

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
        if (
            !is_null($offset)
            && !is_null($value)
            && isset(self::$openAPITypes[$offset])
            && in_array(
                ltrim(self::$openAPITypes[$offset], '\\'),
                ['MoneyMinor', \RevKeen\Runtime\MoneyMinor::class],
                true
            )
            && !$value instanceof \RevKeen\Runtime\MoneyMinor
        ) {
            throw new \InvalidArgumentException("$offset requires a MoneyMinor value.");
        }

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
