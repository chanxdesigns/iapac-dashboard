<?php

namespace Dashboard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartingController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id');
        return view('pages.chart')->with(['projectId' => $id, 'country' => $request->query('country')]);
    }

    private function switchCountry($name) {
        $ccode = "";
        switch ($name) {
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

        return $ccode;
    }

    public function getChartData(Request $request)
    {
        $id = $request->input('id');
        $countryCode = $this->switchCountry($request->input('country'));

        $responses = DB::table('survey_prestart')->where('project_id', $id)
            ->where('country', $countryCode)
            ->get();

        $arr = array();
        foreach ($responses as $response) {
            if (!is_null($response->vendor)) {
                if (!in_array(strtoupper($response->vendor), $arr)) {
                    array_push($arr, strtoupper($response->vendor));
                }
            }
        }

        //var_dump($arr);

        $newArr = array();
        for ($i = 0; $i < count($arr); $i++) {
            array_push($newArr, array(
                "vendor" => $arr[$i],
                "complete" => DB::table('resp_counters')->where('projectid', $id)
                    ->where('vendor', $arr[$i])
                    ->where('status', 'Complete')
                    ->where('Languageid', $request->input('country'))
                    ->count(),
                "terminate" => DB::table('resp_counters')->where('projectid', $id)
                    ->where('vendor', $arr[$i])
                    ->where('status', 'Incomplete')
                    ->where('Languageid', $request->input('country'))
                    ->count(),
                "quotaful" => DB::table('resp_counters')->where('projectid', $id)
                    ->where('vendor', $arr[$i])
                    ->where('status', 'Quotafull')
                    ->where('Languageid', $request->input('country'))
                    ->count(),
                "total" => DB::table('survey_prestart')->where('project_id', $id)
                    ->where('vendor', $arr[$i])
                    ->where('country', $countryCode)
                    ->count(),
            ));
        }

        return response()->json($newArr);
    }
}
