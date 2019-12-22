<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $table = 'vwJobs';
    
    public $incrementing = false;

    public $primaryKey = 'job_id';
}
