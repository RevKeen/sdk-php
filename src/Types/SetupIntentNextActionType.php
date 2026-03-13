<?php

namespace RevKeen\Types;

enum SetupIntentNextActionType: string
{
    case RedirectToUrl = "redirect_to_url";
    case UseStripeSdk = "use_stripe_sdk";
}
