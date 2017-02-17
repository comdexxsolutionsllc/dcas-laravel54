<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\
{
    Stripe, Charge, Customer
};
use Auth;

class PurchasesController extends Controller {
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stripe_key = config('services.stripe.key');

        return view('stripe-test', compact('stripe_key'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = request('stripeToken');
        Stripe::setApiKey(config('services.stripe.secret'));

        //$customer = Customer::create([
        //    'email'  => request('stripeEmail'),
        //    'source' => $token
        //]);
        //
        //$charge = Charge::create([
        //        "customer"    => $customer->id,
        //        "amount"      => '999',
        //        "currency"    => "usd",
        //        "description" => "Example charge"
        //    ]);

        return \Auth::user()->newSubscription('main', 'monthly')->create($token);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
