# # CreateSubscriptionScheduleRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**customer** | **string** | Customer ID (required if no subscription) | [optional]
**subscription** | **string** | Existing subscription to attach schedule to | [optional]
**start_date** | [**\RevKeen\Model\CreateSubscriptionScheduleRequestStartDate**](CreateSubscriptionScheduleRequestStartDate.md) |  | [optional]
**phases** | [**\RevKeen\Model\SchedulePhase[]**](SchedulePhase.md) | Phases defining the schedule (at least one required) |
**end_behavior** | **string** | What happens when all phases complete | [optional] [default to 'cancel']
**metadata** | **array<string,mixed>** | Custom metadata | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
