<?php

namespace RevKeen\TerminalPayments\Types;

enum ListTerminalPaymentsRequestType: string
{
    case Sale = "sale";
    case Refund = "refund";
    case Void = "void";
}
