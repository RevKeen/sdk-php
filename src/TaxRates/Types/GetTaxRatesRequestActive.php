<?php

namespace RevKeen\TaxRates\Types;

enum GetTaxRatesRequestActive: string
{
    case True = "true";
    case False = "false";
}
