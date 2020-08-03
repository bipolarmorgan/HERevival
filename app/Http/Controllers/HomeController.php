<?php

namespace App\Http\Controllers;

use App\Npc;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Storage;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $npcs = json_decode(Storage::get('npcs.json'), true);

        foreach ($npcs as $primary => $npc) {
            if (!isset($npc['type'])) dd($npc);
            $type = $npc['type'];

            if (array_key_exists('hardware', $npc)) {
                if (is_null($npc['name']['en'])) dd($npc, 'test');
                $created_npc = Npc::create([
                    'type'       => $type,
                    'name'       => $npc['name']['en'],
                    'last_reset' => Carbon::now()
                ]);

                $server = $created_npc->servers()->create([
                    'ip_address' => $npc['ip'] ?? generate_ip(),
                    'password'   => Str::random(6)
                ]);

                $server->hardware()->create([
                    'hdd' => $npc['hardware']['hdd'],
                    'cpu' => $npc['hardware']['cpu'],
                    'ram' => $npc['hardware']['ram']
                ]);

                $created_npc->network()->create([
                    'speed' => $npc['hardware']['net'],
                ]);
            } else {
                foreach ($npc as $key => $item) {
                    if ($key === 'type') continue;
                    if (is_null($item['name']['en'])) dd($item, 'test');

                    if (!isset($item['name'])) {
                        dump($item);
                        $item['name'] = 'test';
                    }

                    $npc = Npc::create([
                        'type'       => $type,
                        'name'       => $item['name']['en'],
                        'last_reset' => Carbon::now()
                    ]);

                    $server = $npc->servers()->create([
                        'ip_address' => $item['ip'] ?? generate_ip(),
                        'password'   => Str::random(6)
                    ]);

                    $server->hardware()->create([
                        'hdd' => $item['hardware']['hdd'],
                        'cpu' => $item['hardware']['cpu'],
                        'ram' => $item['hardware']['ram']
                    ]);

                    $npc->network()->create([
                        'speed' => $item['hardware']['net'],
                    ]);
                }
            }
        }

        return view('home', [
            'wanted' => []
        ]);

    }
}
