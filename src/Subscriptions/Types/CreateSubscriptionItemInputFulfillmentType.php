<?php

namespace RevKeen\Subscriptions\Types;

enum CreateSubscriptionItemInputFulfillmentType: string
{
    case None = "none";
    case Physical = "physical";
    case Digital = "digital";
}
