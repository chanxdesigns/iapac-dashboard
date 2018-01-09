<?php

namespace Dashboard\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IncludeCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'include:city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Include city in IDs';

    private $city = null;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('resp_counters')
            ->where('projectid','IX211195')
            ->where('status','Incomplete')
            ->whereNull('city')
            ->chunk(100, function ($respids) {
                foreach ($respids as $respid) {
                    DB::table('resp_counters')
                        ->where('respid', $respid->respid)
                        ->update([
                           "city" => $this->getCity($respid->IP)
                        ]);

                    echo $respid->respid."<->".$this->city." ";
                    //return false;
                }
            });
    }

    private function getCity($ip) {
        $nip = trim(explode(',', $ip)[0]);
        $this->city = file_get_contents('https://ipapi.co/'.$nip.'/city/');
        return $this->city;
    }
}
