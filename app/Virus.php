<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Virus extends Model {

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

    public function installer() {
        return $this->hasOne(User::class);
    }

    public function installed_on() {
        return $this->morphTo();
    }
}
