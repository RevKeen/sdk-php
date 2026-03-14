<?php

namespace RevKeen\Discounts\Types;

enum CreateDiscountInputScope: string
{
    case EntireOrder = "entire_order";
    case SpecificProducts = "specific_products";
    case SubscriptionOnly = "subscription_only";
    case OneTimeOnly = "one_time_only";
}
