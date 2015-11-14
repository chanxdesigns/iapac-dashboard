<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;

class HomeController extends Controller
{
    // Controller for the Homepage
    public function hello() {
        return view('pages.home');
    }
}
