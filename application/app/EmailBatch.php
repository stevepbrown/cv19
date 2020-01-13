<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Organisation as Organisation;
use Illuminate\Support\Arr;


class EmailBatch extends Model
{
     
    protected $batch_id;
    protected $organisation_id;
    protected $recipients;
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

     
    
 
    public function __construct(Organisation $organisation, $template_id,$batch_id){

        $this->template_id = $template_id;
        $this->batch_id = $batch_id;
        $this->organisation_id = $organisation->pluck('id');
        $this->recipients = $this->getRecipients();
       
               
    }

   
    /**
     * function getRecipients()
     *
     * @return string
     */
    private function getRecipients(){

        $people =  $organisation->people->pluck('email');         
        $people = $people->implode(';');
        return $people; 
    }



   } 






 

 

