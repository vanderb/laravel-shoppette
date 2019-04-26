<?php

namespace Vanderb\LaravelShoppette\Listeners;

use Vanderb\LaravelShoppette\Events\VoucherRedeemed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplyVoucher {

    /**
     * Handle the event.
     *
     * @param  CartUpdated  $event
     * @return void
     */
    public function handle(VoucherRedeemed $event){
        session('cart_session');
    }
}
