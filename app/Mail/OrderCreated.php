<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = PDF::loadView('orders_pdf', ['order' => $this->order]);

        return $this->view('orders_pdf')
                    ->with('order', $this->order)
                    ->attachData($pdf->output(), 'order.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->subject('Pedido Generado');
    }
}
