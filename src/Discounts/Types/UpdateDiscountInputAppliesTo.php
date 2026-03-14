<?php

namespace RevKeen\Discounts\Types;

enum UpdateDiscountInputAppliesTo: string
{
    case All = "all";
    case SpecificProducts = "specific_products";
}
