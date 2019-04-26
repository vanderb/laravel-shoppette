<?php

namespace Vanderb\LaravelShoppette\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Facades\Vanderb\LaravelShoppette\Contracts\Cart;

class CartUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $cart;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(){
        $this->cart = Cart::get();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    /*public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }*/
}
