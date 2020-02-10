<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;


class Organisation extends Model
{

    
    /*
    
    Applying Global Scopes - To assign a global scope to a model, you should override a given model's boot method and use the addGlobalScope method
    
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


    public function people() {

        return $this->hasMany('App\Person');

    }

    

    
}
