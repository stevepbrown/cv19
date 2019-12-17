<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Institution extends Model
{
    /**
     * Property:The table associated with the model.
     *
     * @var string
     */
    protected $table = 'institutions';
    
    
    
    /**
     * Property: The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Property: Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

/**
 * function: qualifications
 *
 * @return 
 */
    public function qualifications(){

      return $this->hasMany('App\Qualification');
    }
}

