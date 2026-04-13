<?php

namespace RevKeen\Products\Types;

enum ProductsExternalBatchRequestProductsItemKind: string
{
    case Subscription = "subscription";
    case OneTime = "one_time";
}
