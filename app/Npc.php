<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Npc extends Model {

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function servers() {
        return $this->morphMany(Server::class, 'owner');
    }

    public function network() {
        return $this->morphOne(Network::class, 'owner');
    }
}
