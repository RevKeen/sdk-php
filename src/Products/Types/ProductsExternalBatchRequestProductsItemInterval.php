<?php

namespace RevKeen\Products\Types;

enum ProductsExternalBatchRequestProductsItemInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
