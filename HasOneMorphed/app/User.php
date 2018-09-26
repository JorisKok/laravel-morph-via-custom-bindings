<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @mixin \Eloquent
 * @property int $id
 *
 * @property Address homeAddress
 * @property Address deliveryAddress
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function homeAddress()
    {
        return $this->morphOne(Address::class, 'type', 'type', 'user_id')->setBindings([$this->id, 'home']);
    }

    public function deliveryAddress()
    {
        return $this->morphOne(Address::class, 'type', 'type', 'user_id')->setBindings([$this->id, 'delivery']);
    }
}
