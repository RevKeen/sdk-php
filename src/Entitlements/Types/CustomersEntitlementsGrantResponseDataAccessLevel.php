<?php

namespace RevKeen\Entitlements\Types;

enum CustomersEntitlementsGrantResponseDataAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
