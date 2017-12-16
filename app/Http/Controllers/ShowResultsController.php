<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ShowResultsController extends Controller
{
    /**
     * Show Complete IDs
     *
     * @param $projectid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCompleteResults($projectid)
    {
        //$rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Complete')->get();

        $rawdataset = collect(DB::table('resp_counters')
            ->leftJoin('survey_prestart', 'resp_counters.respid', '=', 'survey_prestart.user_id')
            ->where('resp_counters.status', 'Complete')
            ->orderBy('resp_counters.enddate', 'ASC')
            ->get())
            ->unique('respid');

        $country = [];
        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }
        }

        return view('pages.showresults', compact('projectid', 'rawdataset', 'country'));
    }

    /**
     * Show Terminate IDs
     *
     * @param $projectid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTerminateResults($projectid)
    {
        $rawdataset = DB::table('resp_counters')->join('survey_prestart', 'projectid', '=', 'survey_prestart.project_id')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Incomplete')->get();
        $country = [];
        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }
        }
        return view('pages.showresults', compact('projectid', 'rawdataset', 'country'));
    }

    /**
     * Show Quotafull IDs
     *
     * @param $projectid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showQuotafullResults($projectid)
    {
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Quotafull')->get();
        $country = [];
        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }
        }
        return view('pages.showresults', compact('projectid', 'rawdataset', 'country'));
    }
}
