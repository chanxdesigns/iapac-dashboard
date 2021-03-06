<?php

namespace Dashboard\Http\Controllers;

use Dashboard\ProjectsList;
use Dashboard\RespCounter;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
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
            $n = DB::table('projects_list')->where('Project ID','=',$request->projectid)->where('Vendor','=',$request->vendor)->where('Country','=',$request->country)->count();
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
                        'D_Link' => $request->dropoff,
                        'Survey Link' => $request->survey_link
                    ]
                );
                $status = 201;
                return view('pages.createstatus', compact('status','request'));
            } else {
                return view('pages.createstatus', ['status' => 403]);
            }
        }
    }

    //Edit Project Method
    //Renders the Update Project view
    public function editProject ($vendor, $projectid, $country) {
        $project = ProjectsList::where('Project ID','=',$projectid)->where('Vendor','=',$vendor)->where('Country','=',$country)->firstOrFail();
        return view('pages.updateproject',compact('project'));
    }

    //Main method to store the Updated Data
    public function updateProject (Request $request, $vendor, $projectid, $country) {
        $result = ProjectsList::where('Project ID','=',$projectid)->where('Vendor','=',$vendor)->where('Country','=',$country)->update(
            [
                'About' => $request->project_desc,
                'Vendor' => $request->vendor,
                'C_Link' => $request->complete,
                'Q_Link' => $request->quotafull,
                'T_Link' => $request->terminate,
                'Survey Link' => $request->survey_link
            ]
        );
        if ($result === 1) {
            return redirect("/adminpanel/projects/$projectid/$request->vendor/$country");
        } else {
            return response('Failed',400);
        }
    }

    //Delete all responses associated with the Project ID
    public function deleteByProjectId ($projectid) {
        RespCounter::where('projectid','=',$projectid)->delete();
        ProjectsList::where('Project ID','=',$projectid)->delete();
    }
}
