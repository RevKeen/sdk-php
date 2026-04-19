<?php
/**
 * CreateCreditNoteInput
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
 * CreateCreditNoteInput Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a credit note against an invoice, specifying the amount, reason, and whether to issue a refund.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateCreditNoteInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateCreditNoteInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'invoice_id' => 'string',
        'amount_minor' => 'int',
        'tax_amount_minor' => 'int',
        'credit_method' => 'string',
        'reason' => 'string',
        'reason_code' => 'string',
        'cancel_subscription' => 'bool',
        'is_prorated' => 'bool',
        'proration_days_total' => 'int',
        'proration_days_unused' => 'int',
        'idempotency_key' => 'string',
        'metadata' => 'array<string,mixed>',
        'auto_route' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'invoice_id' => 'uuid',
        'amount_minor' => null,
        'tax_amount_minor' => null,
        'credit_method' => null,
        'reason' => null,
        'reason_code' => null,
        'cancel_subscription' => null,
        'is_prorated' => null,
        'proration_days_total' => null,
        'proration_days_unused' => null,
        'idempotency_key' => null,
        'metadata' => null,
        'auto_route' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'invoice_id' => false,
        'amount_minor' => false,
        'tax_amount_minor' => false,
        'credit_method' => false,
        'reason' => false,
        'reason_code' => false,
        'cancel_subscription' => false,
        'is_prorated' => false,
        'proration_days_total' => false,
        'proration_days_unused' => false,
        'idempotency_key' => false,
        'metadata' => false,
        'auto_route' => false
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
        'invoice_id' => 'invoice_id',
        'amount_minor' => 'amount_minor',
        'tax_amount_minor' => 'tax_amount_minor',
        'credit_method' => 'credit_method',
        'reason' => 'reason',
        'reason_code' => 'reason_code',
        'cancel_subscription' => 'cancel_subscription',
        'is_prorated' => 'is_prorated',
        'proration_days_total' => 'proration_days_total',
        'proration_days_unused' => 'proration_days_unused',
        'idempotency_key' => 'idempotency_key',
        'metadata' => 'metadata',
        'auto_route' => 'auto_route'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'invoice_id' => 'setInvoiceId',
        'amount_minor' => 'setAmountMinor',
        'tax_amount_minor' => 'setTaxAmountMinor',
        'credit_method' => 'setCreditMethod',
        'reason' => 'setReason',
        'reason_code' => 'setReasonCode',
        'cancel_subscription' => 'setCancelSubscription',
        'is_prorated' => 'setIsProrated',
        'proration_days_total' => 'setProrationDaysTotal',
        'proration_days_unused' => 'setProrationDaysUnused',
        'idempotency_key' => 'setIdempotencyKey',
        'metadata' => 'setMetadata',
        'auto_route' => 'setAutoRoute'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'invoice_id' => 'getInvoiceId',
        'amount_minor' => 'getAmountMinor',
        'tax_amount_minor' => 'getTaxAmountMinor',
        'credit_method' => 'getCreditMethod',
        'reason' => 'getReason',
        'reason_code' => 'getReasonCode',
        'cancel_subscription' => 'getCancelSubscription',
        'is_prorated' => 'getIsProrated',
        'proration_days_total' => 'getProrationDaysTotal',
        'proration_days_unused' => 'getProrationDaysUnused',
        'idempotency_key' => 'getIdempotencyKey',
        'metadata' => 'getMetadata',
        'auto_route' => 'getAutoRoute'
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

    public const CREDIT_METHOD_REFUND_TO_PAYMENT_METHOD = 'refund_to_payment_method';
    public const CREDIT_METHOD_CUSTOMER_BALANCE = 'customer_balance';
    public const CREDIT_METHOD_EXTERNAL = 'external';
    public const REASON_CODE_CUSTOMER_REQUEST = 'customer_request';
    public const REASON_CODE_DUPLICATE_CHARGE = 'duplicate_charge';
    public const REASON_CODE_SERVICE_ISSUE = 'service_issue';
    public const REASON_CODE_BILLING_ERROR = 'billing_error';
    public const REASON_CODE_SUBSCRIPTION_CANCELLATION = 'subscription_cancellation';
    public const REASON_CODE_PRORATION = 'proration';
    public const REASON_CODE_OTHER = 'other';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCreditMethodAllowableValues()
    {
        return [
            self::CREDIT_METHOD_REFUND_TO_PAYMENT_METHOD,
            self::CREDIT_METHOD_CUSTOMER_BALANCE,
            self::CREDIT_METHOD_EXTERNAL,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReasonCodeAllowableValues()
    {
        return [
            self::REASON_CODE_CUSTOMER_REQUEST,
            self::REASON_CODE_DUPLICATE_CHARGE,
            self::REASON_CODE_SERVICE_ISSUE,
            self::REASON_CODE_BILLING_ERROR,
            self::REASON_CODE_SUBSCRIPTION_CANCELLATION,
            self::REASON_CODE_PRORATION,
            self::REASON_CODE_OTHER,
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
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('amount_minor', $data ?? [], null);
        $this->setIfExists('tax_amount_minor', $data ?? [], null);
        $this->setIfExists('credit_method', $data ?? [], 'refund_to_payment_method');
        $this->setIfExists('reason', $data ?? [], null);
        $this->setIfExists('reason_code', $data ?? [], null);
        $this->setIfExists('cancel_subscription', $data ?? [], false);
        $this->setIfExists('is_prorated', $data ?? [], null);
        $this->setIfExists('proration_days_total', $data ?? [], null);
        $this->setIfExists('proration_days_unused', $data ?? [], null);
        $this->setIfExists('idempotency_key', $data ?? [], null);
        $this->setIfExists('metadata', $data ?? [], null);
        $this->setIfExists('auto_route', $data ?? [], false);
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

        if ($this->container['invoice_id'] === null) {
            $invalidProperties[] = "'invoice_id' can't be null";
        }
        if ($this->container['amount_minor'] === null) {
            $invalidProperties[] = "'amount_minor' can't be null";
        }
        if (($this->container['amount_minor'] > 2000000000)) {
            $invalidProperties[] = "invalid value for 'amount_minor', must be smaller than or equal to 2000000000.";
        }

        if (($this->container['amount_minor'] < 1)) {
            $invalidProperties[] = "invalid value for 'amount_minor', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['tax_amount_minor']) && ($this->container['tax_amount_minor'] > 2000000000)) {
            $invalidProperties[] = "invalid value for 'tax_amount_minor', must be smaller than or equal to 2000000000.";
        }

        if (!is_null($this->container['tax_amount_minor']) && ($this->container['tax_amount_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'tax_amount_minor', must be bigger than or equal to 0.";
        }

        $allowedValues = $this->getCreditMethodAllowableValues();
        if (!is_null($this->container['credit_method']) && !in_array($this->container['credit_method'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'credit_method', must be one of '%s'",
                $this->container['credit_method'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['reason']) && (mb_strlen($this->container['reason']) > 500)) {
            $invalidProperties[] = "invalid value for 'reason', the character length must be smaller than or equal to 500.";
        }

        $allowedValues = $this->getReasonCodeAllowableValues();
        if (!is_null($this->container['reason_code']) && !in_array($this->container['reason_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'reason_code', must be one of '%s'",
                $this->container['reason_code'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['proration_days_total']) && ($this->container['proration_days_total'] > 366)) {
            $invalidProperties[] = "invalid value for 'proration_days_total', must be smaller than or equal to 366.";
        }

        if (!is_null($this->container['proration_days_total']) && ($this->container['proration_days_total'] < 1)) {
            $invalidProperties[] = "invalid value for 'proration_days_total', must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['proration_days_unused']) && ($this->container['proration_days_unused'] > 366)) {
            $invalidProperties[] = "invalid value for 'proration_days_unused', must be smaller than or equal to 366.";
        }

        if (!is_null($this->container['proration_days_unused']) && ($this->container['proration_days_unused'] < 0)) {
            $invalidProperties[] = "invalid value for 'proration_days_unused', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['idempotency_key']) && (mb_strlen($this->container['idempotency_key']) > 255)) {
            $invalidProperties[] = "invalid value for 'idempotency_key', the character length must be smaller than or equal to 255.";
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
     * Gets invoice_id
     *
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->container['invoice_id'];
    }

    /**
     * Sets invoice_id
     *
     * @param string $invoice_id The ID of the invoice to issue a credit note for
     *
     * @return self
     */
    public function setInvoiceId($invoice_id)
    {
        if (is_null($invoice_id)) {
            throw new \InvalidArgumentException('non-nullable invoice_id cannot be null');
        }
        $this->container['invoice_id'] = $invoice_id;

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
     * @param int $amount_minor Amount to credit in minor units (cents). Capped at 2,000,000,000 to stay below the 32-bit integer ceiling of the underlying DB column.
     *
     * @return self
     */
    public function setAmountMinor($amount_minor)
    {
        if (is_null($amount_minor)) {
            throw new \InvalidArgumentException('non-nullable amount_minor cannot be null');
        }

        if (($amount_minor > 2000000000)) {
            throw new \InvalidArgumentException('invalid value for $amount_minor when calling CreateCreditNoteInput., must be smaller than or equal to 2000000000.');
        }
        if (($amount_minor < 1)) {
            throw new \InvalidArgumentException('invalid value for $amount_minor when calling CreateCreditNoteInput., must be bigger than or equal to 1.');
        }

        $this->container['amount_minor'] = $amount_minor;

        return $this;
    }

    /**
     * Gets tax_amount_minor
     *
     * @return int|null
     */
    public function getTaxAmountMinor()
    {
        return $this->container['tax_amount_minor'];
    }

    /**
     * Sets tax_amount_minor
     *
     * @param int|null $tax_amount_minor Tax portion of the credit in minor units (cents). For UK/EU VAT compliance. Capped at 2,000,000,000.
     *
     * @return self
     */
    public function setTaxAmountMinor($tax_amount_minor)
    {
        if (is_null($tax_amount_minor)) {
            throw new \InvalidArgumentException('non-nullable tax_amount_minor cannot be null');
        }

        if (($tax_amount_minor > 2000000000)) {
            throw new \InvalidArgumentException('invalid value for $tax_amount_minor when calling CreateCreditNoteInput., must be smaller than or equal to 2000000000.');
        }
        if (($tax_amount_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $tax_amount_minor when calling CreateCreditNoteInput., must be bigger than or equal to 0.');
        }

        $this->container['tax_amount_minor'] = $tax_amount_minor;

        return $this;
    }

    /**
     * Gets credit_method
     *
     * @return string|null
     */
    public function getCreditMethod()
    {
        return $this->container['credit_method'];
    }

    /**
     * Sets credit_method
     *
     * @param string|null $credit_method How the credit should be applied
     *
     * @return self
     */
    public function setCreditMethod($credit_method)
    {
        if (is_null($credit_method)) {
            throw new \InvalidArgumentException('non-nullable credit_method cannot be null');
        }
        $allowedValues = $this->getCreditMethodAllowableValues();
        if (!in_array($credit_method, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'credit_method', must be one of '%s'",
                    $credit_method,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['credit_method'] = $credit_method;

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
     * @param string|null $reason Reason for the credit note
     *
     * @return self
     */
    public function setReason($reason)
    {
        if (is_null($reason)) {
            throw new \InvalidArgumentException('non-nullable reason cannot be null');
        }
        if ((mb_strlen($reason) > 500)) {
            throw new \InvalidArgumentException('invalid length for $reason when calling CreateCreditNoteInput., must be smaller than or equal to 500.');
        }

        $this->container['reason'] = $reason;

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
     * @param string|null $reason_code Standardized reason code
     *
     * @return self
     */
    public function setReasonCode($reason_code)
    {
        if (is_null($reason_code)) {
            throw new \InvalidArgumentException('non-nullable reason_code cannot be null');
        }
        $allowedValues = $this->getReasonCodeAllowableValues();
        if (!in_array($reason_code, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'reason_code', must be one of '%s'",
                    $reason_code,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['reason_code'] = $reason_code;

        return $this;
    }

    /**
     * Gets cancel_subscription
     *
     * @return bool|null
     */
    public function getCancelSubscription()
    {
        return $this->container['cancel_subscription'];
    }

    /**
     * Sets cancel_subscription
     *
     * @param bool|null $cancel_subscription Whether to cancel the associated subscription after issuing
     *
     * @return self
     */
    public function setCancelSubscription($cancel_subscription)
    {
        if (is_null($cancel_subscription)) {
            throw new \InvalidArgumentException('non-nullable cancel_subscription cannot be null');
        }
        $this->container['cancel_subscription'] = $cancel_subscription;

        return $this;
    }

    /**
     * Gets is_prorated
     *
     * @return bool|null
     */
    public function getIsProrated()
    {
        return $this->container['is_prorated'];
    }

    /**
     * Sets is_prorated
     *
     * @param bool|null $is_prorated Whether this credit note represents a prorated amount
     *
     * @return self
     */
    public function setIsProrated($is_prorated)
    {
        if (is_null($is_prorated)) {
            throw new \InvalidArgumentException('non-nullable is_prorated cannot be null');
        }
        $this->container['is_prorated'] = $is_prorated;

        return $this;
    }

    /**
     * Gets proration_days_total
     *
     * @return int|null
     */
    public function getProrationDaysTotal()
    {
        return $this->container['proration_days_total'];
    }

    /**
     * Sets proration_days_total
     *
     * @param int|null $proration_days_total Total days in the billing period (for prorated credits). Constrained to 1–366.
     *
     * @return self
     */
    public function setProrationDaysTotal($proration_days_total)
    {
        if (is_null($proration_days_total)) {
            throw new \InvalidArgumentException('non-nullable proration_days_total cannot be null');
        }

        if (($proration_days_total > 366)) {
            throw new \InvalidArgumentException('invalid value for $proration_days_total when calling CreateCreditNoteInput., must be smaller than or equal to 366.');
        }
        if (($proration_days_total < 1)) {
            throw new \InvalidArgumentException('invalid value for $proration_days_total when calling CreateCreditNoteInput., must be bigger than or equal to 1.');
        }

        $this->container['proration_days_total'] = $proration_days_total;

        return $this;
    }

    /**
     * Gets proration_days_unused
     *
     * @return int|null
     */
    public function getProrationDaysUnused()
    {
        return $this->container['proration_days_unused'];
    }

    /**
     * Sets proration_days_unused
     *
     * @param int|null $proration_days_unused Unused days in the billing period (for prorated credits). Must be <= proration_days_total. Constrained to 0–366.
     *
     * @return self
     */
    public function setProrationDaysUnused($proration_days_unused)
    {
        if (is_null($proration_days_unused)) {
            throw new \InvalidArgumentException('non-nullable proration_days_unused cannot be null');
        }

        if (($proration_days_unused > 366)) {
            throw new \InvalidArgumentException('invalid value for $proration_days_unused when calling CreateCreditNoteInput., must be smaller than or equal to 366.');
        }
        if (($proration_days_unused < 0)) {
            throw new \InvalidArgumentException('invalid value for $proration_days_unused when calling CreateCreditNoteInput., must be bigger than or equal to 0.');
        }

        $this->container['proration_days_unused'] = $proration_days_unused;

        return $this;
    }

    /**
     * Gets idempotency_key
     *
     * @return string|null
     */
    public function getIdempotencyKey()
    {
        return $this->container['idempotency_key'];
    }

    /**
     * Sets idempotency_key
     *
     * @param string|null $idempotency_key Idempotency key to prevent duplicate credit notes
     *
     * @return self
     */
    public function setIdempotencyKey($idempotency_key)
    {
        if (is_null($idempotency_key)) {
            throw new \InvalidArgumentException('non-nullable idempotency_key cannot be null');
        }
        if ((mb_strlen($idempotency_key) > 255)) {
            throw new \InvalidArgumentException('invalid length for $idempotency_key when calling CreateCreditNoteInput., must be smaller than or equal to 255.');
        }

        $this->container['idempotency_key'] = $idempotency_key;

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
     * @param array<string,mixed>|null $metadata Arbitrary key-value metadata
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
     * Gets auto_route
     *
     * @return bool|null
     */
    public function getAutoRoute()
    {
        return $this->container['auto_route'];
    }

    /**
     * Sets auto_route
     *
     * @param bool|null $auto_route When true, automatically trigger the process-credit-note task for multi-gateway reversal routing. Response will include gateway_operations array. Always combine with `idempotency_key` to avoid duplicate gateway operations.
     *
     * @return self
     */
    public function setAutoRoute($auto_route)
    {
        if (is_null($auto_route)) {
            throw new \InvalidArgumentException('non-nullable auto_route cannot be null');
        }
        $this->container['auto_route'] = $auto_route;

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


