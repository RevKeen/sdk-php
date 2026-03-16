<?php

namespace RevKeen\PaymentLinks\Types;

enum ListPaymentLinksResponseDataItemLineItemsItemProductDetailsRecurringInterval: string
{
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Year = "year";
}
