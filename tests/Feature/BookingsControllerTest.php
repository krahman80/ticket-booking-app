<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;
use App\Booking;

class BookingsControllerTest extends TestCase
{
    /**
     * @test
     */
    public function it_allowed_users_to_save_new_booking() {
        // $user = User::where('is_admin', false)->get()->random();
        $user = User::where('is_admin', false)->find(2);
        $data = [
            'slug' => uniqid('bk'),
            'user_id' => $user->id,
            'booking_time' => now(),
            'expired_time' => now(),
        ];
        
        $this->actingAs($user)->post(route('place.order'), $data);
        
        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id
        ]);

        // $lastInsertBooking = Booking::orderBy('id','desc')->first();
        // $this->assertEquals($lastInsertBooking->user_id, $data['user_id'], "the user id of the saved booking is different from the user log in");

    }
}
