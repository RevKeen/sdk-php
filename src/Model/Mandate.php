<?php
/**
 * Mandate
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
 * Mandate Class Doc Comment
 *
 * @category Class
 * @description A Direct Debit mandate (customer authorisation to collect via Bacs).
 * @package  RevKeen
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Mandate implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Mandate';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'mandate_ref' => 'string',
        'mandate_reference' => 'string',
        'customer_id' => 'string',
        'status' => 'string',
        'account_holder_name' => 'string',
        'sort_code' => 'string',
        'account_number_last4' => 'string',
        'bank_name' => 'string',
        'statement_name' => 'string',
        'notice_days' => 'int',
        'first_collection_date' => 'string',
        'next_collection_date' => 'string',
        'backup_payment_method_id' => 'string',
        'activated_at' => 'string',
        'suspended_at' => 'string',
        'cancelled_at' => 'string',
        'failure_reason' => 'string',
        'mandate_request_id' => 'string',
        'invoice_id' => 'string',
        'created_at' => 'string',
        'updated_at' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'mandate_ref' => null,
        'mandate_reference' => null,
        'customer_id' => null,
        'status' => null,
        'account_holder_name' => null,
        'sort_code' => null,
        'account_number_last4' => null,
        'bank_name' => null,
        'statement_name' => null,
        'notice_days' => null,
        'first_collection_date' => null,
        'next_collection_date' => null,
        'backup_payment_method_id' => null,
        'activated_at' => null,
        'suspended_at' => null,
        'cancelled_at' => null,
        'failure_reason' => null,
        'mandate_request_id' => null,
        'invoice_id' => null,
        'created_at' => null,
        'updated_at' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
        'mandate_ref' => false,
        'mandate_reference' => true,
        'customer_id' => false,
        'status' => false,
        'account_holder_name' => true,
        'sort_code' => false,
        'account_number_last4' => true,
        'bank_name' => true,
        'statement_name' => true,
        'notice_days' => true,
        'first_collection_date' => true,
        'next_collection_date' => true,
        'backup_payment_method_id' => true,
        'activated_at' => true,
        'suspended_at' => true,
        'cancelled_at' => true,
        'failure_reason' => true,
        'mandate_request_id' => true,
        'invoice_id' => true,
        'created_at' => true,
        'updated_at' => true
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
        'id' => 'id',
        'mandate_ref' => 'mandate_ref',
        'mandate_reference' => 'mandate_reference',
        'customer_id' => 'customer_id',
        'status' => 'status',
        'account_holder_name' => 'account_holder_name',
        'sort_code' => 'sort_code',
        'account_number_last4' => 'account_number_last4',
        'bank_name' => 'bank_name',
        'statement_name' => 'statement_name',
        'notice_days' => 'notice_days',
        'first_collection_date' => 'first_collection_date',
        'next_collection_date' => 'next_collection_date',
        'backup_payment_method_id' => 'backup_payment_method_id',
        'activated_at' => 'activated_at',
        'suspended_at' => 'suspended_at',
        'cancelled_at' => 'cancelled_at',
        'failure_reason' => 'failure_reason',
        'mandate_request_id' => 'mandate_request_id',
        'invoice_id' => 'invoice_id',
        'created_at' => 'created_at',
        'updated_at' => 'updated_at'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'mandate_ref' => 'setMandateRef',
        'mandate_reference' => 'setMandateReference',
        'customer_id' => 'setCustomerId',
        'status' => 'setStatus',
        'account_holder_name' => 'setAccountHolderName',
        'sort_code' => 'setSortCode',
        'account_number_last4' => 'setAccountNumberLast4',
        'bank_name' => 'setBankName',
        'statement_name' => 'setStatementName',
        'notice_days' => 'setNoticeDays',
        'first_collection_date' => 'setFirstCollectionDate',
        'next_collection_date' => 'setNextCollectionDate',
        'backup_payment_method_id' => 'setBackupPaymentMethodId',
        'activated_at' => 'setActivatedAt',
        'suspended_at' => 'setSuspendedAt',
        'cancelled_at' => 'setCancelledAt',
        'failure_reason' => 'setFailureReason',
        'mandate_request_id' => 'setMandateRequestId',
        'invoice_id' => 'setInvoiceId',
        'created_at' => 'setCreatedAt',
        'updated_at' => 'setUpdatedAt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'mandate_ref' => 'getMandateRef',
        'mandate_reference' => 'getMandateReference',
        'customer_id' => 'getCustomerId',
        'status' => 'getStatus',
        'account_holder_name' => 'getAccountHolderName',
        'sort_code' => 'getSortCode',
        'account_number_last4' => 'getAccountNumberLast4',
        'bank_name' => 'getBankName',
        'statement_name' => 'getStatementName',
        'notice_days' => 'getNoticeDays',
        'first_collection_date' => 'getFirstCollectionDate',
        'next_collection_date' => 'getNextCollectionDate',
        'backup_payment_method_id' => 'getBackupPaymentMethodId',
        'activated_at' => 'getActivatedAt',
        'suspended_at' => 'getSuspendedAt',
        'cancelled_at' => 'getCancelledAt',
        'failure_reason' => 'getFailureReason',
        'mandate_request_id' => 'getMandateRequestId',
        'invoice_id' => 'getInvoiceId',
        'created_at' => 'getCreatedAt',
        'updated_at' => 'getUpdatedAt'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('mandate_ref', $data ?? [], null);
        $this->setIfExists('mandate_reference', $data ?? [], null);
        $this->setIfExists('customer_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('account_holder_name', $data ?? [], null);
        $this->setIfExists('sort_code', $data ?? [], null);
        $this->setIfExists('account_number_last4', $data ?? [], null);
        $this->setIfExists('bank_name', $data ?? [], null);
        $this->setIfExists('statement_name', $data ?? [], null);
        $this->setIfExists('notice_days', $data ?? [], null);
        $this->setIfExists('first_collection_date', $data ?? [], null);
        $this->setIfExists('next_collection_date', $data ?? [], null);
        $this->setIfExists('backup_payment_method_id', $data ?? [], null);
        $this->setIfExists('activated_at', $data ?? [], null);
        $this->setIfExists('suspended_at', $data ?? [], null);
        $this->setIfExists('cancelled_at', $data ?? [], null);
        $this->setIfExists('failure_reason', $data ?? [], null);
        $this->setIfExists('mandate_request_id', $data ?? [], null);
        $this->setIfExists('invoice_id', $data ?? [], null);
        $this->setIfExists('created_at', $data ?? [], null);
        $this->setIfExists('updated_at', $data ?? [], null);
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

        if ($this->container['id'] === null) {
            $invalidProperties[] = "'id' can't be null";
        }
        if ($this->container['mandate_ref'] === null) {
            $invalidProperties[] = "'mandate_ref' can't be null";
        }
        if ($this->container['mandate_reference'] === null && !$this->isNullableSetToNull('mandate_reference')) {
            $invalidProperties[] = "'mandate_reference' can't be null";
        }
        if ($this->container['customer_id'] === null) {
            $invalidProperties[] = "'customer_id' can't be null";
        }
        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['account_holder_name'] === null && !$this->isNullableSetToNull('account_holder_name')) {
            $invalidProperties[] = "'account_holder_name' can't be null";
        }
        if ($this->container['sort_code'] === null) {
            $invalidProperties[] = "'sort_code' can't be null";
        }
        if ($this->container['account_number_last4'] === null && !$this->isNullableSetToNull('account_number_last4')) {
            $invalidProperties[] = "'account_number_last4' can't be null";
        }
        if ($this->container['bank_name'] === null && !$this->isNullableSetToNull('bank_name')) {
            $invalidProperties[] = "'bank_name' can't be null";
        }
        if ($this->container['notice_days'] === null && !$this->isNullableSetToNull('notice_days')) {
            $invalidProperties[] = "'notice_days' can't be null";
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
     * Gets id
     *
     * @return string
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string $id Mandate ID
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets mandate_ref
     *
     * @return string
     */
    public function getMandateRef()
    {
        return $this->container['mandate_ref'];
    }

    /**
     * Sets mandate_ref
     *
     * @param string $mandate_ref RevKeen mandate reference (Bacs DDI reference)
     *
     * @return self
     */
    public function setMandateRef($mandate_ref)
    {
        if (is_null($mandate_ref)) {
            throw new \InvalidArgumentException('non-nullable mandate_ref cannot be null');
        }
        $this->container['mandate_ref'] = $mandate_ref;

        return $this;
    }

    /**
     * Gets mandate_reference
     *
     * @return string|null
     */
    public function getMandateReference()
    {
        return $this->container['mandate_reference'];
    }

    /**
     * Sets mandate_reference
     *
     * @param string|null $mandate_reference Human-facing mandate reference
     *
     * @return self
     */
    public function setMandateReference($mandate_reference)
    {
        if (is_null($mandate_reference)) {
            array_push($this->openAPINullablesSetToNull, 'mandate_reference');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('mandate_reference', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['mandate_reference'] = $mandate_reference;

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
     * @param string $customer_id Customer the mandate belongs to
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
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Mandate status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets account_holder_name
     *
     * @return string|null
     */
    public function getAccountHolderName()
    {
        return $this->container['account_holder_name'];
    }

    /**
     * Sets account_holder_name
     *
     * @param string|null $account_holder_name Name on the bank account
     *
     * @return self
     */
    public function setAccountHolderName($account_holder_name)
    {
        if (is_null($account_holder_name)) {
            array_push($this->openAPINullablesSetToNull, 'account_holder_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('account_holder_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['account_holder_name'] = $account_holder_name;

        return $this;
    }

    /**
     * Gets sort_code
     *
     * @return string
     */
    public function getSortCode()
    {
        return $this->container['sort_code'];
    }

    /**
     * Sets sort_code
     *
     * @param string $sort_code Masked sort code — never the full value
     *
     * @return self
     */
    public function setSortCode($sort_code)
    {
        if (is_null($sort_code)) {
            throw new \InvalidArgumentException('non-nullable sort_code cannot be null');
        }
        $this->container['sort_code'] = $sort_code;

        return $this;
    }

    /**
     * Gets account_number_last4
     *
     * @return string|null
     */
    public function getAccountNumberLast4()
    {
        return $this->container['account_number_last4'];
    }

    /**
     * Sets account_number_last4
     *
     * @param string|null $account_number_last4 Last 4 digits of the account number
     *
     * @return self
     */
    public function setAccountNumberLast4($account_number_last4)
    {
        if (is_null($account_number_last4)) {
            array_push($this->openAPINullablesSetToNull, 'account_number_last4');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('account_number_last4', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['account_number_last4'] = $account_number_last4;

        return $this;
    }

    /**
     * Gets bank_name
     *
     * @return string|null
     */
    public function getBankName()
    {
        return $this->container['bank_name'];
    }

    /**
     * Sets bank_name
     *
     * @param string|null $bank_name Resolved bank name
     *
     * @return self
     */
    public function setBankName($bank_name)
    {
        if (is_null($bank_name)) {
            array_push($this->openAPINullablesSetToNull, 'bank_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('bank_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['bank_name'] = $bank_name;

        return $this;
    }

    /**
     * Gets statement_name
     *
     * @return string|null
     */
    public function getStatementName()
    {
        return $this->container['statement_name'];
    }

    /**
     * Sets statement_name
     *
     * @param string|null $statement_name Bacs statement descriptor (max 18 chars)
     *
     * @return self
     */
    public function setStatementName($statement_name)
    {
        if (is_null($statement_name)) {
            array_push($this->openAPINullablesSetToNull, 'statement_name');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('statement_name', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['statement_name'] = $statement_name;

        return $this;
    }

    /**
     * Gets notice_days
     *
     * @return int|null
     */
    public function getNoticeDays()
    {
        return $this->container['notice_days'];
    }

    /**
     * Sets notice_days
     *
     * @param int|null $notice_days Advance-notice days applied
     *
     * @return self
     */
    public function setNoticeDays($notice_days)
    {
        if (is_null($notice_days)) {
            array_push($this->openAPINullablesSetToNull, 'notice_days');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('notice_days', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['notice_days'] = $notice_days;

        return $this;
    }

    /**
     * Gets first_collection_date
     *
     * @return string|null
     */
    public function getFirstCollectionDate()
    {
        return $this->container['first_collection_date'];
    }

    /**
     * Sets first_collection_date
     *
     * @param string|null $first_collection_date Earliest collection date (YYYY-MM-DD)
     *
     * @return self
     */
    public function setFirstCollectionDate($first_collection_date)
    {
        if (is_null($first_collection_date)) {
            array_push($this->openAPINullablesSetToNull, 'first_collection_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('first_collection_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['first_collection_date'] = $first_collection_date;

        return $this;
    }

    /**
     * Gets next_collection_date
     *
     * @return string|null
     */
    public function getNextCollectionDate()
    {
        return $this->container['next_collection_date'];
    }

    /**
     * Sets next_collection_date
     *
     * @param string|null $next_collection_date Next scheduled collection date (YYYY-MM-DD)
     *
     * @return self
     */
    public function setNextCollectionDate($next_collection_date)
    {
        if (is_null($next_collection_date)) {
            array_push($this->openAPINullablesSetToNull, 'next_collection_date');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('next_collection_date', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['next_collection_date'] = $next_collection_date;

        return $this;
    }

    /**
     * Gets backup_payment_method_id
     *
     * @return string|null
     */
    public function getBackupPaymentMethodId()
    {
        return $this->container['backup_payment_method_id'];
    }

    /**
     * Sets backup_payment_method_id
     *
     * @param string|null $backup_payment_method_id Recovery fallback card
     *
     * @return self
     */
    public function setBackupPaymentMethodId($backup_payment_method_id)
    {
        if (is_null($backup_payment_method_id)) {
            array_push($this->openAPINullablesSetToNull, 'backup_payment_method_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('backup_payment_method_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['backup_payment_method_id'] = $backup_payment_method_id;

        return $this;
    }

    /**
     * Gets activated_at
     *
     * @return string|null
     */
    public function getActivatedAt()
    {
        return $this->container['activated_at'];
    }

    /**
     * Sets activated_at
     *
     * @param string|null $activated_at When the mandate became active (ISO 8601)
     *
     * @return self
     */
    public function setActivatedAt($activated_at)
    {
        if (is_null($activated_at)) {
            array_push($this->openAPINullablesSetToNull, 'activated_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('activated_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['activated_at'] = $activated_at;

        return $this;
    }

    /**
     * Gets suspended_at
     *
     * @return string|null
     */
    public function getSuspendedAt()
    {
        return $this->container['suspended_at'];
    }

    /**
     * Sets suspended_at
     *
     * @param string|null $suspended_at When the mandate was suspended (ISO 8601)
     *
     * @return self
     */
    public function setSuspendedAt($suspended_at)
    {
        if (is_null($suspended_at)) {
            array_push($this->openAPINullablesSetToNull, 'suspended_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('suspended_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['suspended_at'] = $suspended_at;

        return $this;
    }

    /**
     * Gets cancelled_at
     *
     * @return string|null
     */
    public function getCancelledAt()
    {
        return $this->container['cancelled_at'];
    }

    /**
     * Sets cancelled_at
     *
     * @param string|null $cancelled_at When the mandate was cancelled (ISO 8601)
     *
     * @return self
     */
    public function setCancelledAt($cancelled_at)
    {
        if (is_null($cancelled_at)) {
            array_push($this->openAPINullablesSetToNull, 'cancelled_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('cancelled_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['cancelled_at'] = $cancelled_at;

        return $this;
    }

    /**
     * Gets failure_reason
     *
     * @return string|null
     */
    public function getFailureReason()
    {
        return $this->container['failure_reason'];
    }

    /**
     * Sets failure_reason
     *
     * @param string|null $failure_reason Most recent failure reason
     *
     * @return self
     */
    public function setFailureReason($failure_reason)
    {
        if (is_null($failure_reason)) {
            array_push($this->openAPINullablesSetToNull, 'failure_reason');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('failure_reason', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['failure_reason'] = $failure_reason;

        return $this;
    }

    /**
     * Gets mandate_request_id
     *
     * @return string|null
     */
    public function getMandateRequestId()
    {
        return $this->container['mandate_request_id'];
    }

    /**
     * Sets mandate_request_id
     *
     * @param string|null $mandate_request_id Mandate-request consumed on creation, if any
     *
     * @return self
     */
    public function setMandateRequestId($mandate_request_id)
    {
        if (is_null($mandate_request_id)) {
            array_push($this->openAPINullablesSetToNull, 'mandate_request_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('mandate_request_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['mandate_request_id'] = $mandate_request_id;

        return $this;
    }

    /**
     * Gets invoice_id
     *
     * @return string|null
     */
    public function getInvoiceId()
    {
        return $this->container['invoice_id'];
    }

    /**
     * Sets invoice_id
     *
     * @param string|null $invoice_id Invoice linked via the mandate-request, if any
     *
     * @return self
     */
    public function setInvoiceId($invoice_id)
    {
        if (is_null($invoice_id)) {
            array_push($this->openAPINullablesSetToNull, 'invoice_id');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('invoice_id', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['invoice_id'] = $invoice_id;

        return $this;
    }

    /**
     * Gets created_at
     *
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->container['created_at'];
    }

    /**
     * Sets created_at
     *
     * @param string|null $created_at Creation timestamp (ISO 8601)
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        if (is_null($created_at)) {
            array_push($this->openAPINullablesSetToNull, 'created_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('created_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['created_at'] = $created_at;

        return $this;
    }

    /**
     * Gets updated_at
     *
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updated_at'];
    }

    /**
     * Sets updated_at
     *
     * @param string|null $updated_at Last-updated timestamp (ISO 8601)
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        if (is_null($updated_at)) {
            array_push($this->openAPINullablesSetToNull, 'updated_at');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index = array_search('updated_at', $nullablesSetToNull);
            if ($index !== FALSE) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['updated_at'] = $updated_at;

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


