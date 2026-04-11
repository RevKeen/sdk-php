<?php

namespace RevKeen\Billing\Types;

enum BillingGeneratePreviewRequestFirstChargeBehavior: string
{
    case Immediate = "immediate";
    case NextAnchor = "next_anchor";
    case Prorate = "prorate";
}
