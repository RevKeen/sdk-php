<?php

namespace RevKeen\Prices\Types;

enum CreatePriceRequestInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
