<?php

namespace RevKeen\Types;

enum PricePricingModel: string
{
    case Fixed = "fixed";
    case PayWhatYouWant = "pay_what_you_want";
    case Free = "free";
}
