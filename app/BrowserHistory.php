<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrowserHistory extends Model {

    protected $table = 'browser_history';

    protected $fillable = [
        'user_id',
        'ip_address'
    ];

    /**
     * Relationships
     */
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Attributes
     */
    public function getHumanDateAttribute() {
        return $this->created_at->diffForHumans();
    }
}
