<?php

namespace RevKeen\Types;

enum PaymentMethodType: string
{
    case Card = "card";
    case BankAccount = "bank_account";
    case UsBankAccount = "us_bank_account";
}
