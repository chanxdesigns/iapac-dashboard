<?php

namespace Dashboard\Http\Controllers;

use Dashboard\RespCounter;
use Illuminate\Http\Request;

use Dashboard\Http\Requests;
use Dashboard\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShowResultsController extends Controller
{

    /**
     * @param $rawdataset array
     * @return string
     *
     * Convert country code to country name
     */
    protected function codeToName($code)
    {
        //Empty country name container
        $country = "";

            //For every country code loop through and change country code to country name
            switch ($code) {
                case 1 :
                    $country = "Singapore";
                    break;
                case 2 :
                    $country = "South Korea";
                    break;
                case 3 :
                    $country = "India";
                    break;
                case 4 :
                    $country = "China";
                    break;
                case 5 :
                    $country = "Philippines";
                    break;
                case 6 :
                    $country = "Vietnam";
                    break;
                case 7 :
                    $country = "Malaysia";
                    break;
                case 8 :
                    $country = "Japan";
                    break;
                case 9 :
                    $country = "Thailand";
                    break;
                case 10 :
                    $country = "Indonesia";
                    break;
                case 11 :
                    $country = "UAE";
                    break;
            }
        return $country;
    }

    protected function objectToArray ($dataset) {
        $arrDatas = [];
        foreach($dataset as $data) {
            $arrDatas[] = array(
                'respid' => $data->respid,
                'projectid' => $data->projectid,
                'about' => $data->about,
                'Languageid' => $this->codeToName($data->Languageid),
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
        return view('pages.showresults', compact('projectid', 'arrDatas', 'country'));
    }
}
