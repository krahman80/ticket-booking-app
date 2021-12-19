<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory('App\Concert',15)->create()->each(
            function($concert){
                $ticket = factory('App\Ticket')->make([
                    'concert_id' => $concert->id]);
                $concert->ticket()->save($ticket);
            });

        factory('App\User', 3)->create(); 
    }
}
