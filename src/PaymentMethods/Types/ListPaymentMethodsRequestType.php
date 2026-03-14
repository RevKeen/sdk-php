<?php

namespace RevKeen\PaymentMethods\Types;

enum ListPaymentMethodsRequestType: string
{
    case Card = "card";
    case BankAccount = "bank_account";
    case UsBankAccount = "us_bank_account";
}
