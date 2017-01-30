<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Datatables;
use DB;
use App\User;

class HomeController extends Controller {

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables-test');
    }


    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $users = Cache::remember('users', 10, function ()
        {
            return DB::table('users')->get();
        });

        return Datatables::of($users)->make(true);
    }
}
