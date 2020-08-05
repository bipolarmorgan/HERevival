<?php

namespace App\Http\Controllers;

use App\Network;
use Illuminate\Http\Request;

class InternetController extends Controller {
    public function index(Network $network) {
        return view('pages.internet.show', compact('network'));
    }

    public function navigate(Request $request) {
        $data = $request->validate([
            'ip_address' => ['ipv4', 'required']
        ]);

        return redirect()->route('internet', $data['ip_address']);
    }
}
