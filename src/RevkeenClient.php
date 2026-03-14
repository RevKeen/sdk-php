<?php

namespace RevKeen;

use RevKeen\Invoices\InvoicesClient;
use RevKeen\UserInvitations\UserInvitationsClient;
use RevKeen\Products\ProductsClient;
use RevKeen\Apps\AppsClient;
use RevKeen\CheckoutSessions\CheckoutSessionsClient;
use RevKeen\Businesses\BusinessesClient;
use RevKeen\Clients\ClientsClient;
use RevKeen\Entitlements\EntitlementsClient;
use RevKeen\Customers\CustomersClient;
use RevKeen\Subscriptions\SubscriptionsClient;
use RevKeen\Comms\CommsClient;
use RevKeen\Analytics\AnalyticsClient;
use RevKeen\Finance\FinanceClient;
use RevKeen\Payouts\PayoutsClient;
use RevKeen\Refunds\RefundsClient;
use RevKeen\Voids\VoidsClient;
use RevKeen\CreditNotes\CreditNotesClient;
use RevKeen\Disputes\DisputesClient;
use RevKeen\Discounts\DiscountsClient;
use RevKeen\PaymentLinks\PaymentLinksClient;
use RevKeen\PaymentAttempts\PaymentAttemptsClient;
use RevKeen\Charges\ChargesClient;
use RevKeen\Billing\BillingClient;
use RevKeen\Prices\PricesClient;
use RevKeen\TaxRates\TaxRatesClient;
use RevKeen\Orders\OrdersClient;
use RevKeen\Payments\PaymentsClient;
use RevKeen\Integrations\IntegrationsClient;
use RevKeen\SyncState\SyncStateClient;
use RevKeen\WebhookEndpoints\WebhookEndpointsClient;
use RevKeen\PaymentIntents\PaymentIntentsClient;
use RevKeen\SetupIntents\SetupIntentsClient;
use RevKeen\PaymentMethods\PaymentMethodsClient;
use RevKeen\Events\EventsClient;
use RevKeen\SubscriptionSchedules\SubscriptionSchedulesClient;
use RevKeen\TerminalPayments\TerminalPaymentsClient;
use RevKeen\TerminalDevices\TerminalDevicesClient;
use GuzzleHttp\ClientInterface;
use RevKeen\Core\Client\RawClient;

class RevkeenClient
{
    /**
     * @var InvoicesClient $invoices
     */
    public InvoicesClient $invoices;

    /**
     * @var UserInvitationsClient $userInvitations
     */
    public UserInvitationsClient $userInvitations;

    /**
     * @var ProductsClient $products
     */
    public ProductsClient $products;

    /**
     * @var AppsClient $apps
     */
    public AppsClient $apps;

    /**
     * @var CheckoutSessionsClient $checkoutSessions
     */
    public CheckoutSessionsClient $checkoutSessions;

    /**
     * @var BusinessesClient $businesses
     */
    public BusinessesClient $businesses;

    /**
     * @var ClientsClient $clients
     */
    public ClientsClient $clients;

    /**
     * @var EntitlementsClient $entitlements
     */
    public EntitlementsClient $entitlements;

    /**
     * @var CustomersClient $customers
     */
    public CustomersClient $customers;

    /**
     * @var SubscriptionsClient $subscriptions
     */
    public SubscriptionsClient $subscriptions;

    /**
     * @var CommsClient $comms
     */
    public CommsClient $comms;

    /**
     * @var AnalyticsClient $analytics
     */
    public AnalyticsClient $analytics;

    /**
     * @var FinanceClient $finance
     */
    public FinanceClient $finance;

    /**
     * @var PayoutsClient $payouts
     */
    public PayoutsClient $payouts;

    /**
     * @var RefundsClient $refunds
     */
    public RefundsClient $refunds;

    /**
     * @var VoidsClient $voids
     */
    public VoidsClient $voids;

    /**
     * @var CreditNotesClient $creditNotes
     */
    public CreditNotesClient $creditNotes;

    /**
     * @var DisputesClient $disputes
     */
    public DisputesClient $disputes;

    /**
     * @var DiscountsClient $discounts
     */
    public DiscountsClient $discounts;

    /**
     * @var PaymentLinksClient $paymentLinks
     */
    public PaymentLinksClient $paymentLinks;

    /**
     * @var PaymentAttemptsClient $paymentAttempts
     */
    public PaymentAttemptsClient $paymentAttempts;

    /**
     * @var ChargesClient $charges
     */
    public ChargesClient $charges;

    /**
     * @var BillingClient $billing
     */
    public BillingClient $billing;

    /**
     * @var PricesClient $prices
     */
    public PricesClient $prices;

    /**
     * @var TaxRatesClient $taxRates
     */
    public TaxRatesClient $taxRates;

    /**
     * @var OrdersClient $orders
     */
    public OrdersClient $orders;

    /**
     * @var PaymentsClient $payments
     */
    public PaymentsClient $payments;

    /**
     * @var IntegrationsClient $integrations
     */
    public IntegrationsClient $integrations;

    /**
     * @var SyncStateClient $syncState
     */
    public SyncStateClient $syncState;

    /**
     * @var WebhookEndpointsClient $webhookEndpoints
     */
    public WebhookEndpointsClient $webhookEndpoints;

    /**
     * @var PaymentIntentsClient $paymentIntents
     */
    public PaymentIntentsClient $paymentIntents;

    /**
     * @var SetupIntentsClient $setupIntents
     */
    public SetupIntentsClient $setupIntents;

    /**
     * @var PaymentMethodsClient $paymentMethods
     */
    public PaymentMethodsClient $paymentMethods;

    /**
     * @var EventsClient $events
     */
    public EventsClient $events;

    /**
     * @var SubscriptionSchedulesClient $subscriptionSchedules
     */
    public SubscriptionSchedulesClient $subscriptionSchedules;

    /**
     * @var TerminalPaymentsClient $terminalPayments
     */
    public TerminalPaymentsClient $terminalPayments;

    /**
     * @var TerminalDevicesClient $terminalDevices
     */
    public TerminalDevicesClient $terminalDevices;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $apiKey,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'x-api-key' => $apiKey,
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'RevKeen',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->invoices = new InvoicesClient($this->client, $this->options);
        $this->userInvitations = new UserInvitationsClient($this->client, $this->options);
        $this->products = new ProductsClient($this->client, $this->options);
        $this->apps = new AppsClient($this->client, $this->options);
        $this->checkoutSessions = new CheckoutSessionsClient($this->client, $this->options);
        $this->businesses = new BusinessesClient($this->client, $this->options);
        $this->clients = new ClientsClient($this->client, $this->options);
        $this->entitlements = new EntitlementsClient($this->client, $this->options);
        $this->customers = new CustomersClient($this->client, $this->options);
        $this->subscriptions = new SubscriptionsClient($this->client, $this->options);
        $this->comms = new CommsClient($this->client, $this->options);
        $this->analytics = new AnalyticsClient($this->client, $this->options);
        $this->finance = new FinanceClient($this->client, $this->options);
        $this->payouts = new PayoutsClient($this->client, $this->options);
        $this->refunds = new RefundsClient($this->client, $this->options);
        $this->voids = new VoidsClient($this->client, $this->options);
        $this->creditNotes = new CreditNotesClient($this->client, $this->options);
        $this->disputes = new DisputesClient($this->client, $this->options);
        $this->discounts = new DiscountsClient($this->client, $this->options);
        $this->paymentLinks = new PaymentLinksClient($this->client, $this->options);
        $this->paymentAttempts = new PaymentAttemptsClient($this->client, $this->options);
        $this->charges = new ChargesClient($this->client, $this->options);
        $this->billing = new BillingClient($this->client, $this->options);
        $this->prices = new PricesClient($this->client, $this->options);
        $this->taxRates = new TaxRatesClient($this->client, $this->options);
        $this->orders = new OrdersClient($this->client, $this->options);
        $this->payments = new PaymentsClient($this->client, $this->options);
        $this->integrations = new IntegrationsClient($this->client, $this->options);
        $this->syncState = new SyncStateClient($this->client, $this->options);
        $this->webhookEndpoints = new WebhookEndpointsClient($this->client, $this->options);
        $this->paymentIntents = new PaymentIntentsClient($this->client, $this->options);
        $this->setupIntents = new SetupIntentsClient($this->client, $this->options);
        $this->paymentMethods = new PaymentMethodsClient($this->client, $this->options);
        $this->events = new EventsClient($this->client, $this->options);
        $this->subscriptionSchedules = new SubscriptionSchedulesClient($this->client, $this->options);
        $this->terminalPayments = new TerminalPaymentsClient($this->client, $this->options);
        $this->terminalDevices = new TerminalDevicesClient($this->client, $this->options);
    }
}
