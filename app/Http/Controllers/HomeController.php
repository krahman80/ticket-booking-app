<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concert;

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
        $concert = Concert::OrderBy('updated_at', 'desc')->take(6)->get();
        // $cart = session()->get('cart','cart is empty');
        // dd($cart);
        //booking page
        return view('user.home',['concerts' => $concert]);
    }
}
