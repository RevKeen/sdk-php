<?php

namespace RevKeen\SetupIntents\Types;

enum CancelSetupIntentRequestCancellationReason: string
{
    case Abandoned = "abandoned";
    case RequestedByCustomer = "requested_by_customer";
    case Duplicate = "duplicate";
}
