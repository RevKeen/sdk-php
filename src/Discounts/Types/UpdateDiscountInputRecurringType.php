<?php

namespace RevKeen\Discounts\Types;

enum UpdateDiscountInputRecurringType: string
{
    case Once = "once";
    case Forever = "forever";
    case Repeating = "repeating";
}
