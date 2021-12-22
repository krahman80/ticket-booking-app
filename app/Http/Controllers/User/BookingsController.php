<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Ticket;
use App\Concert;
use Auth;
use DB;
use Illuminate\Support\Facades\Gate;

use App\Jobs\SendAdminBookingEmail;

class BookingsController extends Controller
{
    public function placeOrder(Request $request){
        // dd($request->input('_token'));
        if ($request->input('_token')!= null) {

            $cart = session()->get('cart');
            $userId = auth()->user()->id;
            $time = now()->format('Y-m-d H:i:s');


            DB::transaction(function () use ($userId,$time,$cart) {
                
                /* insert booking table */
                $booking = new Booking([
                    'slug' => uniqid('bk'),
                    'user_id' => $userId,
                    'booking_time' => $time,
                    // 'status' => 'not_paid',
                ]);
                $booking->save();

                /* insert booking ticket */
                $ticket_data = [];

                foreach ($cart as $key => $value) {
                    $ticket_data[] = [
                        'ticket_id' => $value['ticket-id'], 
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

                /* reduce seat */ 
                foreach ($cart as $key1 => $value1) {
                    DB::table('concerts')
                    ->where('id', $key1)
                    ->decrement('seat',$value1['qty']);
                }

            });
            
            /* destroy cart */
            session()->forget('cart');
        }

        /* add event */

        /* add email jobs*/
        SendAdminBookingEmail::dispatch(auth()->user()->email);

        // got to booking page index
        return redirect()->route('user.booking.index');
         
    }

    public function index() {
        if (Gate::denies('user-only', auth()->user())) {
            abort(403);
        }
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('user.booking.index',['bookings' => $bookings]);
    }

    public function show($id) {
        if (Gate::denies('user-only', auth()->user())) {
            abort(403);
        }
        $booking = Booking::findOrFail($id);
        // dd($booking->tickets);
        // foreach ($booking->tickets as $ticket) {
        //     echo $ticket->pivot->slug;
        // }
        return view('user.booking.show',['booking'=>$booking]);
    }
}
