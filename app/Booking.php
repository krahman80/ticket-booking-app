<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    protected $fillable = ['user_id','slug','booking_time','status','expired_time'];   

    public function tickets() {
        return $this->belongsToMany('App\Ticket','booking_ticket','booking_id','ticket_id')
                        ->withPivot('slug', 'qty', 'total_price','artist_name', 'concert_name', 'price')
                        ->withTimestamps();
    }

    // public function getExpiredAttribute()
    // {
    //     $expired = new Carbon($this->booking_time);
    //     return $expired->addDays(1);
    // }

    public function getBookingStatusAttribute()
    {
        if ($this->status == 0) {
            return "not paid";
        } else if ($this->status == 1) {
            return "paid";
        } else {
            return "expired";
        }
        
    }
}
