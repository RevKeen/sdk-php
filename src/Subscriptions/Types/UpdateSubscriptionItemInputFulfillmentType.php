<?php

namespace RevKeen\Subscriptions\Types;

enum UpdateSubscriptionItemInputFulfillmentType: string
{
    case None = "none";
    case Physical = "physical";
    case Digital = "digital";
}
