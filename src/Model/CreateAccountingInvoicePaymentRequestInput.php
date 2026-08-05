<?php
/**
 * CreateAccountingInvoicePaymentRequestInput
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
 * RevKeen is a fintech-grade API for payments, subscriptions, invoices, and billing. The canonical production MCP server is available at `https://mcp.revkeen.com/mcp`.  **API Version:** `2026-05-01` — Pin with the `RevKeen-Version` header.  **Quick Links:** [Full Documentation](https://docs.revkeen.com) | [Authentication](https://docs.revkeen.com/authentication) | [OAuth](https://docs.revkeen.com/oauth) | [SDKs](https://docs.revkeen.com/sdks) | [Webhooks](#webhooks) | [MCP Guide](https://docs.revkeen.com/mcp)  ## Authentication  Two authentication methods are supported:  ### API Keys (recommended for server-to-server REST API integrations)  Send your API key in the `x-api-key` header. Get keys from the [Dashboard](https://app.revkeen.com/settings/api-keys). Use `rk_sandbox_*` for test mode and `rk_live_*` for production.  ### OAuth 2.1 (recommended for MCP and third-party integrations)  Use OAuth 2.1 with PKCE for authorization code flow or client credentials for server-to-server. Tokens are sent via `Authorization: Bearer rk_oauth_*`. See the [OAuth guide](https://docs.revkeen.com/oauth) for setup.  - **Authorization Code + PKCE** — user-facing integrations, MCP hosts - **Client Credentials** — server-to-server, automated workflows - **Dynamic Client Registration** — MCP hosts that auto-register  ## MCP Integration  RevKeen's canonical production MCP server is `https://mcp.revkeen.com/mcp` using Streamable HTTP and OAuth 2.1 bearer tokens.  - **Customer launch surface** — read-first customer v1 tools with least-privilege scopes - **Host setup guide** — see the [MCP guide](https://docs.revkeen.com/mcp) for ChatGPT, Claude, and compatible MCP hosts  ## API Key Scopes  Scopes follow `{resource}:{action}` format (e.g., `invoices:read`, `customers:*`). See [full scope reference](https://docs.revkeen.com/authentication#scopes).  | Category | Scope | Description | |----------|-------|-------------| | **Payments & Checkout** | `checkout:read` | View checkout session details | |  | `checkout:write` | Create and manage checkout sessions | |  | `cart:read` | View cart session details (REV-3511) | |  | `cart:write` | Create and mutate cart sessions, line items, add-ons (REV-3511) | |  | `payment_links:read` | View payment links | |  | `payment_links:write` | Create and manage payment links | |  | `charges:read` | View one-time charges | |  | `charges:write` | Create one-time charges for customers | |  | `payments:read` | View payment details | |  | `payments:write` | Capture or void payments | |  | `payment_intents:read` | View payment intent details | |  | `payment_intents:write` | Create, confirm, capture, and cancel payment intents | |  | `setup_intents:read` | View setup intent details | |  | `setup_intents:write` | Create, confirm, and cancel setup intents | |  | `payment_methods:read` | View saved payment methods | |  | `payment_methods:write` | Attach and detach payment methods | | **Billing** | `invoices:read` | View invoices | |  | `invoices:write` | Create, update, and manage invoices | |  | `subscriptions:read` | View subscriptions | |  | `subscriptions:write` | Create, update, pause, and cancel subscriptions | |  | `subscription_schedules:read` | View subscription schedule details | |  | `subscription_schedules:write` | Create, update, cancel, and release subscription schedules | |  | `orders:read` | View orders | |  | `orders:write` | Create and manage orders | |  | `credit_notes:read` | View credit notes | |  | `credit_notes:write` | Create and void credit notes | | **Products & Pricing** | `products:read` | View product catalog | |  | `products:write` | Create and update products | |  | `prices:read` | View pricing information | |  | `prices:write` | Create and update prices | |  | `discounts:read` | View discount codes | |  | `discounts:write` | Create and manage discount codes | |  | `tax_rates:read` | View tax rate configurations | |  | `tax_rates:write` | Configure tax rates | | **Usage & Metering** | `meters:read` | View meter configurations | |  | `meters:write` | Create and update meters | |  | `usage:read` | View usage events and balances | |  | `usage:write` | Ingest usage events | | **Customers** | `customers:read` | View customer information | |  | `customers:write` | Create and update customers | |  | `entitlements:read` | View customer entitlements / feature access | |  | `entitlements:write` | Grant and revoke customer entitlements | |  | `businesses:read` | View business entities | |  | `businesses:write` | Manage business entities | | **Money Movement** | `refunds:read` | View refund details | |  | `refunds:write` | Issue refunds | |  | `voids:read` | View voided transactions | |  | `voids:write` | Void unsettled transactions | |  | `disputes:read` | View chargebacks and disputes | |  | `disputes:write` | Respond to disputes | |  | `payouts:read` | View payout and settlement data | | **Direct Debit** | `mandates:read` | View Direct Debit mandates and collection status | |  | `mandates:write` | Create, suspend, reinstate, and cancel Direct Debit mandates | | **Terminal** | `terminal:read` | View terminal devices and card-present payments | |  | `terminal:write` | Initiate, cancel, refund, and void terminal payments | | **Data Exchange** | `exports:read` | View and download data exports | |  | `exports:write` | Create data exports | |  | `imports:read` | View import status and history | |  | `imports:write` | Upload and run data imports | | **Analytics & Reporting** | `analytics:read` | View analytics and reports | |  | `finance:read` | View financial reports | | **Communication** | `comms:read` | View SMS and email delivery logs | |  | `comms:write` | Send SMS, email, and WhatsApp messages | |  | `automations:read` | View automations, runs, approvals, and traces | |  | `automations:write` | Create automations and trigger runs | | **Integrations** | `apps:read` | View connected applications | |  | `apps:write` | Manage app connections | |  | `webhooks:read` | View webhook endpoints | |  | `webhooks:write` | Manage webhook endpoints | |  | `integrations:read` | View integration status and sync logs | |  | `integrations:write` | Activate, configure, and sync integrations | |  | `events:read` | View webhook event logs | |  | `events:write` | Resend and test webhook events | |  | `sync:read` | View sync watermarks and state | |  | `sync:write` | Update sync watermarks |  ## Environments  | Environment | Base URL | API Key Prefix | |-------------|----------|----------------| | **Staging** | `https://staging-api.revkeen.com/v2` | `rk_sandbox_*` | | **Production** | `https://api.revkeen.com/v2` | `rk_live_*` |  ## Idempotency  Include `Idempotency-Key` header (UUID) on mutation requests. Keys are valid for 24 hours.  ## Rate Limits  | Plan | Requests/min | Burst | |------|-------------|-------| | **Staging** | 100 | 200 | | **Production** | 1000 | 2000 | | **Enterprise** | Custom | Custom |
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
 * CreateAccountingInvoicePaymentRequestInput Class Doc Comment
 *
 * @category Class
 * @description Create an accounting-led invoice payment request and mint/reuse a checkout session.
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class CreateAccountingInvoicePaymentRequestInput implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'CreateAccountingInvoicePaymentRequestInput';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'provider' => 'string',
        'connection_id' => 'string',
        'provider_account_id' => 'string',
        'external_invoice' => '\RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalInvoice',
        'external_customer' => '\RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalCustomer',
        'amount_due_minor' => 'int',
        'total_amount_minor' => 'int',
        'amount_paid_minor' => 'int',
        'currency' => 'string',
        'checkout' => '\RevKeen\Model\CreateAccountingInvoicePaymentRequestInputCheckout',
        'payload_fingerprint' => 'string',
        'provider_metadata' => 'array<string,mixed>',
        'safe_provider_invoice_snapshot' => 'array<string,mixed>'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'provider' => null,
        'connection_id' => 'uuid',
        'provider_account_id' => null,
        'external_invoice' => null,
        'external_customer' => null,
        'amount_due_minor' => null,
        'total_amount_minor' => null,
        'amount_paid_minor' => null,
        'currency' => null,
        'checkout' => null,
        'payload_fingerprint' => null,
        'provider_metadata' => null,
        'safe_provider_invoice_snapshot' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'provider' => false,
        'connection_id' => false,
        'provider_account_id' => false,
        'external_invoice' => false,
        'external_customer' => false,
        'amount_due_minor' => false,
        'total_amount_minor' => true,
        'amount_paid_minor' => true,
        'currency' => false,
        'checkout' => false,
        'payload_fingerprint' => true,
        'provider_metadata' => false,
        'safe_provider_invoice_snapshot' => false
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
        'provider' => 'provider',
        'connection_id' => 'connection_id',
        'provider_account_id' => 'provider_account_id',
        'external_invoice' => 'external_invoice',
        'external_customer' => 'external_customer',
        'amount_due_minor' => 'amount_due_minor',
        'total_amount_minor' => 'total_amount_minor',
        'amount_paid_minor' => 'amount_paid_minor',
        'currency' => 'currency',
        'checkout' => 'checkout',
        'payload_fingerprint' => 'payload_fingerprint',
        'provider_metadata' => 'provider_metadata',
        'safe_provider_invoice_snapshot' => 'safe_provider_invoice_snapshot'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'provider' => 'setProvider',
        'connection_id' => 'setConnectionId',
        'provider_account_id' => 'setProviderAccountId',
        'external_invoice' => 'setExternalInvoice',
        'external_customer' => 'setExternalCustomer',
        'amount_due_minor' => 'setAmountDueMinor',
        'total_amount_minor' => 'setTotalAmountMinor',
        'amount_paid_minor' => 'setAmountPaidMinor',
        'currency' => 'setCurrency',
        'checkout' => 'setCheckout',
        'payload_fingerprint' => 'setPayloadFingerprint',
        'provider_metadata' => 'setProviderMetadata',
        'safe_provider_invoice_snapshot' => 'setSafeProviderInvoiceSnapshot'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'provider' => 'getProvider',
        'connection_id' => 'getConnectionId',
        'provider_account_id' => 'getProviderAccountId',
        'external_invoice' => 'getExternalInvoice',
        'external_customer' => 'getExternalCustomer',
        'amount_due_minor' => 'getAmountDueMinor',
        'total_amount_minor' => 'getTotalAmountMinor',
        'amount_paid_minor' => 'getAmountPaidMinor',
        'currency' => 'getCurrency',
        'checkout' => 'getCheckout',
        'payload_fingerprint' => 'getPayloadFingerprint',
        'provider_metadata' => 'getProviderMetadata',
        'safe_provider_invoice_snapshot' => 'getSafeProviderInvoiceSnapshot'
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

    public const PROVIDER_QUICKBOOKS_ONLINE = 'quickbooks_online';
    public const PROVIDER_XERO = 'xero';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getProviderAllowableValues()
    {
        return [
            self::PROVIDER_QUICKBOOKS_ONLINE,
            self::PROVIDER_XERO,
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
        $this->setIfExists('provider', $data ?? [], null);
        $this->setIfExists('connection_id', $data ?? [], null);
        $this->setIfExists('provider_account_id', $data ?? [], null);
        $this->setIfExists('external_invoice', $data ?? [], null);
        $this->setIfExists('external_customer', $data ?? [], null);
        $this->setIfExists('amount_due_minor', $data ?? [], null);
        $this->setIfExists('total_amount_minor', $data ?? [], null);
        $this->setIfExists('amount_paid_minor', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('checkout', $data ?? [], null);
        $this->setIfExists('payload_fingerprint', $data ?? [], null);
        $this->setIfExists('provider_metadata', $data ?? [], null);
        $this->setIfExists('safe_provider_invoice_snapshot', $data ?? [], null);
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

        if ($this->container['provider'] === null) {
            $invalidProperties[] = "'provider' can't be null";
        }
        $allowedValues = $this->getProviderAllowableValues();
        if (!is_null($this->container['provider']) && !in_array($this->container['provider'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'provider', must be one of '%s'",
                $this->container['provider'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['connection_id'] === null) {
            $invalidProperties[] = "'connection_id' can't be null";
        }
        if ($this->container['provider_account_id'] === null) {
            $invalidProperties[] = "'provider_account_id' can't be null";
        }
        if ((mb_strlen($this->container['provider_account_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'provider_account_id', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['external_invoice'] === null) {
            $invalidProperties[] = "'external_invoice' can't be null";
        }
        if ($this->container['amount_due_minor'] === null) {
            $invalidProperties[] = "'amount_due_minor' can't be null";
        }
        if (!is_null($this->container['total_amount_minor']) && ($this->container['total_amount_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'total_amount_minor', must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['amount_paid_minor']) && ($this->container['amount_paid_minor'] < 0)) {
            $invalidProperties[] = "invalid value for 'amount_paid_minor', must be bigger than or equal to 0.";
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

        if (!is_null($this->container['payload_fingerprint']) && (mb_strlen($this->container['payload_fingerprint']) < 8)) {
            $invalidProperties[] = "invalid value for 'payload_fingerprint', the character length must be bigger than or equal to 8.";
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
     * Gets provider
     *
     * @return string
     */
    public function getProvider()
    {
        return $this->container['provider'];
    }

    /**
     * Sets provider
     *
     * @param string $provider provider
     *
     * @return self
     */
    public function setProvider($provider)
    {
        if (is_null($provider)) {
            throw new \InvalidArgumentException('non-nullable provider cannot be null');
        }
        $allowedValues = $this->getProviderAllowableValues();
        if (!in_array($provider, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'provider', must be one of '%s'",
                    $provider,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['provider'] = $provider;

        return $this;
    }

    /**
     * Gets connection_id
     *
     * @return string
     */
    public function getConnectionId()
    {
        return $this->container['connection_id'];
    }

    /**
     * Sets connection_id
     *
     * @param string $connection_id connection_id
     *
     * @return self
     */
    public function setConnectionId($connection_id)
    {
        if (is_null($connection_id)) {
            throw new \InvalidArgumentException('non-nullable connection_id cannot be null');
        }
        $this->container['connection_id'] = $connection_id;

        return $this;
    }

    /**
     * Gets provider_account_id
     *
     * @return string
     */
    public function getProviderAccountId()
    {
        return $this->container['provider_account_id'];
    }

    /**
     * Sets provider_account_id
     *
     * @param string $provider_account_id provider_account_id
     *
     * @return self
     */
    public function setProviderAccountId($provider_account_id)
    {
        if (is_null($provider_account_id)) {
            throw new \InvalidArgumentException('non-nullable provider_account_id cannot be null');
        }

        if ((mb_strlen($provider_account_id) < 1)) {
            throw new \InvalidArgumentException('invalid length for $provider_account_id when calling CreateAccountingInvoicePaymentRequestInput., must be bigger than or equal to 1.');
        }

        $this->container['provider_account_id'] = $provider_account_id;

        return $this;
    }

    /**
     * Gets external_invoice
     *
     * @return \RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalInvoice
     */
    public function getExternalInvoice()
    {
        return $this->container['external_invoice'];
    }

    /**
     * Sets external_invoice
     *
     * @param \RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalInvoice $external_invoice external_invoice
     *
     * @return self
     */
    public function setExternalInvoice($external_invoice)
    {
        if (is_null($external_invoice)) {
            throw new \InvalidArgumentException('non-nullable external_invoice cannot be null');
        }
        $this->container['external_invoice'] = $external_invoice;

        return $this;
    }

    /**
     * Gets external_customer
     *
     * @return \RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalCustomer|null
     */
    public function getExternalCustomer()
    {
        return $this->container['external_customer'];
    }

    /**
     * Sets external_customer
     *
     * @param \RevKeen\Model\CreateAccountingInvoicePaymentRequestInputExternalCustomer|null $external_customer external_customer
     *
     * @return self
     */
    public function setExternalCustomer($external_customer)
    {
        if (is_null($external_customer)) {
            throw new \InvalidArgumentException('non-nullable external_customer cannot be null');
        }
        $this->container['external_customer'] = $external_customer;

        return $this;
    }

    /**
     * Gets amount_due_minor
     *
     * @return int
     */
    public function getAmountDueMinor()
    {
        return $this->container['amount_due_minor'];
    }

    /**
     * Sets amount_due_minor
     *
     * @param int $amount_due_minor amount_due_minor
     *
     * @return self
     */
    public function setAmountDueMinor($amount_due_minor)
    {
        if (is_null($amount_due_minor)) {
            throw new \InvalidArgumentException('non-nullable amount_due_minor cannot be null');
        }
        $this->container['amount_due_minor'] = $amount_due_minor;

        return $this;
    }

    /**
     * Gets total_amount_minor
     *
     * @return int|null
     */
    public function getTotalAmountMinor()
    {
        return $this->container['total_amount_minor'];
    }

    /**
     * Sets total_amount_minor
     *
     * @param int|null $total_amount_minor total_amount_minor
     *
     * @return self
     */
    public function setTotalAmountMinor($total_amount_minor)
    {
        if (is_null($total_amount_minor)) {
            array_push($this->openAPINullablesSetToNull, 'total_amount_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('total_amount_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($total_amount_minor) && ($total_amount_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $total_amount_minor when calling CreateAccountingInvoicePaymentRequestInput., must be bigger than or equal to 0.');
        }

        $this->container['total_amount_minor'] = $total_amount_minor;

        return $this;
    }

    /**
     * Gets amount_paid_minor
     *
     * @return int|null
     */
    public function getAmountPaidMinor()
    {
        return $this->container['amount_paid_minor'];
    }

    /**
     * Sets amount_paid_minor
     *
     * @param int|null $amount_paid_minor amount_paid_minor
     *
     * @return self
     */
    public function setAmountPaidMinor($amount_paid_minor)
    {
        if (is_null($amount_paid_minor)) {
            array_push($this->openAPINullablesSetToNull, 'amount_paid_minor');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('amount_paid_minor', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($amount_paid_minor) && ($amount_paid_minor < 0)) {
            throw new \InvalidArgumentException('invalid value for $amount_paid_minor when calling CreateAccountingInvoicePaymentRequestInput., must be bigger than or equal to 0.');
        }

        $this->container['amount_paid_minor'] = $amount_paid_minor;

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
            throw new \InvalidArgumentException('invalid length for $currency when calling CreateAccountingInvoicePaymentRequestInput., must be smaller than or equal to 3.');
        }
        if ((mb_strlen($currency) < 3)) {
            throw new \InvalidArgumentException('invalid length for $currency when calling CreateAccountingInvoicePaymentRequestInput., must be bigger than or equal to 3.');
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets checkout
     *
     * @return \RevKeen\Model\CreateAccountingInvoicePaymentRequestInputCheckout|null
     */
    public function getCheckout()
    {
        return $this->container['checkout'];
    }

    /**
     * Sets checkout
     *
     * @param \RevKeen\Model\CreateAccountingInvoicePaymentRequestInputCheckout|null $checkout checkout
     *
     * @return self
     */
    public function setCheckout($checkout)
    {
        if (is_null($checkout)) {
            throw new \InvalidArgumentException('non-nullable checkout cannot be null');
        }
        $this->container['checkout'] = $checkout;

        return $this;
    }

    /**
     * Gets payload_fingerprint
     *
     * @return string|null
     */
    public function getPayloadFingerprint()
    {
        return $this->container['payload_fingerprint'];
    }

    /**
     * Sets payload_fingerprint
     *
     * @param string|null $payload_fingerprint payload_fingerprint
     *
     * @return self
     */
    public function setPayloadFingerprint($payload_fingerprint)
    {
        if (is_null($payload_fingerprint)) {
            array_push($this->openAPINullablesSetToNull, 'payload_fingerprint');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('payload_fingerprint', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }

        if (!is_null($payload_fingerprint) && (mb_strlen($payload_fingerprint) < 8)) {
            throw new \InvalidArgumentException('invalid length for $payload_fingerprint when calling CreateAccountingInvoicePaymentRequestInput., must be bigger than or equal to 8.');
        }

        $this->container['payload_fingerprint'] = $payload_fingerprint;

        return $this;
    }

    /**
     * Gets provider_metadata
     *
     * @return array<string,mixed>|null
     */
    public function getProviderMetadata()
    {
        return $this->container['provider_metadata'];
    }

    /**
     * Sets provider_metadata
     *
     * @param array<string,mixed>|null $provider_metadata provider_metadata
     *
     * @return self
     */
    public function setProviderMetadata($provider_metadata)
    {
        if (is_null($provider_metadata)) {
            throw new \InvalidArgumentException('non-nullable provider_metadata cannot be null');
        }
        $this->container['provider_metadata'] = $provider_metadata;

        return $this;
    }

    /**
     * Gets safe_provider_invoice_snapshot
     *
     * @return array<string,mixed>|null
     */
    public function getSafeProviderInvoiceSnapshot()
    {
        return $this->container['safe_provider_invoice_snapshot'];
    }

    /**
     * Sets safe_provider_invoice_snapshot
     *
     * @param array<string,mixed>|null $safe_provider_invoice_snapshot safe_provider_invoice_snapshot
     *
     * @return self
     */
    public function setSafeProviderInvoiceSnapshot($safe_provider_invoice_snapshot)
    {
        if (is_null($safe_provider_invoice_snapshot)) {
            throw new \InvalidArgumentException('non-nullable safe_provider_invoice_snapshot cannot be null');
        }
        $this->container['safe_provider_invoice_snapshot'] = $safe_provider_invoice_snapshot;

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


