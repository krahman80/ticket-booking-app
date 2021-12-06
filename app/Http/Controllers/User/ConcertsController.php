<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Concert;
use App\Ticket;

class ConcertsController extends Controller
{
    public function index() {
        $concerts = Concert::orderBy('updated_at','desc')->paginate(12);
        return view('user.concert.index',['concerts'=>$concerts]);
    }

    public function show($id) {
        // dd($request->get('id'));
        // dd($ticket);
        $concert = Concert::findOrFail($id);
        return view('user.concert.show',['concert'=>$concert]);
        
    }

    public function addToCart(Request $request)
    {
        $concert = Concert::findOrFail($request->input('id'));        

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $concert->id => [
                        "id" => $concert->ticket->slug,
                        "concert-name" => $concert->name,
                        "artist-name" => $concert->artist,
                        "qty" => 1,
                        "price" => $concert->ticket->price
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success','cart updated');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$concert->id])) {
            $cart[$concert->id]['qty']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success','cart updated');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$concert->id] = [
                "id" => $concert->ticket->slug,
                "concert-name" => $concert->name,
                "artist-name" => $concert->artist,
                "qty" => 1,
                "price" => $concert->ticket->price
            ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success','cart updated');

    }
}
