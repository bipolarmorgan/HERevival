<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model {

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
}
