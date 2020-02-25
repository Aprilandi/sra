<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KamarSantris extends Model
{
    protected $table= 'kamarsantris';

    protected $fillable = [
        'id_santri',
        'id_kamar',
        'is_ketua_kamar',
        'tgl_masukkamar',
        'tgl_keluarkamar'
    ];

}
