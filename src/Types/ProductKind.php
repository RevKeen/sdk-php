<?php

namespace RevKeen\Types;

enum ProductKind: string
{
    case Subscription = "subscription";
    case OneTime = "one_time";
    case Usage = "usage";
}
