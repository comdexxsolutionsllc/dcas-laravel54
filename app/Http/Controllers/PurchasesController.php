<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Menu;
use Stripe\Stripe;

class PurchasesController extends Controller {

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
        Menu::make('MyNavBar', function ($menu)
        {

            $menu->add('Home');
            $menu->add('About', 'about');
            $menu->add('services', 'services');
            $menu->add('Contact', 'contact');

        });

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
