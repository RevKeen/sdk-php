<?php

namespace RevKeen\Types;

enum SetupIntentCancellationReason: string
{
    case Abandoned = "abandoned";
    case RequestedByCustomer = "requested_by_customer";
    case Duplicate = "duplicate";
}
