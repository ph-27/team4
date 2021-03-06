<?php

namespace shoes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'username',
        'password',
        'avatar',
    ];
    protected $primaryKey = 'id';
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comments() {
        return $this->hasMany('shoes\Comment', 'id_user', 'id');
    }
    public function user_roles() {
        return $this->hasOne('shoes\User', 'id', 'id');
    }
    public function bills() {
        return $this->hasMany('shoes\Bill', 'id_user', 'id');
    }

    public function roles() {
        return $this->belongsToMany('shoes\Role', 'user_roles', 'id_user', 'id_role');
    }
}
