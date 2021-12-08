<?php

namespace Sepehrfci\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Sepehrfci\User\Mail\VerifyCodeMail;
use Sepehrfci\User\Services\VerifyCodeService;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
     * @param mixed $notifiable
     * @return VerifyCodeMail
     * @throws \Exception
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function toMail($notifiable): VerifyCodeMail
    {
        $code = VerifyCodeService::generateCode();

        VerifyCodeService::setCache($notifiable->id,$code);

        return (new VerifyCodeMail($code))
            ->to($notifiable->email);

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
