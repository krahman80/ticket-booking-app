<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use Faker\Generator as Faker;

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'slug' =>  uniqid('tb'),
        'concert_id' => function() {
            return factory(App\Ticket::class)->create()->id;
        },
        'price' => $faker->randomFloat(2, 10, 30),
    ];
});
