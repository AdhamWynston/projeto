<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserCreated extends Notification
{
    /**
     * @var
     */
    private $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $appName = config('app.name');
        return (new MailMessage)
            ->subject("Você foi cadastrado no $appName")
            ->greeting("Olá usuário {$notifiable->name}, seja bem-vindo ao $appName")
            ->action('Clique aqui para definir sua senha','http://localhost:8080/#/password/' . $this->token)
            ->line('Obrigado por usar nossa aplicação')
            ->salutation('Atenciosamente');

    }

}
