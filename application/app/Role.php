<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    
    
    
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
     * 
     * Relationship to employers
     */
    public function employers(){

        return $this->belongsToMany('App\Employers','employer_roles');
    }

    /**
     * 
     * Relationship to responsibilities
     */
    public function responsibilities(){

        return $this->belongsToMany('App\Responsibility','role_responsibilities');

    }

}

