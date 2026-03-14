<?php

namespace RevKeen\Customers\Types;

enum CustomersPaymentsListRequestStatus: string
{
    case Pending = "pending";
    case Authorized = "authorized";
    case Captured = "captured";
    case Failed = "failed";
    case Voided = "voided";
    case Refunded = "refunded";
}
