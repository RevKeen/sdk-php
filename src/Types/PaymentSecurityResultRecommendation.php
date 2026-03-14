<?php

namespace RevKeen\Types;

enum PaymentSecurityResultRecommendation: string
{
    case Accept = "accept";
    case Review = "review";
    case Decline = "decline";
}
