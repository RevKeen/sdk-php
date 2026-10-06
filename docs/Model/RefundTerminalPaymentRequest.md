# RefundTerminalPaymentRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_minor** | [**MoneyMinor**](MoneyMinor.md) | Amount to refund in minor units. Omit for a full refund. | [optional]
**reason** | **string** | Reason for the refund | [optional]
**restock_line_items** | [**\RevKeen\Model\CreateRefundInputRestockLineItemsInner[]**](CreateRefundInputRestockLineItemsInner.md) | Units to put back on sale once the refund is approved, by invoice line. Omit to restock nothing. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
