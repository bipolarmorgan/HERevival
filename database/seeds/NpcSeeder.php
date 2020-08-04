<?php

use App\Npc;
use Illuminate\Database\Seeder;

class NpcSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $net = [1, 5, 10, 20, 50, 100, 200, 500, 1000];
        factory(\App\Npc::class, 50)->create()->each(function (Npc $npc) use ($net) {
            $npc->servers()->save(factory(\App\Server::class)->make());

            $npc->network()->create([
                'ip_address' => implode('.', [mt_rand(1, 255), mt_rand(1, 255), mt_rand(1, 255), mt_rand(1, 255)]),
                'speed'      => $net[rand(1, 8)]
            ]);
        });
    }
}
