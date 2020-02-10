<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TemplateMailer;
use App\EmailLog;

class LogSendingMessage
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
     * @param  MessageSending  $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        
        // Find the log entry for the mail being sent
        $EmailLog= EmailLog::findOrFail($event->data['email_log_id']);

        // flag as dispatched
        $EmailLog->dispatched = true;
        $EmailLog->save();

        return;

    }
}
