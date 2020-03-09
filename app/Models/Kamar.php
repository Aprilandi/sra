<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    
    protected $primaryKey = 'id_kamar';

    protected $fillable = [
        'nama_kamar',
        'no_kamar',
        'kapasitas_kamar'
    ];

    //Relation Kamar to KamarSantri
    public function KamarSantri(){
        return $this->hasMany('App\Models\KamarSantris','id_kamar');
    }

    
}
