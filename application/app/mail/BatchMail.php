<?php

namespace App\mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use  Illuminate\Support\Str;



class BatchMail extends Mailable
{
    use Queueable, SerializesModels;

      public $emailLog;
      protected $viewName;
      
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailLog)
    {
     

      $this->emailLog = $emailLog;
      $this->subject = $this->emailLog->template->subject;
      $this->viewName = 'mail.'.str::title($this->emailLog->template->name);
          
     
 
        }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->view($this->viewName);
    }


}
