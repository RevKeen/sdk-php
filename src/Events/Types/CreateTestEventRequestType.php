<?php

namespace RevKeen\Events\Types;

enum CreateTestEventRequestType: string
{
    case CheckoutSessionCompleted = "checkout.session.completed";
    case CheckoutSessionExpired = "checkout.session.expired";
    case CheckoutSessionAsyncPaymentSucceeded = "checkout.session.async_payment_succeeded";
    case CheckoutSessionAsyncPaymentFailed = "checkout.session.async_payment_failed";
    case InvoiceCreated = "invoice.created";
    case InvoiceFinalized = "invoice.finalized";
    case InvoicePaid = "invoice.paid";
    case InvoicePaymentFailed = "invoice.payment_failed";
    case InvoiceVoided = "invoice.voided";
    case InvoiceMarkedUncollectible = "invoice.marked_uncollectible";
    case InvoiceUpcoming = "invoice.upcoming";
    case InvoiceSent = "invoice.sent";
    case PaymentSucceeded = "payment.succeeded";
    case PaymentFailed = "payment.failed";
    case PaymentRefunded = "payment.refunded";
    case PaymentDisputed = "payment.disputed";
    case PaymentIntentCreated = "payment_intent.created";
    case PaymentIntentSucceeded = "payment_intent.succeeded";
    case PaymentIntentPaymentFailed = "payment_intent.payment_failed";
    case PaymentIntentCanceled = "payment_intent.canceled";
    case PaymentIntentRequiresAction = "payment_intent.requires_action";
    case PaymentMethodAttached = "payment_method.attached";
    case PaymentMethodDetached = "payment_method.detached";
    case PaymentMethodUpdated = "payment_method.updated";
    case SubscriptionCreated = "subscription.created";
    case SubscriptionUpdated = "subscription.updated";
    case SubscriptionCanceled = "subscription.canceled";
    case SubscriptionPaused = "subscription.paused";
    case SubscriptionResumed = "subscription.resumed";
    case SubscriptionTrialWillEnd = "subscription.trial_will_end";
    case SubscriptionRenewed = "subscription.renewed";
    case CustomerCreated = "customer.created";
    case CustomerUpdated = "customer.updated";
    case CustomerDeleted = "customer.deleted";
    case RefundCreated = "refund.created";
    case RefundUpdated = "refund.updated";
    case RefundFailed = "refund.failed";
    case DisputeCreated = "dispute.created";
    case DisputeUpdated = "dispute.updated";
    case DisputeClosed = "dispute.closed";
    case OrderCreated = "order.created";
    case OrderPaid = "order.paid";
    case OrderCanceled = "order.canceled";
}
