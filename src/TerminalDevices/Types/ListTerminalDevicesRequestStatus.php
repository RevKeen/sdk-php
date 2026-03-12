<?php

namespace RevKeen\TerminalDevices\Types;

enum ListTerminalDevicesRequestStatus: string
{
    case Online = "online";
    case Offline = "offline";
    case Pairing = "pairing";
}
