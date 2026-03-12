<?php

namespace RevKeen\Types;

enum SubscriptionItemFulfillmentType: string
{
    case None = "none";
    case Physical = "physical";
    case Digital = "digital";
}
