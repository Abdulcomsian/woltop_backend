<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Crypt;

class RegisterNotification extends Notification
{
    use Queueable;

    protected $name, $token, $user_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($user_id, $token, $name)
    {
        $this->user_id = $user_id;
        $this->token = $token;
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject("Please verify your email")
                    ->greeting("Hi " . $this->name)
                    ->line('Welcome to Wolpin.')
                    ->line('Please verify your email by clicking the link below')
                    ->action('Verify Email', route('verify.email.user', ['token' => Crypt::encrypt($this->token), 'user' => Crypt::encrypt($this->user_id)]))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
