<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    

    public function ticket() {
        return $this->belongsToMany('app\Ticket')
    }

}
