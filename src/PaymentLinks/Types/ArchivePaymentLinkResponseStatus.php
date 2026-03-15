<?php

namespace RevKeen\PaymentLinks\Types;

enum ArchivePaymentLinkResponseStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
    case Archived = "archived";
}
