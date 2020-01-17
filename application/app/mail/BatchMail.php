<?php

namespace App\mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\EmailTemplate;

class BatchMail extends Mailable
{
    use Queueable, SerializesModels;


    protected $template;
    protected $template_view_name; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pendingMail)
    {
      
      dd($pendingMail);
      $recipientName = ($recipient->given_name.' '.$recipient->family_name);
      $recipientAddress = $recipient->email;  

      $this->template = EmailTemplate::findOrFail($template_id)->toArray();
      $this->subject = $this->template['subject'];
      $this->template_view_name = 'mail.'.Str::title($this->template['name']);  
     
      // Call the 'to' setter
      $this->to($address = $recipientAddress,$name=$recipientName);
     

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
               
        return $this->view($this->template_view_name);
    }
}
