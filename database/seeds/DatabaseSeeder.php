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
        $npcs = Storage::get('npcs.json');
        dd(json_decode($npcs));
    }
}
