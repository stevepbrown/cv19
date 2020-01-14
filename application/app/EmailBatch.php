<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;



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

   


   } 






 

 

