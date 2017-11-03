<?php

namespace RESTQL\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function doc() {
        return view('doc');
    }
    public function account() {
        return view('account');
    }
    
}
