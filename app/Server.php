<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {

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

    public function owner() {
        return $this->morphTo();
    }

    public function network() {
        return $this->hasOne(Network::class);
    }
}
