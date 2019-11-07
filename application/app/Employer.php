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

    
    /**
     * Get the employer roles
     */
    public function roles()
    {
        return $this->hasMany('App\Role');
    }
}
