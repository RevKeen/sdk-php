<?php

namespace RevKeen\PaymentLinks\Types;

enum CreatePaymentLinkRequestLineItemsItemPriceDataTaxBehavior: string
{
    case Inclusive = "inclusive";
    case Exclusive = "exclusive";
}
