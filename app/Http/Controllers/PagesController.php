<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

    public function sitemap()
    {
        return response()->view('pages.sitemap')->header('Content-Type', 'text/xml');
    }
}
