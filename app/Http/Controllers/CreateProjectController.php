<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;

class CreateProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // This Method will create new project and set redirects for individual country and project..
    public function createProject (Request $request) {
        $request->input();

    }
}
