<?php

namespace Modules\Internal\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class InternalController extends Controller {

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function home()
    {
        return view('internal::tickets.home');
    }
}
