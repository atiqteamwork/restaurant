<?php

namespace App\Mail;

use App\Order;
use App\OrderDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSaved extends Mailable
{
    use Queueable, SerializesModels;

	public $order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        //
		 $this->order = $order;
		 
		//dd( $order );
		 //($o->deal_id != 0) ? $order->Deals[0]->deal_title : $c->Dishes[0]->dish_title
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		
		return $this->view('mail.user');
    }
}
