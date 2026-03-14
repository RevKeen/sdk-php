<?php

namespace RevKeen\Meters\Types;

enum CreateMeterRequestAggregation: string
{
    case Sum = "sum";
    case Count = "count";
    case CountUnique = "count_unique";
    case Max = "max";
    case Last = "last";
}
