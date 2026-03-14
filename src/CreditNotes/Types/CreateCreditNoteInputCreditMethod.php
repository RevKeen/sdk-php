<?php

namespace RevKeen\CreditNotes\Types;

enum CreateCreditNoteInputCreditMethod: string
{
    case RefundToPaymentMethod = "refund_to_payment_method";
    case CustomerBalance = "customer_balance";
    case External = "external";
}
