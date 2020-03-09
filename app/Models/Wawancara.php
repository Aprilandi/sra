<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    protected $table = 'wawancaras';

    protected $primaryKey = 'id_wawancara';

    protected $fillable = [
        'id_wawancara',
        'soal_wawancara'
    ];

    //Relation Wawancara to Santri 
    public function santri(){
        return $this->belongsToMany('App\Models\Santri');
    }
}
