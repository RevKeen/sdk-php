<?php

namespace RevKeen\Types;

enum ProductPricingModel: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
    case Usage = "usage";
}
