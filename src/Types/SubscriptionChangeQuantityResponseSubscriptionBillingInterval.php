<?php

namespace RevKeen\Types;

enum SubscriptionChangeQuantityResponseSubscriptionBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
