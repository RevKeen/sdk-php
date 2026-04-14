<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsListResponseDataItemCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
