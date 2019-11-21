<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employer;
use App\Role;
use App\Responsibility;




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

        return $this->hasMany('App\Employer','id');
    }

    public function roles() {

        return $this->hasMany('App\Role','id');

    }

    public function responsibilities() {

        return $this->hasMany('App\Responsibility','id');
    }

   
    
}

