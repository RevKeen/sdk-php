<?php

namespace RevKeen\Prices\Types;

enum CreatePriceRequestTiersMode: string
{
    case Graduated = "graduated";
    case Volume = "volume";
}
