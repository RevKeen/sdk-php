<?php

namespace RevKeen\Types;

enum SubscriptionUpdateResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
