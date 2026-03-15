<?php

namespace RevKeen\Types;

enum TaxRateTaxType: string
{
    case Vat = "vat";
    case SalesTax = "sales_tax";
    case Gst = "gst";
    case Other = "other";
}
