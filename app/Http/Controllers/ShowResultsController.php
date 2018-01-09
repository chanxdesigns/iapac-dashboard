<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Http\Request;
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
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Complete')->orderBy('created_at', 'desc')->paginate(100);

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
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Incomplete')->orderBy('created_at', 'desc')->paginate(100);

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
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Quotafull')->orderBy('created_at', 'desc')->paginate(100);

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
