<?php

namespace Dashboard\Http\Controllers;

use Dashboard\RespCounter;
use League\Csv\Writer;
use Carbon\Carbon;

class DownloadController extends Controller
{
    public function createCsv ($status, $prjid) {
        $results = RespCounter::where('status', $status)->where('projectid', $prjid)->get();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['Project ID', 'Respondent ID', 'Status', 'Country', 'IP', 'Start Time', 'End Time', 'LOI (Seconds)']);
        foreach ($results as $result) {
            $starttime = $result->starttime ? Carbon::createFromFormat('Y-m-d H:i:s',$result->starttime)->toDayDateTimeString() : null;
            $endtime = $result->enddate ? Carbon::createFromFormat('Y-m-d H:i:s',$result->enddate)->toDayDateTimeString() : null;
            $loi = $result->starttime ? Carbon::createFromFormat('Y-m-d H:i:s',$result->enddate)->diffInSeconds(Carbon::createFromFormat('Y-m-d H:i:s',$result->starttime)) : null;
            $csv->insertOne([$result->projectid, $result->respid, $result->status, $result->Languageid, $result->IP, $starttime, $endtime, $loi]);
        }
        $dateTime = Carbon::now('Asia/Kolkata')->toDateString().'_'.preg_replace('/:/','',Carbon::now('Asia/Kolkata')->toTimeString());
        return $csv->output($status.'_'.$prjid.'_'.$dateTime.'.csv');
        die;
    }
}
