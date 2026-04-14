<?php

namespace RevKeen\CheckoutSessions\Types;

enum CreateCheckoutSessionInputAllowedMethodsItem: string
{
    case Card = "card";
    case InStore = "in_store";
}
