<?php

namespace App\mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class BatchMail extends Mailable
{
    use Queueable, SerializesModels;


  protected $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailBatch)
    {
     
      // FIXME(SPB): 
      dd($emailLogs->people->all());
      // $this->template = $$emailBatch->template;
              
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
  
      return $this->view;
    }
}
