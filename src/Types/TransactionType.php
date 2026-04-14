<?php

namespace RevKeen\Types;

enum TransactionType: string
{
    case Sale = "sale";
    case Refund = "refund";
    case Void = "void";
    case Capture = "capture";
    case Dispute = "dispute";
    case Adjustment = "adjustment";
}
