# # SubscriptionSchedule

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Public schedule ID (sub_sched_xxx) |
**object** | **string** | Object type |
**status** | **string** | Schedule status. not_started: Scheduled for future. active: Currently executing phases. completed: All phases finished. canceled: Manually canceled. released: Detached from subscription. |
**customer** | **string** | Customer ID |
**subscription** | **string** | Linked subscription ID |
**current_phase** | [**\RevKeen\Model\SubscriptionScheduleCurrentPhase**](SubscriptionScheduleCurrentPhase.md) |  |
**phases** | [**\RevKeen\Model\SchedulePhase[]**](SchedulePhase.md) | All phases in the schedule |
**end_behavior** | **string** | What happens when the schedule completes. cancel: Cancel the subscription. release: Make subscription standalone. |
**released_at** | **int** | When released (Unix timestamp) | [optional]
**released_subscription** | **string** | Subscription ID at release time | [optional]
**metadata** | **array<string,mixed>** | Custom metadata | [optional]
**created** | **int** | Unix timestamp of creation |
**livemode** | **bool** | Whether in live mode |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
