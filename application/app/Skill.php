<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
  
    private $children;
  
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skills';

    
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

    
    
    public function children(){

      return $this->hasMany('app\Skill','parent_skill_id','id');

    }

}