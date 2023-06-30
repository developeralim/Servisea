<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class orderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $order_ID;
    public $order_date;
    public $order_amount;
    public $payment_ID;
    public $payment_type;


    /**
     * Create a new message instance.
     */
    public function __construct($order_ID,$order_date,$order_amount,$payment_ID,$payment_type)
    {
        $this->order_ID = $order_ID;
        $this->order_date = $order_date;
        $this->order_amount = $order_amount;
        $this->payment_ID = $payment_ID;
        $this->payment_type = $payment_type;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'user.email.order',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
