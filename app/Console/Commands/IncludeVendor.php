<?php

namespace Dashboard\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class IncludeVendor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'include:vendor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Include vendor in IDs';

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
        $ids = DB::table('resp_counters')
            ->where('projectid', 'IX211195')
            ->where('status', 'Complete')
            ->whereNull('vendor')
            ->get();

        foreach ($ids as $id) {
            $vendor = DB::table('survey_prestart')
                ->select('vendor')
                ->where('user_id', $id->respid)
                ->first();

            if (!is_null($vendor)) {
                DB::table('resp_counters')
                    ->where('projectid', 'IX211195')
                    ->where('respid', $id->respid)
                    ->update([
                        "vendor" => $vendor->vendor
                    ]);

                echo $id->respid . " ";
                //return false;
            }
        }
    }
}
