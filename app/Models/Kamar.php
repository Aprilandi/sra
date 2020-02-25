<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
        'nama_kamar',
        'no_kamar',
        'kapasitas_kamar'
    ];

    //Relation Kamar to Santri
    public function santri(){
        return $this->belongsToMany('App\Models\Santri');
    }
}
