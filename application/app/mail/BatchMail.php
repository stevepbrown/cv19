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
    public function __construct($emailLog)
    {
     
      $recipient = $emailLog->people->toArray();
      $template = $emailLog->template->toArray();

      $address = $recipient['email'];
      $subject = $template['subject'];
      $view = 'view.mail.'.$template['name'];
      $name = $recipient['name'];
      $data = [];

         
      
      
      // set the 'to'
      $this->to($address,$name);
  

      // set the subject
      $this->subject($subject);


      dd($this);
      // set the view
      $this->view($view,$data); 

     

      
              
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
