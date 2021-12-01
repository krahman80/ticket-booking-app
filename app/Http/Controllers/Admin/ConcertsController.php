<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Concert;

class ConcertsController extends Controller
{
    public function index(){
        $concerts  = Concert::orderBy('created_at', 'desc')->paginate(10); 
        return view('admin.concert.index', ['concerts' => $concerts]);
    }
}
