<?php

namespace RevKeen\PaymentLinks\Types;

enum GetPaymentLinkResponseStatus: string
{
    case Draft = "draft";
    case Active = "active";
    case Expired = "expired";
    case Completed = "completed";
}
