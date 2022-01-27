<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    protected $fillable = ['name', 'artist', 'venue', 'seat', 'expired'];

    public function ticket() {
        return $this->hasOne('App\Ticket');
    }

    public function getExpiredStatusAttribute()
    {
        if ($this->expired == 1) {
            return "Expired";
        }
    }
}
