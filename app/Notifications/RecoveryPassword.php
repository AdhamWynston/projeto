<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RecoveryPassword extends Notification
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
        return (new MailMessage)
            ->subject("Recuperação de senha")
            ->greeting("Olá usuário {$notifiable->name}, acesse ao link abaixo para redefinir sua senha")
            ->action('Clique aqui para definir sua senha','http://localhost:8080/#/password/' . $this->token)
            ->line('Obrigado por usar nossa aplicação')
            ->salutation('Atenciosamente');

    }

}
