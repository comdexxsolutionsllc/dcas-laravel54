<?php

namespace App\Http\Controllers;

use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;

class WebhookController extends CashierController {

    /**
     * [description]
     *
     * @param  array $payload [description]
     *
     * @return [type]          [description]
     */
    public function handleOrderPaymentSucceeded(array $payload)
    {
        Log::info('Payment Succeeded - StripeWebhook - handleOrderPaymentSucceeded()',
            [ 'details' => json_encode($payload) ]);

        return new Response('Webhook Handled', 200);
    }
}