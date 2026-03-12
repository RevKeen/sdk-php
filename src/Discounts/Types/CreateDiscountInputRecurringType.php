<?php

namespace RevKeen\Discounts\Types;

enum CreateDiscountInputRecurringType: string
{
    case Once = "once";
    case Forever = "forever";
    case Repeating = "repeating";
}
