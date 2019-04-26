<?php

namespace Vanderb\LaravelShoppette\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VoucherRedeemed {
    
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $voucher_id;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(int $voucher_id){
        $this->voucher_id = $voucher_id;
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
