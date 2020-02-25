<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolonganSantri extends Model
{
    protected $table = 'golongan_santris';

    protected $fillable = [
        'golongan_santri'
    ];

    //Relation GolonganSantri to Santri
    public function santri(){
        return $this->hasMany('App\Models\Santri');
    }
}
