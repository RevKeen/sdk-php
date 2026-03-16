<?php

namespace RevKeen\Types;

enum WebhookEndpointCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
