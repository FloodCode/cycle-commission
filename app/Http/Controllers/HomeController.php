<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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

    public function commission()
    {
        return view('pages.commission');
    }

    public function locale($code)
    {
        $localeValid = \App\Core\Locale::validateAppLocale($code);

        if (!$localeValid)
        {
            abort(404);
        }

        session()->put('app-locale', $code);

        return redirect()->back();
    }
}
