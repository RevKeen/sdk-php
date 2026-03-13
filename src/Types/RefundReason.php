<?php

namespace RevKeen\Types;

enum RefundReason: string
{
    case CustomerRequest = "customer_request";
    case Duplicate = "duplicate";
    case Fraudulent = "fraudulent";
    case ProductNotReceived = "product_not_received";
    case ProductUnacceptable = "product_unacceptable";
    case SubscriptionCanceled = "subscription_canceled";
    case Other = "other";
}
