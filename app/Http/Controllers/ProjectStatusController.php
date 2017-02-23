<?php

namespace Dashboard\Http\Controllers;

use Dashboard\RespCounter;

class ProjectStatusController extends Controller
{
    public function showCompletes () {
        $status = "Complete";
        $rawDatas = RespCounter::distinct()->select('*')->where('status','=','Complete')->groupBy('projectid')->get();
        $arrDatas = [];
        foreach($rawDatas as $data) {
            $arrDatas[] = array(
                'respid' => $data->respid,
                'projectid' => $data->projectid,
                'about' => $data->about,
                'Languageid' => $data->Languageid,
                'status' => $data->status,
                'IP' => $data->IP,
                "starttime" => $data->starttime,
                'enddate' => $data->enddate
            );
        }
        $dataCounts = [];
        foreach ($rawDatas as $data) {
            $query = RespCounter::distinct()->select('*')->where('projectid', '=', $data->projectid)->where('status','=','Complete')->count();
            $dataCounts[] = $query;
        }

        return view('pages.projectstatus', compact('arrDatas','status', 'dataCounts'));
    }

    public function showTerminates () {
        $status = "Incomplete";
        $rawDatas = RespCounter::distinct()->select('*')->where('status','=','Incomplete')->groupBy('projectid')->get();
        $arrDatas = [];
        foreach($rawDatas as $data) {
            $arrDatas[] = array(
                'respid' => $data->respid,
                'projectid' => $data->projectid,
                'about' => $data->about,
                'Languageid' => $data->Languageid,
                'status' => $data->status,
                'IP' => $data->IP,
                "starttime" => $data->starttime,
                'enddate' => $data->enddate
            );
        }
        var_dump($arrDatas[0]['starttime']);
        $dataCounts = [];
        foreach ($rawDatas as $data) {
            $query = RespCounter::distinct()->select('*')->where('projectid', '=', $data->projectid)->where('status','=','Incomplete')->count();
            $dataCounts[] = $query;
        }
        return view('pages.projectstatus', compact('arrDatas','status', 'dataCounts'));
    }

    public function showQuotafull () {
        $status = "Quotafull";
        $rawDatas = RespCounter::distinct()->select('*')->where('status','=','Quotafull')->groupBy('projectid')->get();
        $arrDatas = [];
        foreach($rawDatas as $data) {
            $arrDatas[] = array(
                'respid' => $data->respid,
                'projectid' => $data->projectid,
                'about' => $data->about,
                'Languageid' => $data->Languageid,
                'status' => $data->status,
                'IP' => $data->IP,
                "starttime" => $data->starttime,
                'enddate' => $data->enddate
            );
        }
        $dataCounts = [];
        foreach ($rawDatas as $data) {
            $query = RespCounter::distinct()->select('*')->where('projectid', '=', $data->projectid)->where('status','=','Quotafull')->count();
            $dataCounts[] = $query;
        }
        return view('pages.projectstatus', compact('arrDatas','status', 'dataCounts'));
    }
}
