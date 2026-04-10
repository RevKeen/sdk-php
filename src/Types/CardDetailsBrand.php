<?php

namespace RevKeen\Types;

enum CardDetailsBrand: string
{
    case Visa = "visa";
    case Mastercard = "mastercard";
    case Amex = "amex";
    case Discover = "discover";
    case Diners = "diners";
    case Jcb = "jcb";
    case Unionpay = "unionpay";
    case Unknown = "unknown";
}
