<?php

namespace RevKeen\Invoices\Types;

enum InvoicesPayRequestPaymentMethod: string
{
    case Cash = "cash";
    case Check = "check";
    case BankTransfer = "bank_transfer";
    case Other = "other";
}
