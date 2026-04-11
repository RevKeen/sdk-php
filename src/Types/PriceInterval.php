<?php

namespace RevKeen\Types;

enum PriceInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
