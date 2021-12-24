<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Concert;

class ConcertControllerTest extends TestCase
{
    /**
     * @test 
     */
    public function it_allowed_users_to_list_all_concert()
    {
        $user = User::get()->random();
        $response = $this->actingAs($user)->get(route('user.concert.index'));
        $response->assertSuccessful();
        $response->assertViewIs('user.concert.index');
        $response->assertViewHas('concerts');
    }

    /**
     * @test 
     */
    public function it_allowed_users_to_list_individual_concert(){
        $user = User::get()->random();
        $concert = Concert::get()->random();

        $response = $this->actingAs($user)->get(route('user.concert.show',['id' => $concert->id]));
        $response->assertViewIs('user.concert.show');
        $response->assertViewHas('concert');
        $returnedConcert = $response->original->concert;
        $this->assertEquals($concert->id, $returnedConcert->id, "The returned concert is different from the one we requested");
    }
}

