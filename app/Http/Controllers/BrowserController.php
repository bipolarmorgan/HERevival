<?php

namespace App\Http\Controllers;

use App\Npc;
use Illuminate\Http\Request;

class BrowserController extends Controller {
    public function index() {
        $browser_session = user()->createBrowserSession();

        $npc = Npc::whereIpAddress($browser_session['ip_address']);

        if (!$npc->exists()) {
            return view('pages.browser.error.404');
        }

        $npc = $npc->first();

        $webserver = $npc->webserver;
        $webserver = str_replace('%id%', $npc->id, $webserver);

        return view('pages.browser.index', ['webserver' => $webserver]);
    }

    public function showLogin() {
        $browser_session = user()->createBrowserSession();

        $npc = Npc::whereIpAddress($browser_session['ip_address']);

        if (!$npc->exists()) {
            return redirect()->route('get.browser.index');
        }

        return view('pages.browser.login');
    }

    public function login(Request $request) {
        $browser_session = user()->createBrowserSession();

        if ($request->username !== 'root') {
            return redirect()->back()->withErrors([
                'username' => 'Username isn\'t correct.'
            ]);
        }

        $npc = Npc::whereIpAddress($browser_session['ip_address'])->wherePassword($request->password);
        if (!$npc->exists()) {
            return redirect()->back()->withErrors([
                'password' => 'Password isn\'t correct.'
            ]);
        }

        $npc = $npc->first();

        user()->replaceBrowserSession([
            'ip_address' => $npc->ip_address,
            'auth'       => user()->getBrowserSessionValue('ip_address')
        ]);

        return redirect()->back();
    }

    public function hack() {
        $browser_session = user()->createBrowserSession();

        $npc = Npc::whereIpAddress($browser_session['ip_address']);

        if (!$npc->exists() || user()->isLoggedInToCurrentServer()) {
            return redirect()->route('get.browser.index');
        }

        return view('pages.browser.hack');
    }

    public function setIp(Request $request) {
        if ($request->method() === 'POST') {
            $request->validate([
                'ip' => 'required|ip'
            ]);
        }

        user()->replaceBrowserSession([
            'ip_address' => $request->ip,
            'auth' => is_null_or_empty(user()->getBrowserSessionValue('auth')) ? null : user()->getBrowserSessionValue('auth')
        ]);

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
