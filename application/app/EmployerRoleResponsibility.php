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


    public function Employer() {

        $this->belongsTo('app\Employer','employer_id');
    }


    public function Roles() {

        return $this->hasOne('app\Role');

    }
    public function Responsibilities() {

        return $this->hasOne('app\Responsibility');

    }

    
}

