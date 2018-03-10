<?php

namespace Dashboard\Http\Controllers;

use Dashboard\ProjectsList;
use Dashboard\RespCounter;
use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAdminPanel () {
        /*******************************
         * Project ID
         */
        $projectid = DB::table('resp_counters')->lists('projectid');
        $projectid = array_unique($projectid);
        array_splice($projectid,0,0);

        /*******************************
         * Country
         */
        $country = DB::table('resp_counters')->lists('Languageid');
        $country = array_unique($country);
        array_splice($country,0,0);
        return view('pages.adminpanel', compact('projectid','country'));
    }

    public function getData ($id,$status,$country) {
        $data = DB::table('resp_counters')->select('respid','projectid','Languageid','status','enddate')->where('projectid','=',$id)->where('Languageid','=',$country)->where('status','=',$status)->get();
        return json_encode($data);
    }

    public function deleteData (Request $request) {
        $dataArray = $request->input();
        //$dataArray = implode(",",$dataArray);
        $result = DB::table('resp_counters')->whereIn('respid', $dataArray)->delete();
        return $result;
    }

    /**
     * Get All Projects Details
     */
    public function getAllProjects () {
        $data = DB::table('projects_list')->select('Project ID','About', 'Vendor', 'Country', 'created_at', 'updated_at')->distinct('Project ID')->orderBy('created_at', 'desc')->get();//
        return response()->json($data);
    }

    /**
     * Get Individual Projects Details
     */
    public function viewProjectDetails ($projectid,$vendor,$country) {
        $data = ProjectsList::where('Project ID','=',$projectid)->where('Vendor','=',$vendor)->where('Country','=',$country)->firstOrFail();

        $ccode = "";
        switch ($data->Country) {
            case "China":
                $ccode = "ZH";
                break;
            case "Japan":
                $ccode = "JP";
                break;
            case "South Korea":
                $ccode = "ROK";
                break;
            case "Philippines":
                $ccode = "PH";
                break;
            case "Indonesia":
                $ccode = "ID";
                break;
            case "Malaysia":
                $ccode = "MY";
                break;
            case "Vietnam":
                $ccode = "VN";
                break;
            case "India":
                $ccode = "IN";
                break;
            case "Thailand":
                $ccode = "TH";
                break;
            case "Hong Kong":
                $ccode = "HK";
                break;
            case "Singapore":
                $ccode = "SG";
                break;
            case "UAE":
                $ccode = "UAE";
                break;
            case "Saudi Arabia":
                $ccode = "KSA";
                break;
            case "Jordan":
                $ccode = "JO";
                break;
            case "South Africa":
                $ccode = "SA";
                break;
            case "Australia":
                $ccode = "AUS";
                break;
            case "Taiwan":
                $ccode = "TW";
                break;
        }

        return view('pages.projectdetails',compact('data', 'ccode'));
    }
}
