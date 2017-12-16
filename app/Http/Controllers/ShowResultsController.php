<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowResultsController extends Controller
{
    /**
     * Tracking IDs
     * @var array
     */
    protected $survey_pre_id = array();

    public function __construct(Request $request)
    {
        $results = DB::table('survey_prestart')
            ->where('project_id', $request->route('projectid'))
            ->get();

        foreach (collect($results)->unique('user_id') as $result) {
            array_push($this->survey_pre_id, $result->user_id);
        }
    }

    /**
     * Show Complete IDs
     *
     * @param $projectid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCompleteResults($projectid)
    {
        $rawdataset = collect(DB::table('resp_counters')
            ->leftJoin('survey_prestart', 'resp_counters.respid', '=', 'survey_prestart.user_id')
            ->where('resp_counters.status', 'Complete')
            ->whereIn('resp_counters.respid', $this->survey_pre_id)
            ->orderBy('resp_counters.enddate', 'ASC')
            ->get())
            ->unique('respid');

        $country = [];
        $vendor = [];

        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }

            if (!in_array($data->vendor, $vendor) && ($data->vendor != "")) {
                $vendor[] = $data->vendor;
            }
        }

        return view('pages.showresults', compact('projectid', 'rawdataset', 'country', 'vendor'));
    }

    /**
     * Show Terminate IDs
     *
     * @param $projectid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTerminateResults($projectid)
    {
        $rawdataset = collect(DB::table('resp_counters')
            ->leftJoin('survey_prestart', 'resp_counters.respid', '=', 'survey_prestart.user_id')
            ->where('resp_counters.status', 'Incomplete')
            ->whereIn('resp_counters.respid', $this->survey_pre_id)
            ->orderBy('resp_counters.enddate', 'ASC')
            ->get())
            ->unique('respid');

        $country = [];
        $vendor = [];

        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }

            if (!in_array($data->vendor, $vendor) && ($data->vendor != "")) {
                $vendor[] = $data->vendor;
            }
        }

        return view('pages.showresults', compact('projectid', 'rawdataset', 'country', 'vendor'));
    }

    /**
     * Show Quotafull IDs
     *
     * @param $projectid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showQuotafullResults($projectid)
    {
        $rawdataset = collect(DB::table('resp_counters')
            ->leftJoin('survey_prestart', 'resp_counters.respid', '=', 'survey_prestart.user_id')
            ->where('resp_counters.status', 'Quotafull')
            ->whereIn('resp_counters.respid', $this->survey_pre_id)
            ->orderBy('resp_counters.enddate', 'ASC')
            ->get())
            ->unique('respid');

        $country = [];
        $vendor = [];

        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }

            if (!in_array($data->vendor, $vendor) && ($data->vendor != "")) {
                $vendor[] = $data->vendor;
            }
        }

        return view('pages.showresults', compact('projectid', 'rawdataset', 'country', 'vendor'));
    }
}
