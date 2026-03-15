<?php

namespace RevKeen\Discounts\Types;

enum CreateDiscountInputAppliesTo: string
{
    case All = "all";
    case SpecificProducts = "specific_products";
}
