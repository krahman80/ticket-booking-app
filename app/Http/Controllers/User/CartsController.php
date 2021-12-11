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
            // abort(404);
            $cart = []; 
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
            'status' => 'session updated'
        ]);

    }

    public function delete(Request $request){
        $id = $request->input('id');

        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart',$cart);
        }

        // if(count($cart) == 0){
        //     return redirect()->route('user.concert.index');
        // }

        return response()->json([
            'status' => 'session deleted'
        ]);
    }

}
