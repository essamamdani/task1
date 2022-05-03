<?php

namespace App\Listeners;

use App\Events\CreatedPost;
use App\Jobs\EmailNewPostToSubscriberJob;
use App\Mail\EmailNewPostToSubscriber;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyPost
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
     * @param  \App\Events\CreatedPost  $event
     * @return void
     */
    public function handle(CreatedPost $event)
    {
        //

        dispatch(new EmailNewPostToSubscriberJob($event->post));
    }
}
