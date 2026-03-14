<?php

namespace RevKeen\Products\Types;

enum ProductsExternalUpsertRequestKind: string
{
    case Subscription = "subscription";
    case OneTime = "one_time";
}
