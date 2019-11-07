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
    protected $table = 'ADD THE TABLE HERE';
    
    
    
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employer_role_responsibilities';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
}

