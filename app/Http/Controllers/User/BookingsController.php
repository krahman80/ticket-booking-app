<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Ticket;
use Auth;
use DB;

class BookingsController extends Controller
{
    public function placeOrder(Request $request){
        // dd($request->input('_token'));
        if ($request->input('_token')!= null) {

            $cart = session()->get('cart');
            $userId = Auth::user()->id;
            $time = now()->format('Y-m-d H:i:s');


            DB::transaction(function () use ($userId,$time,$cart) {
                // Possibly failing DB query
                
                $booking = new Booking([
                    'slug' => uniqid('bk'),
                    'user_id' => $userId,
                    'booking_time' => $time,
                    // 'status' => 'not_paid',
                ]);
                $booking->save();

                // Caching query that we don't want to run if the above query fails
                // get session insert detail item into db

                $ticket_data = [];

                foreach ($cart as $key => $value) {
                    $ticket_data[] = [
                        'ticket_id' => $key,
                        'booking_id' => $booking->id,
                        'slug' => uniqid('bkt'),
                        'artist_name' => $value['artist-name'],
                        'concert_name' => $value['concert-name'],
                        'price' => $value['price'],
                        'qty' => $value['qty'],
                        'total_price' => $value['qty']*$value['price']
                    ];
                }

                $booking->tickets()->attach($ticket_data);

            });

            /* unset session */
            session()->forget('cart');
        }
        // got to booking page index
        return redirect()->route('user.booking.index');
         
    }

    public function index() {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('user.booking.index',['bookings' => $bookings]);
    }

    public function show($id) {
        $booking = Booking::findOrFail($id);
        // dd($booking->tickets);
        // foreach ($booking->tickets as $ticket) {
        //     echo $ticket->pivot->slug;
        // }
        return view('user.booking.show',['booking'=>$booking]);
    }
}
