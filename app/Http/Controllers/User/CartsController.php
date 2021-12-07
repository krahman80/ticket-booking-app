<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart');
        if(!$cart){
            abort(404); 
        }
        return view('user.cart.index',['cart' => $cart]);
    }

    public function update(Request $request){

        $id = $request->input('id');
        $qty = $request->input('qty');

        $cart = session()->get('cart');
        $cart[$id]["qty"] = $qty;
        
        session()->put('cart', $cart);

        return response()->json([
            'status' => 'updated-'.$id.'-'.$qty
        ]);

    }

}
