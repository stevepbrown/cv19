<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Scopes\ActiveScope;

class Person extends Model
{
    
    protected $appends = array('name');
    
      /*
    
    Applying Global Scopes - To assign a global scope to a model, you should override
    a given model's boot method and use the addGlobalScope method
    
    */

     /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }

    
    public function organisation(){

       return  $this->hasOne('App\Organisation');

    } 

    /**
     *  function getNameAttribute
     *
     * Mutator:Concatenates given & family names
     * 
     * @return string
     */
    public function getnameAttribute(){

        return "$this->given_name $this->family_name";

    }
}
