<?php

namespace RevKeen\Types;

enum PaymentIntentCancellationReason: string
{
    case Duplicate = "duplicate";
    case Fraudulent = "fraudulent";
    case RequestedByCustomer = "requested_by_customer";
    case Abandoned = "abandoned";
    case FailedInvoice = "failed_invoice";
}
