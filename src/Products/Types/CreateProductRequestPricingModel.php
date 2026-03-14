<?php

namespace RevKeen\Products\Types;

enum CreateProductRequestPricingModel: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
    case Usage = "usage";
}
