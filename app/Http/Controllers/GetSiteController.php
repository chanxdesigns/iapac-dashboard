<?php

namespace Dashboard\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class GetSiteController extends Controller
{
    public function getSiteSource (Request $request) {
        $url = $request->input('url');
        $client = new Client();
        return $client->request('GET',$url)->getBody();
    }
}
