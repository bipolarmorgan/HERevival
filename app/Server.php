<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {

    protected $fillable = [
        'user_id',
        'npc_id',
    ];

    public function network () {
        return $this->hasOne(Network::class, 'user_id', 'user_id');
    }

    public function hardware () {
        return $this->hasMany(Hardware::class, 'server_id');
    }

    public function summarize() {
        dd($this->hardware->sum('cpu'));
    }
}
