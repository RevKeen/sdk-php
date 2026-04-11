<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsRetrieveResponseDataCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
