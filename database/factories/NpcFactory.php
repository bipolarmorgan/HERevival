<?php

use App\Npc;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Npc::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'type' => rand(1, 5)
    ];
});
