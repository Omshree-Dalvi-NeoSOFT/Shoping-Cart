<?php

namespace App\Mail;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data=$this->data;
        
        return $this->from('example@example.com', 'Example')
            ->view('email.order')->with([
                'email' => $data['uemail'],
                'fname' => $data['firstname'],
                'lname' => $data['lastname'],
                'address1' => $data['address1'],
                'zip' => $data['zip'],
                'phone' => $data['phone'],
                'grandtotal' => $data['grandtotal'],
                'finalTotal' => $data['finalTotal']
            ]);
    }
}
