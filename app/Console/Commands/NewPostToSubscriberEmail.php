<?php

namespace App\Console\Commands;

use App\Jobs\EmailNewPostToSubscriberJob;
use App\Mail\EmailNewPostToSubscriber;
use App\Models\Post;
use App\Models\User;
use App\Models\UserSubscribe;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NewPostToSubscriberEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_email:to_subscribers {--user_id=} {--post_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send New Post to subscribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::findOrFail($this->option('post_id'))->toArray();



        $post['email'] = User::findOrFail($this->option('user_id'))->email;

        dispatch(new EmailNewPostToSubscriberJob((object) $post));
        return 0;
    }
}
