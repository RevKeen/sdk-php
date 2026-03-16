<?php

namespace RevKeen\Types;

enum WebhookEndpointUpdateResponseDataCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
