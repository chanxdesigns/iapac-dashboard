<?php

use Illuminate\Database\Seeder;

class RespCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Dashboard\RespCounter::create(
            ["respid" => "ADGHJK", "projectid" => "CHANX50", "about" => "Something I defined", "Languageid" => 3, "status" => "Complete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
        \Dashboard\RespCounter::create(["respid" => "ADGTYO", "projectid" => "CHANX50", "about" => "Leave my shit with me", "Languageid" => 3, "status" => "Complete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
        \Dashboard\RespCounter::create(["respid" => "ADGDJK", "projectid" => "CHANX50", "about" => "Have it in my way", "Languageid" => 3, "status" => "Complete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
        \Dashboard\RespCounter::create(["respid" => "HNJAK12", "projectid" => "CHANX51", "about" => "Have it in my way", "Languageid" => 3, "status" => "Incomplete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
        \Dashboard\RespCounter::create(["respid" => "HNJAK15", "projectid" => "CHANX52", "about" => "Have it in my way", "Languageid" => 3, "status" => "Incomplete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
        \Dashboard\RespCounter::create(["respid" => "HNJAK16", "projectid" => "CHANX51", "about" => "Have it in my way", "Languageid" => 3, "status" => "Incomplete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
        \Dashboard\RespCounter::create(["respid" => "HNJAK17", "projectid" => "CHANX52", "about" => "Have it in my way", "Languageid" => 3, "status" => "Complete", "IP" => "124.12.33.15", "enddate" => \Carbon\Carbon::now()]);
    }
}
