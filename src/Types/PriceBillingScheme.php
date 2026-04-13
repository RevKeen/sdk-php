<?php

namespace RevKeen\Types;

enum PriceBillingScheme: string
{
    case PerUnit = "per_unit";
    case Tiered = "tiered";
}
