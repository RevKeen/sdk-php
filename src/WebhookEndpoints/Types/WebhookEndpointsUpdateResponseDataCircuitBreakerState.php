<?php

namespace RevKeen\WebhookEndpoints\Types;

enum WebhookEndpointsUpdateResponseDataCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
