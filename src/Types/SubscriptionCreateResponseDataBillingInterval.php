<?php

namespace RevKeen\Types;

enum SubscriptionCreateResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
