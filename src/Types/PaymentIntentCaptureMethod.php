<?php

namespace RevKeen\Types;

enum PaymentIntentCaptureMethod: string
{
    case Automatic = "automatic";
    case Manual = "manual";
}
