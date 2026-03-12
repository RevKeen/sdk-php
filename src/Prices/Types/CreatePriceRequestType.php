<?php

namespace RevKeen\Prices\Types;

enum CreatePriceRequestType: string
{
    case OneTime = "one_time";
    case Recurring = "recurring";
}
