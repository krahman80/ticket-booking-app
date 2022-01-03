<?php

namespace App\Listeners;

use App\Events\BookingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RecordTicket
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
    public function handle(BookingCreated $event)
    {
        // dd($event->booking->id);
        $cart = session()->get('cart');
        /* insert booking ticket */
        $ticket_data = [];

        foreach ($cart as $key => $value) {
            $ticket_data[] = [
                'ticket_id' => $value['ticket-id'], 
                'booking_id' => $event->booking->id,
                'slug' => uniqid('bkt'),
                'artist_name' => $value['artist-name'],
                'concert_name' => $value['concert-name'],
                'price' => $value['price'],
                'qty' => $value['qty'],
                'total_price' => $value['qty']*$value['price']
            ];
        }
        $event->booking->tickets()->attach($ticket_data);
    }
}
