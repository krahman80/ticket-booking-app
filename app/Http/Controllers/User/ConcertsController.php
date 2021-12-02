<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Concert;

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
}
