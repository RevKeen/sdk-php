<?php

namespace RevKeen\Types;

enum TerminalDeviceStatus: string
{
    case Online = "online";
    case Offline = "offline";
    case Pairing = "pairing";
}
