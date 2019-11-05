<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Npc extends Model {
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'name',
        'ip_address',
        'password',
        'webserver',
        'last_reset',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function getHumanTypeAttribute() {
        switch ($this->type) {
            case 0: return 'npc';
            case 1: return 'whois';
            case 2: return 'bank';
            case 3: return 'puzzle';
            case 4: return 'riddle';
            case 5: return 'government';
            case 6: return 'doom';
        }
    }

    /**
     * Relationships
     */

    public function npcs() {
        return $this->hasMany(\App\Npc::class);
    }
}
