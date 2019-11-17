<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
     
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employers';
    
    
    
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

    public function Roles(){

        return $this->hasManyThrough('App\Role', 'App\EmployerRoleResponsibility');
    
    }

    public function Responsibilties() {

        return $this->hasManyThrough('App\Responsibility','App\EmployerRoleResponsibility');
    }

}
