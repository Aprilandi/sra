<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id_role';

    protected $fillable = [
        'id_role',
        'role',
        'created_at',
        'update_at'
    ];

    public function user(){
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}
