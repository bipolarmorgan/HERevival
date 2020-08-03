<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Network extends Model {
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function entity() {
        return $this->morphTo();
    }
}
