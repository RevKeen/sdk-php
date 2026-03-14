<?php

namespace RevKeen\Products\Types;

enum ProductsExternalUpsertResponseDataKind: string
{
    case Subscription = "subscription";
    case OneTime = "one_time";
}
