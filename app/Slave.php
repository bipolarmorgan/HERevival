<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slave extends Model {

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

    public function virus() {
        return $this->morphTo();
    }
}
