<?php

namespace RevKeen\Types;

enum SubscriptionChangePlanResponseSubscriptionBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
