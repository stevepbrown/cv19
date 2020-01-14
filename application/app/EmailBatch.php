<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Person;



class EmailBatch extends Model
{
     
    protected $batch_id;
    protected $organisation_id;
    protected $template_id;



    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['batch_id',
                           'organisation_id',
                           'template_id'
                            ];

   

    public function people(){

        return $this->hasMany('App\Person');

    }

    public function mailAlreadySent(Person $person) {

        $person_id = $person->id;
        $template_id = $this->template_id;

        $checkPersonCount =  DB::table('email_logs')
            ->where('person_id', $person_id)
            ->where('template_id', $person_id)->exists();


        // DEBUGONLY(SPB): 
        dump($person->given_name.':'.$checkPersonCount);

            // ->where('person_id', $person_id)
            // ->where('template_id', $template_id)->get();


      
        
        if ($checkPersonCount = 0) {

            return false;
        }
        else {

            return true;
        }


    }

   


   } 






 

 

