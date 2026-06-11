# # PaymentLinksCreateRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**product_ids** | **string[]** |  | [optional]
**line_items** | [**\RevKeen\Model\PaymentLinksCreateRequestLineItemsInner[]**](PaymentLinksCreateRequestLineItemsInner.md) |  | [optional]
**name** | **string** |  | [optional]
**slug** | **string** |  | [optional]
**mode** | **string** |  | [optional] [default to 'custom']
**amount_minor** | **int** |  | [optional]
**currency** | **string** |  | [optional] [default to 'USD']
**invoice_id** | **string** |  | [optional]
**subscription_id** | **string** |  | [optional]
**success_url** | **string** | Custom URL to redirect after successful payment. Supports placeholders: {CHECKOUT_ID}, {TRANSACTION_ID}, {PAYMENT_ID}, {CUSTOMER_ID}, {AMOUNT}, {CURRENCY}, {PORTAL_URL}. If not set, redirects to RevKeen&#39;s default success page. | [optional]
**cancel_url** | **string** | Custom URL to redirect if customer cancels the checkout. If not set, no cancel redirect is configured. | [optional]
**redirect_url** | **string** |  | [optional]
**collect_shipping** | **bool** |  | [optional] [default to false]
**allow_promotion_codes** | **bool** |  | [optional] [default to true]
**tax_behavior** | **string** |  | [optional] [default to 'unspecified']
**metadata** | **array<string,mixed>** |  | [optional]
**expires_at** | **\DateTime** |  | [optional]
**selection_mode** | **string** | Customer-facing checkout shape. bundle&#x3D;all products together (default); single_select&#x3D;radio picker; multi_select&#x3D;cart with quantity per line. Companion FKs (default_product_id, highlighted_product_id) are only valid when selection_mode&#x3D;&#39;single_select&#39;. | [optional] [default to 'bundle']
**default_product_id** | **string** | For single_select only — option pre-selected when checkout loads. Must reference a product attached to this payment link. | [optional]
**highlighted_product_id** | **string** | For single_select only — option shown with a &#39;Popular&#39; badge in the picker. | [optional]
**idempotency_key** | **string** |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
