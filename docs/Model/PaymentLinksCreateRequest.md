# PaymentLinksCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**product_ids** | **string[]** |  | [optional]
**line_items** | [**\RevKeen\Model\PaymentLinksCreateRequestLineItemsInner[]**](PaymentLinksCreateRequestLineItemsInner.md) |  | [optional]
**name** | **string** |  | [optional]
**slug** | **string** |  | [optional]
**mode** | **string** |  | [optional] [default to 'custom']
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Deprecated and ignored. A payment link charges the prices of its products or line_items; an amount sent here is never charged. | [optional]
**currency** | **string** | Not used: a payment link takes its currency from its products. For an ad-hoc line item, set line_items[].price_data.currency. | [optional]
**invoice_id** | **string** | Deprecated and ignored. This endpoint does not create a payment link for an invoice. | [optional]
**subscription_id** | **string** | Deprecated and ignored. This endpoint does not attach a payment link to an existing subscription. | [optional]
**success_url** | **string** | Custom URL to redirect after successful payment. Supports placeholders: {CHECKOUT_ID}, {TRANSACTION_ID}, {PAYMENT_ID}, {CUSTOMER_ID}, {AMOUNT}, {CURRENCY}, {PORTAL_URL}, {CHECKOUT_STATUS_TOKEN}. If not set, redirects to RevKeen&#39;s default success page. | [optional]
**cancel_url** | **string** | Custom URL to redirect if customer cancels the checkout. If not set, no cancel redirect is configured. | [optional]
**redirect_url** | **string** | Deprecated and ignored. Use success_url. | [optional]
**collect_shipping** | **bool** | When true, checkout asks the customer for a delivery address before payment. | [optional] [default to false]
**allow_promotion_codes** | **bool** | Not applied yet: links created through this endpoint do not accept discount codes, whatever this is set to. | [optional] [default to true]
**tax_behavior** | **string** | Whether the link&#39;s prices include tax. inclusive or exclusive is saved on the link; unspecified keeps the default (exclusive). Tax is only calculated when the link&#39;s tax mode is manual or auto, which this endpoint does not set. | [optional] [default to 'unspecified']
**metadata** | **array<string,mixed>** |  | [optional]
**expires_at** | **\DateTime** |  | [optional]
**selection_mode** | **string** | Customer-facing checkout shape. bundle&#x3D;all products together (default); single_select&#x3D;radio picker; multi_select&#x3D;cart with quantity per line. Companion FKs (default_product_id, highlighted_product_id) are only valid when selection_mode&#x3D;&#39;single_select&#39;. | [optional] [default to 'bundle']
**default_product_id** | **string** | For single_select only — option pre-selected when checkout loads. Must reference a product attached to this payment link. | [optional]
**highlighted_product_id** | **string** | For single_select only — option shown with a &#39;Popular&#39; badge in the picker. | [optional]
**idempotency_key** | **string** | Deprecated and ignored. Send the Idempotency-Key header: a repeat request with the same header returns the original response. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
