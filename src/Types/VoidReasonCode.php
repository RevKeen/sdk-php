<?php

namespace RevKeen\Types;

enum VoidReasonCode: string
{
    case CustomerRequest = "customer_request";
    case Duplicate = "duplicate";
    case Fraudulent = "fraudulent";
    case Error = "error";
    case Other = "other";
}
