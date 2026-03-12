<?php

namespace RevKeen\PaymentLinks\Types;

enum ActivatePaymentLinkResponseStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Archived = "archived";
}
