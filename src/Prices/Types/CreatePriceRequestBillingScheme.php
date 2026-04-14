<?php

namespace RevKeen\Prices\Types;

enum CreatePriceRequestBillingScheme: string
{
    case PerUnit = "per_unit";
    case Tiered = "tiered";
}
