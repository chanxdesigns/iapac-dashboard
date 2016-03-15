<?php

namespace Dashboard\Http\Controllers;

use Dashboard\ProjectsList;
use Dashboard\RespCounter;
use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\CountValidator\Exception;

class CreateProjectController extends Controller
{
    //Protect From Unauthorized access
    public function __construct()
    {
        $this->middleware('auth');
    }

    // This Method will create new project and
    // set redirects for individual country and project..
    public function createProject (Request $request) {
        if ($request->isMethod('post')) {
            // Check If Project ID is already available in DB
            $n = DB::table('projects_list')->where('Project ID','=',$request->projectid)->count();
            // If Project ID is not available then create project
            // Else display error
            if ($n === 0) {
                $create = ProjectsList::create(
                    [
                        'Project ID' => $request->projectid,
                        'Country' => $request->country,
                        'About' => $request->project_desc,
                        'Vendor' => $request->vendor,
                        'C_Link' => $request->complete,
                        'Q_Link' => $request->quotafull,
                        'T_Link' => $request->terminate,
                        'Survey Link' => $request->survey_link
                    ]
                );
                $status = 201;
                if (count($create) > 0) {
                    return view('pages.createstatus', compact('status','request'));
                }
            } else {
                return view('pages.createstatus', ['status' => 403]);
            }
        }
    }
}
