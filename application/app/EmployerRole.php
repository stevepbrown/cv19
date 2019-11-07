<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployerRole extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employer_role';
    
    
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get the Employer to which EmployerRole belongs
     */
    public function employer()
    {
        return $this->belongsTo('App\Employer');
    }
}

}
