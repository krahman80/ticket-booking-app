<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    
    protected $fillable = ['slug','price'];

    public function concert() {
        return $this->belongsTo('App\Concert');
    }

    public function booking() {
        return $this->belongsToMany('App\Booking');
    }
}

