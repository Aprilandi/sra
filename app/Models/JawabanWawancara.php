<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanWawancara extends Model
{
    protected $table = 'jawaban_wawancaras';

    protected $fillable = [
        'id_wawancara',
        'id_santri',
        'jawaban_wawancara'
    ];
}
