<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'institutions';
    
    
    
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
}
}
