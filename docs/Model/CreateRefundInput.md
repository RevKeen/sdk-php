# CreateRefundInput

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**payment_id** | **string** | The ID of the payment to refund |
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Amount to refund in cents. If not provided, refunds the full remaining amount. | [optional]
**reason** | **string** | Reason for the refund | [optional]
**reason_details** | **string** | Additional details about the refund reason | [optional]
**restock_line_items** | [**\RevKeen\Model\CreateRefundInputRestockLineItemsInner[]**](CreateRefundInputRestockLineItemsInner.md) | Units to put back on sale once the refund succeeds, by invoice line. Omit to restock nothing: an amount alone never restocks. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
