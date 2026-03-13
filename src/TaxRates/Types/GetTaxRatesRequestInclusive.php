<?php

namespace RevKeen\TaxRates\Types;

enum GetTaxRatesRequestInclusive: string
{
    case True = "true";
    case False = "false";
}
