<?php

use App\Server;
use Faker\Generator as Faker;

$cpu_size = [1000, 2000, 4000, 6000, 10000];
$size = [512, 1024, 2048, 4096, 8192, 9126, 10240];

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Server::class, function (Faker $faker) use ($cpu_size, $size) {
    return [
        'cpu' => $cpu_size[rand(0, 4)],
        'hdd' => $size[rand(0, 6)],
        'ram' => $size[rand(0, 6)]
    ];
});
