<?php

namespace RevKeen\Types;

enum WebhookEndpointRetrieveResponseDataCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
