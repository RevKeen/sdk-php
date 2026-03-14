<?php

namespace RevKeen\Types;

enum PaymentAttemptCustomerAction: string
{
    case TryAgain = "try_again";
    case UseOtherMethod = "use_other_method";
    case UpdateCard = "update_card";
    case ContactBank = "contact_bank";
    case ContactMerchant = "contact_merchant";
    case None = "none";
}
