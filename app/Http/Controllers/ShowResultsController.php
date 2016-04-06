<?php

namespace Dashboard\Http\Controllers;

use Dashboard\RespCounter;
use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShowResultsController extends Controller
{
    protected function objectToArray ($dataset) {
        $arrDatas = [];
        foreach($dataset as $data) {
            $arrDatas[] = array(
                'respid' => $data->respid,
                'projectid' => $data->projectid,
                'about' => $data->about,
                'Languageid' => $data->Languageid,
                'status' => $data->status,
                'IP' => $data->IP,
                'enddate' => $data->enddate
            );
        }
        return $arrDatas;
    }

    public function showCompleteResults($projectid)
    {
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Complete')->get();
        $country = [];
        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }
        }
        return view('pages.showresults', compact('projectid', 'rawdataset', 'country'));
    }

    public function showTerminateResults($projectid)
    {
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Incomplete')->get();
        $country = [];
        foreach ($rawdataset as $data) {
            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
                $country[] = $data->Languageid;
            }
        }
        return view('pages.showresults', compact('projectid', 'rawdataset', 'country'));
    }

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
