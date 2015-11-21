<?php

namespace Dashboard\Http\Controllers;

use Dashboard\ProjectsList;
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
        $post_data = $request->input();
        $error = 0;
        if (isset($post_data) && !empty($post_data)) {
            $projectid = ProjectsList::where('Project ID',$post_data['projectid'])->count();
            if ($projectid > 0) {
                $error = 1;
            } else {
                $project = new ProjectsList();
                $project->{'Project ID'} = $post_data['projectid'];
                $project->About = $post_data['project-desc'];
                $project->Country = $post_data['country'];
                $project->C_Link = $post_data['complete'];
                $project->T_Link = $post_data['terminate'];
                $project->Q_Link = $post_data['quotafull'];
                $project->save();
            }
        } else {
            return view("pages.adminpanel");
        }
        return view("pages.regcomplete", compact('error'));
    }
}
