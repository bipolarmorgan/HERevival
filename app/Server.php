<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model {

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'type'
    ];

    public function entity() {
        return $this->morphTo();
    }

    public function network() {
        return $this->hasOne(Network::class, 'user_id', 'user_id');
    }

    public function hardware() {
        return $this->hasMany(Hardware::class, 'server_id');
    }

    public function getTypeAttribute() {
        if ($this->entity_type === User::class) {
            return [
                'type' => 'VPC',
                'color' => 'success'
            ];
        }

        return [
            'type' => 'NPC',
            'color' => 'info'
        ];
    }

    public function summarize() {
        dd($this->hardware->sum('cpu'));
    }
}
