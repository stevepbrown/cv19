<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentSkill extends Model
{
    protected $table='vwSkillParents';

    
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
     * Get the skills associated with the parent skill
     */
    public function childSkills()
    {
        return $this->hasMany('App\ChildSkill');
    }


}
