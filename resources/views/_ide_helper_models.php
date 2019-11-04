<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Npc
 *
 * @property int $id
 * @property int|null $npc_id
 * @property int $type
 * @property string $name
 * @property string $ip_address
 * @property string $password
 * @property string|null $webserver
 * @property string $last_reset
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $human_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Npc[] $npcs
 * @property-read int|null $npcs_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Npc onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereLastReset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereNpcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Npc whereWebserver($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Npc withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Npc withoutTrashed()
 * @mixin \Eloquent
 */
	class Npc extends \Eloquent {}
}

namespace App{
/**
 * App\Round
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Round whereUpdatedAt($value)
 */
	class Round extends \Eloquent {}
}

namespace App{
/**
 * App\Server
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $npc_id
 * @property string $name
 * @property int $cpu
 * @property int $hdd
 * @property int $ram
 * @property int $network
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Server onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereCpu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereHdd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereNetwork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereNpcId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereRam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Server whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Server withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Server withoutTrashed()
 * @mixin \Eloquent
 */
	class Server extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string|null $game_password
 * @property string $ip_address
 * @property string $game_address
 * @property int $is_admin
 * @property int|null $learning_step
 * @property string|null $webserver
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Server[] $servers
 * @property-read int|null $servers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGameAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGamePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLearningStep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereWebserver($value)
 * @mixin \Eloquent
 * @property string|null $remember_token
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 */
	class User extends \Eloquent {}
}

