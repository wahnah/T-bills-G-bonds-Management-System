<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    use Queueable;

    public $deposit;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param $deposit
     * @param $user
     */
    public function __construct($deposit, $user)
    {
        $this->deposit = $deposit;
        $this->user = $user;
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
            ->subject('New Deposit Received')
            ->greeting('Hello Admin,')
            ->line('A new deposit has been received from ' . $this->user->name . '.')
            ->line('Deposit Amount: ' . $this->deposit->amount)
            //->action('View Deposit Slip', url('/storage/' . $this->deposit->deposit_slip))
            ->action('Approve deposit',url('/admin/deposits/depo/'. $this->deposit->id))
            ->line('Thank you');
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
