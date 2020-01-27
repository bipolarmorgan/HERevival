<?php
function generate_ip() {
    return mt_rand(1, 255) . '.' . mt_rand(0, 255) . '.' . mt_rand(0, 255) . '.' . mt_rand(0, 255);
}

/**
 * @return \App\Round
 */
function current_round() {
    return \App\Round::first();
}

/**
 * @return \Illuminate\Contracts\Auth\Authenticatable|\Illuminate\Http\RedirectResponse|App\User|null
 */
function user() {
    if (!auth()->check()) {
        return redirect()->route('home');
    }

    return auth()->user();
}

function isNullOrEmpty($val) {
    return is_null($val) || empty($val);
}

function getUserTypeByName($val) {
    switch ($val) {
        case 'root':
            return 0;
        case 'ssh':
            return 1;
        case 'ftp':
            return 2;
        case 'download':
            return 3;
    }

    return 0;
}
