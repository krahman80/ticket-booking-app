<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;

class BookingsController extends Controller
{
    public function placeOrder(Request $request){
        // dd($request->input('_token'));
        if ($request->input('_token')!= null) {
            /* 
            get session insert booking into db 
            use transaction 
            */

            //             DB::beginTransaction();
            // try {
            //     DB::insert(...);
            //     DB::insert(...);
            //     DB::insert(...);

            //     DB::commit();
            //     // all good
            // } catch (\Exception $e) {
            //     DB::rollback();
            //     // something went wrong
            // }

            // DB::transaction(function () use ($userId, $numVotes) {
            //     // Possibly failing DB query
            //     DB::table('users')
            //         ->where('id', $userId)
            //         ->update(['votes' => $numVotes]);
            
            //     // Caching query that we don't want to run if the above query fails
            //     DB::table('votes')
            //         ->where('user_id', $userId)
            //         ->delete();
            // });

            $cart = session()->get('cart');


            /* get session insert detail item into db */

        }

         
    }
}
