<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailAllPostsToNewSubscriber extends Mailable
{
    use Queueable, SerializesModels;
    private $posts = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($posts)
    {
        //
        $this->posts = $posts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.all_post',['posts'=>$this->posts])->subject(__('All Old posts'));
    }
}
