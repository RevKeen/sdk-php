<?php

namespace RevKeen\Types;

enum ProductFulfillmentType: string
{
    case None = "none";
    case Digital = "digital";
    case Physical = "physical";
}
