<?php

namespace RevKeen\Types;

enum PaymentAttemptSubscriptionDirective: string
{
    case None = "none";
    case StopAll = "stop_all";
    case StopProgram = "stop_program";
    case UpdateCardholderData = "update_cardholder_data";
}
