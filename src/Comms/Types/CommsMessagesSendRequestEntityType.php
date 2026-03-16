<?php

namespace RevKeen\Comms\Types;

enum CommsMessagesSendRequestEntityType: string
{
    case Invoice = "invoice";
    case PaymentLink = "payment_link";
    case Payment = "payment";
    case Subscription = "subscription";
}
