<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Ticket;
use App\Concert;
use Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;
use App\Events\BookingCreated;


class BookingsController extends Controller
{
    
    public function placeOrder(Request $request){

        if($request->input('_token') != null) {

            $userId = auth()->user()->id;
            
            $booking = new Booking([
                        'slug' => uniqid('bk'),
                        'user_id' => $userId,
                        'booking_time' => Carbon::now()->format('Y-m-d H:i:s'),
                        'expired_time' => Carbon::now()->addDays(2)->format('Y-m-d H:i:s'),
                        ]);
            $booking->save();

            // call event
            event(new BookingCreated($booking));
        }

        session()->forget('cart');

        return redirect()->route('user.booking.index');
    }    

    public function index() {
        if (Gate::denies('user-only', auth()->user())) {
            abort(403);
        }
        $bookings = Booking::orderBy('created_at', 'desc')->paginate(10);
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
