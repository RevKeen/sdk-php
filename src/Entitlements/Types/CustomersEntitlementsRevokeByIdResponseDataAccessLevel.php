<?php

namespace RevKeen\Entitlements\Types;

enum CustomersEntitlementsRevokeByIdResponseDataAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
