<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'responsibilities';
    
    
    
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


    public function employerRoleResponsibilities() {

        return $this->hasMany('App\EmployerRoleResponsibility');
    
       }
    
}

