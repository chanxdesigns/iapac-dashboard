<?php

namespace Dashboard\Http\Controllers;

use Dashboard\RespCounter;
use League\Csv\Writer;

class DownloadController extends Controller
{
    public function createCsv ($status, $prjid) {
        $n = RespCounter::where('status', $status)->where('projectid', $prjid)->get();
        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['projectid', 'respid', 'status', 'country', 'IP', 'starttime', 'enddate']);
        $csv->insertAll($n);
        return $csv->output('test.csv');
    }
}
