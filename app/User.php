<?php

namespace App;

use App\Traits\BrowserAuth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable, BrowserAuth;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'game_password',
        'real_ip_address',
        'ip_address',
        'is_admin',
        'learning_step',
        'webserver'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships
     */
    public function browser_history () {
        return $this->hasMany(BrowserHistory::class, 'user_id', 'id');
    }

    public function network() {
        return $this->morphOne(Network::class, 'entity');
    }

    public function servers () {
        return $this->morphMany(Server::class, 'entity');
    }

    public function hardware_sum($type) {
        $sum = 0;
        foreach ($this->servers as $server) {
            $sum = $sum + $server->hardware->sum($type);
        }

        return $sum;
    }

    /**
     * Attributes
     */
    public function getHistoryAttribute () {
        $browser_history = $this->browser_history;

        return $browser_history->sortByDesc('created_at')->unique('ip_address');
    }
}
