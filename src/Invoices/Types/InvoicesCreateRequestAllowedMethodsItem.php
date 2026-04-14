<?php

namespace RevKeen\Invoices\Types;

enum InvoicesCreateRequestAllowedMethodsItem: string
{
    case Card = "card";
    case InStore = "in_store";
}
