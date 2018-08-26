<?php

namespace App\Listeners;

use App\Events\SendEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Customer;


class EmailListener
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
     * @param  SendEmail  $event
     * @return void
     */
    public function handle(SendEmail $event)
    {
      $user = Customer::find($event->userId)->toArray();
        Mail::send('emails.email', ['customer' => $user] , function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Reset code');
        });
    }
}
