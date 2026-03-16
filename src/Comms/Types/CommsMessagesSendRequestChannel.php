<?php

namespace RevKeen\Comms\Types;

enum CommsMessagesSendRequestChannel: string
{
    case Email = "email";
    case Sms = "sms";
    case Whatsapp = "whatsapp";
}
