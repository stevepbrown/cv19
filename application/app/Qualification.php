<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
      /**
     * Property: The table associated with the model.
     *
     * @var string
     * 
     */
    protected $table = 'qualifications';
    
    
    
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
  * function modules: Fetches related modules
  *
  * @return 
  */
    public function modules() {

            return $this->hasMany('App\Module');

    }

    
    /**
     * function: Fetches the institution associated with the qualification
     *
     * @return
     */
    public function institution() {

        return $this->belongsTo('App\Institution');
    }
}

