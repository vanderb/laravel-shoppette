<?php

namespace Vanderb\LaravelShoppette\Listeners;

use Vanderb\LaravelShoppette\Events\CartUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Vanderb\LaravelShoppette\Contracts\ShippingContract;

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
        if($shipping_option = $this->shipping->getShippingOptionByWeight($event->cart_session->total_weight)){
            $event->cart_session->shipping_option_id = $shipping_option->id;
            $event->cart_session->save();
        }
    }
}
