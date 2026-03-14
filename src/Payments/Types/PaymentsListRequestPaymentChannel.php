<?php

namespace RevKeen\Payments\Types;

enum PaymentsListRequestPaymentChannel: string
{
    case CardPresent = "card_present";
    case CardNotPresent = "card_not_present";
    case BankTransfer = "bank_transfer";
    case Manual = "manual";
}
