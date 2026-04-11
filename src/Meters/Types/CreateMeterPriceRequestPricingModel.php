<?php

namespace RevKeen\Meters\Types;

enum CreateMeterPriceRequestPricingModel: string
{
    case PerUnit = "per_unit";
    case Graduated = "graduated";
    case Volume = "volume";
    case Package = "package";
}
