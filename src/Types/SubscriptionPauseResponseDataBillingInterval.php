<?php

namespace RevKeen\Types;

enum SubscriptionPauseResponseDataBillingInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
