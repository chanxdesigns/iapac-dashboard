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
        $arrDatas = $this->objectToArray($rawdataset);
        $country = [];
        for ($i = 0; $i < count($arrDatas); $i++) {
            $country[] = $arrDatas[$i]["Languageid"];
        }
        $country = array_unique($country);
        return view('pages.showresults', compact('projectid', 'arrDatas', 'country'));
    }

    public function showTerminateResults($projectid)
    {
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Incomplete')->get();
        $arrDatas = $this->objectToArray($rawdataset);
        $country = [];
        for ($i = 0; $i < count($arrDatas); $i++) {
            $country[] = $arrDatas[$i]["Languageid"];
        }
        $country = array_unique($country);
        return view('pages.showresults', compact('projectid', 'arrDatas', 'country'));
    }

    public function showQuotafullResults($projectid)
    {
        $rawdataset = DB::table('resp_counters')->select('*')->where('projectid', '=', $projectid)->where('status', '=', 'Quotafull')->get();
        $arrDatas = $this->objectToArray($rawdataset);
        $country = [];
        for ($i = 0; $i < count($arrDatas); $i++) {
            $country[] = $arrDatas[$i]["Languageid"];
        }
        $country = array_unique($country);
        var_dump(count($arrDatas));
        return view('pages.showresults', compact('projectid', 'arrDatas', 'country'));
    }
}
