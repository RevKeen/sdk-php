<?php

namespace RevKeen\Imports\Types;

enum CreateImportRequestResourceType: string
{
    case Customers = "customers";
    case Products = "products";
    case Invoices = "invoices";
}
