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

  
  
  
  
    // this relationship will only return one level of child items
  
  /**
   * Function immediatechild()
   *
   *  
   * @return 
   */
    public function immediateChild()
  {
      return $this->hasMany(Skill::class, 'parent_skill_id');
  }

  // This is method where we implement recursive relationship
  public function allChildren()
  {
      return $this->hasMany(Skill::class, 'parent_skill_id')->with('immediateChild');
  }
}
    
    
    

