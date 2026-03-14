<?php

namespace RevKeen\Billing\Types;

enum BillingGeneratePreviewRequestBillingAnchorRule: string
{
    case SameDay = "same_day";
    case DayOfMonth = "day_of_month";
    case LastDay = "last_day";
}
