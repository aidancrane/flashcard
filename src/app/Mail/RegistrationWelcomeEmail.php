<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Asahasrabuddhe\LaravelMJML\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RegistrationWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $newUser)
    {
        $this->user = $newUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->mjml('emails.registration_welcome')
        ->subject("👑 Welcome to ✨Flashcard Club!✨")
        ->with('user', $this->user);
    }
}
