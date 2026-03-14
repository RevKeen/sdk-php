<?php

namespace RevKeen\PaymentLinks\Types;

enum UpdatePaymentLinkStatusResponseStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Archived = "archived";
}
