<?php

namespace RevKeen\Products\Types;

enum UpdateProductRequestBillingAnchorRule: string
{
    case SameDay = "same_day";
    case DayOfMonth = "day_of_month";
    case LastDay = "last_day";
}
