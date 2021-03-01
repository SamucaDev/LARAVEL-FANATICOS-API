<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailMarketingCart extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $data;

    /**
     * Create a new message instance.   
     *
     * @param  \App\Order $order
     * @return void
     */
    public function __construct($name){
        $this->data = (object)array(
            'name' => $name
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('EmailMarketing')->with([
            'data' => $this->data
        ]);
    }
}