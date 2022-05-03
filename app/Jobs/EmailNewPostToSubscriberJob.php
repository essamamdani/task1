<?php

namespace App\Jobs;

use App\Mail\EmailNewPostToSubscriber;
use App\Models\UserSubscribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailNewPostToSubscriberJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post)
    {
        $this->post = $post;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        Mail::to($this->post->email)->send(new EmailNewPostToSubscriber($this->post));
    }
}
