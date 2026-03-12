<?php

namespace RevKeen\Types;

enum PaymentMethodStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Expired = "expired";
}
