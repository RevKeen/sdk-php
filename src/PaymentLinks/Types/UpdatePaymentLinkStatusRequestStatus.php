<?php

namespace RevKeen\PaymentLinks\Types;

enum UpdatePaymentLinkStatusRequestStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Archived = "archived";
}
