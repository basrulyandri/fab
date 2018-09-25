<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCheckedOut extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Order Detail at BAF')
                    ->markdown('emails.users.ordercheckedout')
                    ->with([
                        'user' => $this->user,
                        'order' => $this->order
                    ]);
    }
}
