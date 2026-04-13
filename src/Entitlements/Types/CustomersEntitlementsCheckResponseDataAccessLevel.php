<?php

namespace RevKeen\Entitlements\Types;

enum CustomersEntitlementsCheckResponseDataAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
