<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'id_user',
        'log',
        'tgl_log'
    ];

    //Relation Log to User
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
