<?php

namespace RevKeen\Invoices\Types;

enum InvoicesSendRequestChannel: string
{
    case Email = "email";
    case Sms = "sms";
    case Whatsapp = "whatsapp";
}
