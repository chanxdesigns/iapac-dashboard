<?php

namespace Dashboard;

use Illuminate\Database\Eloquent\Model;

class RespCounter extends Model
{
    protected $fillable = [
        "respid",
        "projectid",
        "Languageid",
        "status",
        "IP",
        "enddate"
    ];
}
