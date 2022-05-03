<?php

namespace App\Listeners;

use App\Events\CreatedSubscriberUser;
use App\Mail\EmailAllPostsToNewSubscriber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class NotifyAllPosts
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
     * @param  \App\Events\Registered  $event
     * @return void
     */
    public function handle(CreatedSubscriberUser $event)
    {
        //
        dispatch(new EmailAllPostsToNewSubscriber($event->user->subscribed->websites->posts));

    }
}
