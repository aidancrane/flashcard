<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Mail\RegistrationWelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendRegistrationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $newUser)
    {
        $this->user = $newUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email_address)->send(new RegistrationWelcomeEmail($this->user));
    }
}
