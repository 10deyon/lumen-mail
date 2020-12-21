<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Order
     */
    public $order, $shipped;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function __construct($order, $shipped)
    {
        $this->order = $order;
        $this->shipped = $shipped;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd('../../public/features.pptx');
        // return $this->view('emails.mail')->with(['order' => $this->order, 'shipped' => $this->shipped]);

        return $this->view('emails.mail')
            ->with([
                'orderName' => $this->order,
                'orderPrice' => $this->shipped,
            ])
            ->attach('././public/features.pptx', [
                'as' => 'features.pptx',
                'mime' => 'application/pptx',
            ]);
    }
}
