<?php

namespace RevKeen\Types;

enum SubscriptionCancelSubscriptionResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
