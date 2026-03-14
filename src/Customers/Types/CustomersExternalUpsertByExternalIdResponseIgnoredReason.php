<?php

namespace RevKeen\Customers\Types;

enum CustomersExternalUpsertByExternalIdResponseIgnoredReason: string
{
    case StaleUpdate = "stale_update";
}
