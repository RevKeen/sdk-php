<?php

namespace RevKeen\PaymentIntents\Types;

enum CreatePaymentIntentRequestCaptureMethod: string
{
    case Automatic = "automatic";
    case Manual = "manual";
}
