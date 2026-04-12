<?php

namespace RevKeen\Products\Types;

enum ProductsExternalUpsertRequestInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
