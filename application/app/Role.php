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
     * Get the EmployerRoleResponsibility that owns the role.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}

