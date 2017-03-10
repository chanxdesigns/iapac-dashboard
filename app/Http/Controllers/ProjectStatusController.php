<?php

namespace Dashboard\Http\Controllers;

use Carbon\Carbon;
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

    public function showMobileTerm () {
        $status = "Mobile Terminate";
        $rawDatas = RespCounter::distinct()->select('*')->where('status','=','Mobile_Term')->groupBy('projectid')->get();
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
            $query = RespCounter::distinct()->select('*')->where('projectid', '=', $data->projectid)->where('status','=','Mobile_Term')->count();
            $dataCounts[] = $query;
        }
        return view('pages.projectstatus', compact('arrDatas','status', 'dataCounts'));
    }

    public function showSecurityTerm () {
        $status = "Security Terminate";
        $rawDatas = RespCounter::distinct()->select('*')->where('status','=','Security_Term')->groupBy('projectid')->get();
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
            $query = RespCounter::distinct()->select('*')->where('projectid', '=', $data->projectid)->where('status','=','Security_Term')->count();
            $dataCounts[] = $query;
        }
        return view('pages.projectstatus', compact('arrDatas','status', 'dataCounts'));
    }

    public function showDropOffs () {
        $status = "Drop Off";
        $rawDatas = RespCounter::distinct()->select('*')->where('status','=','Drop_Off')->groupBy('projectid')->get();
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
            $query = RespCounter::distinct()->select('*')->where('projectid', '=', $data->projectid)->where('status','=','Drop_Off')->count();
            $dataCounts[] = $query;
        }
        return view('pages.projectstatus', compact('arrDatas','status', 'dataCounts'));
    }
}
