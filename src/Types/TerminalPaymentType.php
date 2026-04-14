<?php

namespace RevKeen\Types;

enum TerminalPaymentType: string
{
    case Sale = "sale";
    case Refund = "refund";
    case Void = "void";
}
