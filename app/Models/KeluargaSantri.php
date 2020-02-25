<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeluargaSantri extends Model
{
    protected $table = 'keluarga_santris';

    protected $fillable = [
        'id_santri',
        'nama_ayah',
        'alamat_ayah',
        'pekerjaan_ayah'
    ];
}
