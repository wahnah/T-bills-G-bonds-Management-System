<?php

namespace App\Mail\Purchases;

use App\Models\Lot;
use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LotSold extends Notification
{
    use Queueable, SerializesModels;

    public Lot $lot;
    public User $buyer;
    public int $price;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Lot $lot, User $buyer, int $price)
    {
        $this->lot = $lot;
        $this->buyer = $buyer;
        $this->price = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    //public function build()
    //{
      //  return $this->view('emails.purchases.lot-sold');
   // }

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
            ->subject('Security Sold')
            ->greeting('Hello Admin')
            ->line('The security ' . $this->lot->name . ' was bought by ' . $this->buyer->name)
            ->line('for the price of: ZMK ' . $this->price)
            //->action('View Deposit Slip', url('/storage/' . $this->deposit->deposit_slip))
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
