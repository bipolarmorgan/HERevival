<?php

namespace App\Http\Controllers;

use App\Npc;
use Illuminate\Http\Request;

class BrowserController extends Controller {

    public function index ( $ip = '1.2.3.4' ) {

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $npc = Npc::whereIpAddress($ip)->first();
        if ( !$npc ) {
            abort(404);
        }

        return view('pages.browser.index', compact('npc'));

    }

    public function showLogin ( $ip = '1.2.3.4' ) {

        if (user()->hasAuth()) {
            return redirect()->route('get.browser.index', user()->getAuth());
        }

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $npc = Npc::whereIpAddress($ip)->first();
        if ( !$npc ) {
            abort(404);
        }

        return view('pages.browser.login', compact('npc'));

    }

    public function browse ( Request $request ) {

        $request->validate([
            'ip' => ['ipv4', 'max:255']
        ]);

        $ip = $request->ip;

        if ( isNullOrEmpty($ip) ) {
            abort(404); //Something went wrong?
        }

        $npc = Npc::whereIpAddress($ip)->first();
        if ( !$npc ) {
            abort(404);
        }

        return redirect()->route('get.browser.index', $ip);

    }

    public function exploits ( $ip = '1.2.3.4' ) {

        if (user()->hasAuth()) {
            return redirect()->route('get.browser.index', user()->getAuth());
        }

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $npc = Npc::whereIpAddress($ip)->first();
        if ( !$npc ) {
            abort(404);
        }

        return view('pages.browser.exploits', compact('npc'));

    }

}
