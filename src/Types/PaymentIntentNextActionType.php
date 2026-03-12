<?php

namespace RevKeen\Types;

enum PaymentIntentNextActionType: string
{
    case RedirectToUrl = "redirect_to_url";
    case UseStripeSdk = "use_stripe_sdk";
    case DisplayBankTransferInstructions = "display_bank_transfer_instructions";
}
