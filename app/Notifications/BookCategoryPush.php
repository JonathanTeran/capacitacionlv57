<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BookCategoryPush extends Notification
{
    use Queueable;
    private  $category;
    private $url;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($category,$url)
    {
        $this->category=$category;
        $this->url=$url;
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
                    ->greeting('HOLA')
                    ->line('Se subió a la plataforma un nuevo libro en la categoria '.$this->category)
                    ->action('CLICK AQUI', $this->url)
                    ->line('Gracias por la Atención!');
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
