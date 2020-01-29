<?php

namespace App\Http\Controllers;

use App\BrowserHistory;
use App\Npc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrowserController extends Controller {

    public function index ( $ip = '1.2.3.4' ) {

        if ( is_null($ip) ) {
            abort(404); //Something went wrong?
        }

        $type = [
            'type'  => 'NPC',
            'color' => 'info'
        ];

        $server = Npc::whereIpAddress($ip)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->first();
            $type = [
                'type'  => 'VPC',
                'color' => 'success'
            ];

            if ( !$server ) {
                abort(404);
            }
        }

        BrowserHistory::create([
            'user_id'    => user()->id,
            'ip_address' => $ip
        ]);

        return view('pages.browser.index', compact('server', 'type'));

    }

    public function showLogin ( $ip = '1.2.3.4' ) {

        if ( user()->hasBrowserAuth() ) {
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

    public function exploits ( $ip = '1.2.3.4' ) {

        if ( user()->hasBrowserAuth() ) {
            return redirect()->route('get.browser.index', user()->getBrowserAuth());
        }

        if ( user()->ip_address === $ip ) {
            return redirect()->back()->withErrors([
                'You can\'t hack yourself.'
            ]);
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

        if ( !$request->hasAny([ 'bruteforce', 'exploit' ]) ) {
            return redirect()->route('get.browser.index', $ip);
        }

        if ( user()->hasBrowserAuth() ) {
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

        if ($request->has('bruteforce')) {

        } else if ($request->has('exploit')) {
            echo 'exp';
        } else {
            echo 'wyd?';
        }

        return 'Lets do exploits';
    }

    public function browse ( Request $request ) {

        $request->validate([
            'ip' => [ 'ipv4', 'max:255' ]
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

    public function login ( Request $request, $ip = '1.2.3.4' ) {

        $request->validate([
            'username' => [ 'required', 'string', Rule::in(config('revival.usernames')) ],
            'password' => [ 'required', 'string', 'min:3', 'max:255' ]
        ]);

        $server = Npc::whereIpAddress($ip)->wherePassword($request->password)->first();
        if ( !$server ) {
            $server = User::whereIpAddress($ip)->wherePassword($request->password)->first();

            if ( !$server ) {
                return 'password unknown.';
            }
        }

        return redirect()->route('get.browser.index', $server->ip_address);
    }

}
