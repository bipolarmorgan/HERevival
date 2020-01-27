<?php

namespace App\Http\Controllers;

use App\BrowserHistory;
use App\Npc;
use App\User;
use Illuminate\Http\Request;

class BrowserController extends Controller {

    public function index ( $ip = '1.2.3.4' ) {

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $type = [
            'type' => 'NPC',
            'color' => 'info'
        ];

        $server = Npc::whereIpAddress($ip)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->first();
            $type = [
                'type' => 'VPC',
                'color' => 'success'
            ];

            if ( !$server ) {
                abort(404);
            }
        }

        BrowserHistory::create([
            'user_id' => user()->id,
            'ip_address' => $ip
        ]);

        return view('pages.browser.index', compact('server', 'type'));

    }

    public function showLogin ( $ip = '1.2.3.4' ) {

        if (user()->hasBrowserAuth()) {
            return redirect()->route('get.browser.index', user()->getBrowserAuth());
        }

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $server = Npc::whereIpAddress($ip)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->first();

            if ( !$server ) {
                abort(404);
            }
        }

        return view('pages.browser.login', compact('server'));

    }

    public function browse ( Request $request ) {

        $request->validate([
            'ip' => ['ipv4', 'max:255']
        ]);

        $ip = $request->ip;

        if ( isNullOrEmpty($ip) ) {
            abort(404); //Something went wrong?
        }

        $server = Npc::whereIpAddress($ip)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->first();

            if ( !$server ) {
                abort(404);
            }
        }

        return redirect()->route('get.browser.index', $ip);

    }

    public function exploits ( $ip = '1.2.3.4' ) {

        if (user()->hasBrowserAuth()) {
            return redirect()->route('get.browser.index', user()->getBrowserAuth());
        }

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $server = Npc::whereIpAddress($ip)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->first();

            if ( !$server ) {
                abort(404);
            }
        }

        return view('pages.browser.exploits', compact('server'));

    }

    public function exploit ( Request $request, $ip = '1.2.3.4' ) {

        if (!$request->hasAny(['bruteforce', 'exploit'])) {
            return redirect()->route('get.browser.index', $ip);
        }

        if (user()->hasBrowserAuth()) {
            return redirect()->route('get.browser.index', user()->getBrowserAuth());
        }

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $server = Npc::whereIpAddress($ip)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->first();

            if ( !$server ) {
                abort(404);
            }
        }

        return 'Lets do exploits';
    }

}
