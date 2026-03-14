<?php

namespace RevKeen\Discounts\Types;

enum CreateDiscountInputDiscountType: string
{
    case Percentage = "percentage";
    case FixedAmount = "fixed_amount";
}
