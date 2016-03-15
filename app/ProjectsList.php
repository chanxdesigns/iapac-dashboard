<?php

namespace Dashboard;

use Illuminate\Database\Eloquent\Model;

class ProjectsList extends Model
{
    protected $table = "projects_list";
    protected $fillable = [
        'Project ID',
        'Country',
        'About',
        'Vendor',
        'C_Link',
        'T_Link',
        'Q_Link',
        'Survey Link',
        'Completes',
        'Terminates',
        'Quotafull'
    ];
}
