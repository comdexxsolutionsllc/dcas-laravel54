<?php
// Stripe
Route::post('stripe/webhook', 'WebhookController@handleWebhook');

// Cashier
Route::get('purchases', 'PurchasesController@index')->name('purchase');
Route::post('purchases', 'PurchasesController@store')->name('purchases.post');
