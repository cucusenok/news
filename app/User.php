<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\UserNetwork;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App
 * @property integer $id
 * @property string $name
 * @property string $email
 */
class User extends Authenticatable implements JWTSubject
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function telegram()
    {
        return $this->hasOne('App\UserNetwork', 'userID')
            ->where(UserNetwork::tableName() . '.type', UserNetwork::TYPE_NETWORK_TELEGRAM);
    }

    public function vk()
    {
        return $this->hasOne('App\UserNetwork', 'userID')
            ->where(UserNetwork::tableName() . '.type', UserNetwork::TYPE_NETWORK_VK);
    }

}
