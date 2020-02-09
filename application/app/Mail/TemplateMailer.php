<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;

class TemplateMailer extends Mailable
{
    use Queueable, SerializesModels;

    


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
    
        /*
string 	$subject 	The subject of the message. 	
protected string 	$markdown 	The Markdown template for the message (if applicable). 	
string 	$view 	The view to use for the message. 	
string 	$textView 	The plain text view to use for the message. 	
array 	$viewData 	The view data for the message. 	
array 	$attachments 	The attachments for the message. 	
array 	$rawAttachments 	The raw attachments for the message. 	
array 	$callbacks
       */


       $this->subject = $mail->template->first()->subject;
       $this->view = 'mail.'.$mail->template->name;
       $this->viewData = Arr::add($this->viewData, 'recipient_given_name' ,$mail->person->given_name);




       
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
