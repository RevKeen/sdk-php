<?php

namespace RevKeen\Charges\Types;

enum ChargesRefundRequestReason: string
{
    case Duplicate = "duplicate";
    case Fraudulent = "fraudulent";
    case RequestedByCustomer = "requested_by_customer";
    case Other = "other";
}
