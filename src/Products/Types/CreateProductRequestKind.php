<?php

namespace RevKeen\Products\Types;

enum CreateProductRequestKind: string
{
    case Subscription = "subscription";
    case OneTime = "one_time";
    case Usage = "usage";
}
