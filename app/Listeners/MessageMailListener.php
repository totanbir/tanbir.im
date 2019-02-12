<?php

namespace App\Listeners;
use Mail;
use App\Events\MessageSentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageMailListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(MessageSentEvent $event)
    {
        $message=$event->message;
        Mail::send('email.message', ['msg'=>$message], function ($m) use ($message){
           $m->to($message->email, $message->name)->subject('Contact Message | tanbir.im');
       });
    }
}
