<?php

namespace Dashboard;

use Illuminate\Database\Eloquent\Model;

class ProjectsList extends Model
{
    protected $table = "projects_list";
    protected $fillable = [
        "Project ID",
        "Country",
        "About",
        "C_Link",
        "T_Link",
        "Q_Link",
        "Completes",
        "Terminates",
        "Quotafull"
    ];
}
