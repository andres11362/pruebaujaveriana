<?php

namespace pruebaujaveriana\Jobs;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use pruebaujaveriana\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

use pruebaujaveriana\User;
use Illuminate\Contracts\Mail\Mailer;

class EnviarCorreo extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
       $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {

    }
}
