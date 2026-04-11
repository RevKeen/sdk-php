<?php

namespace RevKeen\Types;

enum SubscriptionResumeResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
