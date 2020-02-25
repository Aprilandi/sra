<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    protected $table = 'wawancaras';

    protected $fillable = [
        'soal_wawancara'
    ];
}
