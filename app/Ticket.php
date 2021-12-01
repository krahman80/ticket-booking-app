<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    
    public function concert() {
        return $this->belongsTo('App\Concert');
    }

    public function booking() {
        return $this->belongsToMany('App\Booking');
    }
}

