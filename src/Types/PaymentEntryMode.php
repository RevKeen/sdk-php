<?php

namespace RevKeen\Types;

enum PaymentEntryMode: string
{
    case EmvChip = "emv_chip";
    case Contactless = "contactless";
    case MagneticStripe = "magnetic_stripe";
    case ManualEntry = "manual_entry";
    case Fallback = "fallback";
}
