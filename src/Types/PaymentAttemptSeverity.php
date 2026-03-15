<?php

namespace RevKeen\Types;

enum PaymentAttemptSeverity: string
{
    case Info = "info";
    case Warn = "warn";
    case Error = "error";
}
