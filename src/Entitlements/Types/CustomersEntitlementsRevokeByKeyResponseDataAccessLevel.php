<?php

namespace RevKeen\Entitlements\Types;

enum CustomersEntitlementsRevokeByKeyResponseDataAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
