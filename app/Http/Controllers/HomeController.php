<?php

namespace App\Http\Controllers;

use Cache;
use Datatables;
use DB;

class HomeController extends Controller
{

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
        return view('dashboard');
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
        $users = \Cache::remember('users', 10, function () {
            $query = \DB::table('users')->select(DB::raw('id, name, email, last_logged_in_at, created_at, updated_at'))->get();

            return $query;
        });

        return Datatables::of($users)->make(true);
    }
}
