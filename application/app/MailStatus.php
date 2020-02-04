<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailStatus extends Model
{
protected $table = 'vwEmailStatus';

     /**
     *
     * The 'table' is actually a read-only view,
     * prevent any attempt to mass-assign
     * 
     * @var array
     */
    protected $guarded = [
        
                        'organisation_id',
                        'organisation_name',
                        'person_id',
                        'person_name',
                        'person_email',
                        'template_id','template_name',
                        'batch_id',
                        'invoked',
                        'invoked_when',
                        'failed',
                        'bounced'

                        ];

}
