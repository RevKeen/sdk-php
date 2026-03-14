<?php

namespace RevKeen\PaymentLinks\Types;

enum GetPaymentLinkResponseLineItemsItemProductDetailsRecurringInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
