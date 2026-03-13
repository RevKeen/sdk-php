<?php

namespace RevKeen\Types;

enum PaymentAttemptCategory: string
{
    case Approved = "approved";
    case GenericDecline = "generic_decline";
    case InsufficientFunds = "insufficient_funds";
    case OverLimit = "over_limit";
    case ExpiredCard = "expired_card";
    case InvalidCardNumber = "invalid_card_number";
    case InvalidCvv = "invalid_cvv";
    case InvalidExpiry = "invalid_expiry";
    case InvalidPin = "invalid_pin";
    case TransactionNotAllowed = "transaction_not_allowed";
    case CallIssuer = "call_issuer";
    case IncorrectPaymentInfo = "incorrect_payment_info";
    case LostOrStolen = "lost_or_stolen";
    case PickupCard = "pickup_card";
    case SuspectedFraud = "suspected_fraud";
    case RestrictedCard = "restricted_card";
    case StopAllRecurring = "stop_all_recurring";
    case StopThisProgram = "stop_this_program";
    case UpdateCardholderData = "update_cardholder_data";
    case ProcessorError = "processor_error";
    case GatewayError = "gateway_error";
    case CommunicationError = "communication_error";
    case MerchantConfigError = "merchant_config_error";
    case MerchantInactive = "merchant_inactive";
    case IssuerUnavailable = "issuer_unavailable";
    case DuplicateTransaction = "duplicate_transaction";
    case InvalidTransaction = "invalid_transaction";
    case UnsupportedCard = "unsupported_card";
    case FeatureNotAvailable = "feature_not_available";
    case AuthenticationRequired = "authentication_required";
}
