<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Http\Requests\ContactFormRequest;

class NewEnquiry extends Notification
{
    use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    protected $message;

    public function __construct(contactFormRequest $message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->message->subject)
            ->from($this->message->email, $this->message->name)
            ->greeting("Hi," . config('admin.name'))
            ->line("New message from " . $this->message->name . ":")
            ->line($this->message->message)
            ->salutation(" ");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
