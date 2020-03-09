<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanWawancara extends Model
{
    protected $table = 'jawaban_wawancaras';

    protected $primaryKey = 'id_jawabanwawancara';

    protected $fillable = [
        'id_jawabanwawancara',
        'id_wawancara',
        'id_santri',
        'jawaban_wawancara'
    ];
}
