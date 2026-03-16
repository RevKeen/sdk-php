<?php

namespace RevKeen\Types;

enum WebhookEndpointListResponseDataItemCircuitBreakerState: string
{
    case Closed = "closed";
    case Open = "open";
    case HalfOpen = "half_open";
}
