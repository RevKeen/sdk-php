<?php

namespace RevKeen\Types;

enum PaymentStatus: string
{
    case Pending = "pending";
    case Authorized = "authorized";
    case Captured = "captured";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Voided = "voided";
    case Refunded = "refunded";
    case PartiallyRefunded = "partially_refunded";
}
