<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_user',
        'id_role',
        'username',
        'password',
        'created_at',
        'update_at'
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function kepolisian(){
        return $this->hasOne(Kepolisian::class, 'id_user', 'id_user');
    }

    public function rumahSakit(){
        return $this->hasOne(RumahSakit::class, 'id_user', 'id_user');
    }

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
}
