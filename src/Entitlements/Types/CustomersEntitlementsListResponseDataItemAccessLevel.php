<?php

namespace RevKeen\Entitlements\Types;

enum CustomersEntitlementsListResponseDataItemAccessLevel: string
{
    case Full = "full";
    case Partial = "partial";
    case None = "none";
}
