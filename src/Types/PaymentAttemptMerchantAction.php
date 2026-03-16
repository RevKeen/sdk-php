<?php

namespace RevKeen\Types;

enum PaymentAttemptMerchantAction: string
{
    case None = "none";
    case CollectNewPm = "collect_new_pm";
    case FixConfig = "fix_config";
    case ContactSupport = "contact_support";
    case FraudReview = "fraud_review";
    case ScheduleRetry = "schedule_retry";
    case ContactBank = "contact_bank";
    case StopRecurring = "stop_recurring";
}
