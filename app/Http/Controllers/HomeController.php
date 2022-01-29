<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concert;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $concert = Concert::OrderBy('date', 'desc')->take(6)->get();
        $booking = Booking::Where('user_id', Auth::User()->id)->OrderBy('created_at','desc')->take(1)->get();            
        return view('user.home',['concerts' => $concert, 'booking' => $booking]);
    }
}
