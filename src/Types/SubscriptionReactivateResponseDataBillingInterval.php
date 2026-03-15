<?php

namespace RevKeen\Types;

enum SubscriptionReactivateResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
