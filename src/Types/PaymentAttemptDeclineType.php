<?php

namespace RevKeen\Types;

enum PaymentAttemptDeclineType: string
{
    case Soft = "soft";
    case Hard = "hard";
}
