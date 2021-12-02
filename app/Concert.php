<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['name', 'artist', 'venue', 'seat'];

    public function ticket() {
        return $this->hasOne('App\Ticket');
    }

}
