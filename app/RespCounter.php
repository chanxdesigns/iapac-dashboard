<?php

namespace Dashboard;

use Illuminate\Database\Eloquent\Model;

class RespCounter extends Model
{
    protected $fillable = [
        "respid",
        "projectid",
        "about",
        "Languageid",
        "status",
        "IP",
        "starttime",
        "enddate"
    ];
}
