<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TemplateMailer;
use App\EmailLog;

class LogSentMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MessageSent  $event
     * @return void
     */
    public function handle(MessageSent $event)
    {
         // Find the log entry for the mail being sent
         $EmailLog= EmailLog::findOrFail($event->data['email_log_id']);

         // flag as dispatched
         $EmailLog->sent = true;
         $EmailLog->save();
 
         return;
 
    }
}
