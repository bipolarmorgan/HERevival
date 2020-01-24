<?php

namespace App\Http\Controllers;

use App\Npc;
use Illuminate\Http\Request;

class BrowserController extends Controller {
    public function index() {
        $browser_session = user()->getBrowserSession();

        $npc = Npc::whereIpAddress($browser_session['ip_address']);

        if (!$npc->exists()) {
            return view('pages.browser.index', ['webserver' => 'IP does not exist.']);
        }

        $npc = $npc->first();

        $webserver = $npc->webserver;
        $webserver = str_replace('%id%', $npc->id, $webserver);

        return view('pages.browser.index', ['webserver' => $webserver]);
    }

    public function showLogin() {
        if ((session('browser_auth') !== session('browser_session')) && !is_null(session('browser_auth'))) {
            session(['browser_session' => session('browser_auth')]);

            return redirect()->route('get.browser.index');
        }

        return view('pages.browser.login');
    }

    public function login(Request $request) {
        if (!session('browser_session')) {
            session(['browser_session' => '1.2.3.4']);
        }

        if ($request->username !== 'root') {
            return redirect()->back()->withErrors([
                'username' => 'Username isn\'t correct.'
            ]);
        }

        $npc = Npc::whereIpAddress(session('browser_session'))->wherePassword($request->password);
        if (!$npc->exists()) {
            return redirect()->back()->withErrors([
                'password' => 'Password isn\'t correct.'
            ]);
        }

        $npc = $npc->first();

        session([
            'browser_auth' => $npc->ip_address
        ]);

        return true;
    }

    public function hack() {
        if ((session('browser_auth') !== session('browser_session')) && !is_null(session('browser_auth'))) {
            session(['browser_session' => session('browser_auth')]);

            return redirect()->route('get.browser.index');
        }
        return view('pages.browser.hack');
    }

    public function setIp(Request $request) {
        if ($request->method() === 'GET') {
            session(['browser_session' => session('browser_auth')]);

            return redirect()->route('get.browser.index');
        }

        $request->validate([
            'ip' => 'required|ip'
        ]);

        session(['browser_session' => $request->ip]);

        return redirect()->route('get.browser.index');
    }

    public function server($ip) {
        $npc = Npc::whereIpAddress($ip);

        if (!$npc->exists()) {
            abort(404);
        }

        return view('pages.browser.index');
    }
}
