<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    
    public function ticket() {
        return $this->hasOne('App\Ticket');
    }

}
