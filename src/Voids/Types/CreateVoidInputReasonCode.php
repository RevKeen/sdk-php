<?php

namespace RevKeen\Voids\Types;

enum CreateVoidInputReasonCode: string
{
    case CustomerRequest = "customer_request";
    case Duplicate = "duplicate";
    case Fraudulent = "fraudulent";
    case Error = "error";
    case Other = "other";
}
