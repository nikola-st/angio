<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SetPassword extends Notification
{
    public $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Postavite svoj password')
            ->view('emails.set_password', [
                'token' => $this->token,
                'email' => $notifiable->email,
                'notifiable' => $notifiable,
            ]);
    }
}
