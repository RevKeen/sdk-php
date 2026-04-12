<?php

namespace RevKeen\PaymentLinks\Types;

enum DeactivatePaymentLinkResponseStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Archived = "archived";
}
