<?php

namespace Vanderb\LaravelShoppette\Listeners;

use Vanderb\LaravelShoppette\Events\CartUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Vanderb\LaravelShoppette\Contracts\ShippingContract;
use Facades\Vanderb\LaravelShoppette\Contracts\CartSession;

class UpdateCart {
    
    public $shipping;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ShippingContract $shipping){
        $this->shipping = $shipping;
    }

    /**
     * Handle the event.
     *
     * @param  CartUpdated  $event
     * @return void
     */
    public function handle(CartUpdated $event){
        //Load most recent cart into session
        CartSession::create();
        if($shipping_option = $this->shipping->getShippingOptionByWeight($event->cart->total_weight)){
            $event->cart->shipping_option_id = $shipping_option->id;
            $event->cart->save();
        }
        else{
            $event->cart->shipping_option_id = null;
            $event->cart->save();
        }
        //Update cart
        CartSession::create();
    }
}
