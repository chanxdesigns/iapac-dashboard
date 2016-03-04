<?php

namespace Dashboard\Http\Controllers;

use Dashboard\ProjectsList;
use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreateProjectController extends Controller
{
    //Protect From Unauthorized access
    public function __construct()
    {
        $this->middleware('auth');
    }

    // This Method will create new project and set redirects for individual country and project..
    public function createProject (Request $request) {
        if ($request->isMethod('post')) {
            DB::table('projects_list')->insert(
                [
                    'Project ID' => $request->projectid,
                    'Country' => $request->country,
                    'About' => $request->{'project-desc'},
                    'Vendor' => $request->vendor,
                    'C_Link' => $request->complete,
                    'Q_Link' => $request->terminate,
                    'T_Link' => $request->quotafull
                ]
            );
        }
    }
}
