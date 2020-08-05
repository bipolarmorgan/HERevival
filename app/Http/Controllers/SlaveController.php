<?php

namespace App\Http\Controllers;

use App\Slave;

class SlaveController extends Controller {
    public function index() {
        $slaves = Slave::paginate();

        return response()->json($slaves);
    }
}
