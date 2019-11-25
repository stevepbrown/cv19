<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modules';
    
    
    
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


    public function qualification() {

        return $this->belongsTo('App\Qualification');
    }
}

