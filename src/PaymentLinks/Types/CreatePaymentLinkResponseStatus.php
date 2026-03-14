<?php

namespace RevKeen\PaymentLinks\Types;

enum CreatePaymentLinkResponseStatus: string
{
    case Draft = "draft";
    case Active = "active";
    case Expired = "expired";
    case Completed = "completed";
}
