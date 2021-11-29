<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Concert;
use Faker\Generator as Faker;

use Carbon\Carbon;

$factory->define(Concert::class, function (Faker $faker) {
    
    $now = Carbon::now();

    return [
        //
        'name' => $faker->company(),
        'artist' => $faker->name(),
        'date' => $faker->dateTimeBetween($now, '+5 week'),
        'venue' => $faker->city(),
        'seat' => $faker->numberBetween(50, 100),
    ];
});
