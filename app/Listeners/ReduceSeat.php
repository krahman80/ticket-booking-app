<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Concert;

class ReduceSeat
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        /* reduce seat */ 
        $cart = session()->get('cart');
        foreach ($cart as $key1 => $value1) {
            Concert::where('id', $key1)
            ->decrement('seat',$value1['qty']);
        }
    }
}
