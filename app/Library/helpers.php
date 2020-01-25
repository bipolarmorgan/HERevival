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

function is_null_or_empty($val) {
    return is_null($val) || empty($val);
}
