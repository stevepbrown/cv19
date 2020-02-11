<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class TemplateMailer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
    



       $this->subject = $mail->template->first()->subject;
       $this->view = 'mail.'.$mail->template->name;
       $this->viewData = Arr::add($this->viewData, 'recipient_given_name' ,$mail->person->given_name);
       $this->viewData = Arr::add($this->viewData, 'template_id' ,$mail->template_id);
       $this->viewData = Arr::add($this->viewData, 'person_id' ,$mail->person->id); 
       $this->viewData = Arr::add($this->viewData, 'batch_id' ,$mail->batch_id); 
       $this->viewData = Arr::add($this->viewData, 'email_log_id' ,$mail->id); 

       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return view($this->view);
    }
}
