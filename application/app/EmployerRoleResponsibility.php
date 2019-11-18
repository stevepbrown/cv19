<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmployerRoleResponsibility extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employer_role_responsibilities';
    
    
    
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

    public function employers(){

        return $this->belongsTo('App\Employer','employer_id');
    }

    public function roles() {

        return $this->belongsTo('App\Role','role_id');

    }

    public function responsibilities() {

        return $this->belongsTo('App\Responsibility', 'responsibility_id');
    }

   
    
}

