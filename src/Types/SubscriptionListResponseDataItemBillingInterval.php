<?php

namespace RevKeen\Types;

enum SubscriptionListResponseDataItemBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
