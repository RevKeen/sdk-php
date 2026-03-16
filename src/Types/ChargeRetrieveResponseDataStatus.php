<?php

namespace RevKeen\Types;

enum ChargeRetrieveResponseDataStatus: string
{
    case Pending = "pending";
    case Processing = "processing";
    case Succeeded = "succeeded";
    case Failed = "failed";
    case Refunded = "refunded";
    case PartiallyRefunded = "partially_refunded";
    case Voided = "voided";
}
