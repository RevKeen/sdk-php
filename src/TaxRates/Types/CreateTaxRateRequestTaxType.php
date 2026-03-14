<?php

namespace RevKeen\TaxRates\Types;

enum CreateTaxRateRequestTaxType: string
{
    case Vat = "vat";
    case SalesTax = "sales_tax";
    case Gst = "gst";
    case Other = "other";
}
