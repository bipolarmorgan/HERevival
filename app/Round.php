<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Round extends Model {
    use SoftDeletes;

    public function getAgeAttribute() {
        return $this->created_at->diffForHumans(null, \Carbon\CarbonInterface::DIFF_ABSOLUTE);
    }
}
