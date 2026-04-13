<?php

namespace RevKeen\Transactions\Types;

enum TransactionsListRequestType: string
{
    case Sale = "sale";
    case Refund = "refund";
    case Void = "void";
    case Capture = "capture";
    case Dispute = "dispute";
    case Adjustment = "adjustment";
}
