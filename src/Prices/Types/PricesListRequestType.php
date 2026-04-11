<?php

namespace RevKeen\Prices\Types;

enum PricesListRequestType: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
}
