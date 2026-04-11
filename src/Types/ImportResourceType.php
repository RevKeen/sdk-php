<?php

namespace RevKeen\Types;

enum ImportResourceType: string
{
    case Customers = "customers";
    case Products = "products";
    case Invoices = "invoices";
}
