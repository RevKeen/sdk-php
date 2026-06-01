# # SchedulePhase

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**items** | [**\RevKeen\Model\PhaseItem[]**](PhaseItem.md) | Products/prices included in this phase |
**start_date** | **string** | When this phase starts (ISO 8601 date) |
**end_date** | **string** | When this phase ends (null for indefinite) | [optional]
**proration_behavior** | **string** | How to handle prorations when entering this phase | [optional]
**billing_cycle_anchor** | **string** | Override billing cycle anchor for this phase | [optional]
**default_payment_method** | **string** | Payment method to use for this phase | [optional]
**collection_method** | **string** | How to collect payment for this phase | [optional]
**coupon** | **string** | Coupon code to apply during this phase | [optional]
**trial_end** | **string** | End of trial period (if applicable) | [optional]
**metadata** | **array<string,mixed>** | Phase-specific metadata | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
