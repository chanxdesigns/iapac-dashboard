<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowResultsController extends Controller
{
    private $country;

    private function switchCountry($name) {
        //$ccode = "";
        switch ($name) {
            case "ZH":
                $this->country = "China";
                break;
            case "JP":
                $this->country = "Japan";
                break;
            case "ROK":
                $this->country = "South Korea";
                break;
            case "PH":
                $this->country = "Philippines";
                break;
            case "ID":
                $this->country = "Indonesia";
                break;
            case "MY":
                $this->country = "Malaysia";
                break;
            case "VN":
                $this->country = "Vietnam";
                break;
            case "IN":
                $this->country = "India";
                break;
            case "TH":
                $this->country = "Thailand";
                break;
            case "HK":
                $this->country = "Hong Kong";
                break;
            case "SG":
                $this->country = "Singapore";
                break;
            case "UAE":
                $this->country = "UAE";
                break;
            case "KSA":
                $this->country = "Saudi Arabia";
                break;
            case "JO":
                $this->country = "Jordan";
                break;
            case "SA":
                $this->country = "South Africa";
                break;
            case "AUS":
                $this->country = "Australia";
                break;
            case "TW":
                $this->country = "Taiwan";
                break;
        }

        return $this->country;
    }

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

        $rawCountries = DB::table('survey_prestart')
            ->where('project_id', $projectid)
            ->get();

        foreach ($rawCountries as $rawCountry) {
            if (!in_array($this->switchCountry($rawCountry->country), $country)) {
                array_push($country, $this->switchCountry($rawCountry->country));
            }
        }

        foreach ($rawdataset as $data) {
//            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
//                $country[] = $data->Languageid;
//            }

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

        $rawCountries = DB::table('survey_prestart')
            ->where('project_id', $projectid)
            ->get();

        foreach ($rawCountries as $rawCountry) {
            if (!in_array($this->switchCountry($rawCountry->country), $country)) {
                array_push($country, $this->switchCountry($rawCountry->country));
            }
        }

        foreach ($rawdataset as $data) {
//            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
//                $country[] = $data->Languageid;
//            }

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

        $rawCountries = DB::table('survey_prestart')
            ->where('project_id', $projectid)
            ->get();

        foreach ($rawCountries as $rawCountry) {
            if (!in_array($this->switchCountry($rawCountry->country), $country)) {
                array_push($country, $this->switchCountry($rawCountry->country));
            }
        }

        foreach ($rawdataset as $data) {
//            if (!in_array($data->Languageid, $country) && ($data->Languageid != "")) {
//                $country[] = $data->Languageid;
//            }

            if (!in_array($data->vendor, $vendor) && ($data->vendor != "")) {
                $vendor[] = $data->vendor;
            }
        }

        return view('pages.showresults', compact('projectid', 'rawdataset', 'country', 'vendor'));
    }
}
