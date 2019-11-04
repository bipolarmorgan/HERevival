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
