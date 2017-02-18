<?php
// Stripe
Route::get('purchases', 'PurchasesController@index')->name('purchase');
Route::post('purchases', 'PurchasesController@store')->name('purchases.post');

//Route::get('user/invoice/{invoice}', function (Illuminate\Http\Request $request, $invoiceId) {
//    return $request->user()->downloadInvoice($invoiceId, [
//        'vendor'  => 'Comdexx Solutions LLC',
//        'product' => 'Datacenter Automation Suite&trade;',
//    ]);
//});