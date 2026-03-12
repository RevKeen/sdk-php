<?php

namespace RevKeen\Types;

enum SubscriptionRetrieveResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
