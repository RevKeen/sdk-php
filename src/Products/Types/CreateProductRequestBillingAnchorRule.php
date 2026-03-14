<?php

namespace RevKeen\Products\Types;

enum CreateProductRequestBillingAnchorRule: string
{
    case SameDay = "same_day";
    case DayOfMonth = "day_of_month";
    case LastDay = "last_day";
}
