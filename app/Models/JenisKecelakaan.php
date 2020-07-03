<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PDO;

class JenisKecelakaan extends Model
{
    protected $table = 'jenis_kecelakaan';

    protected $primaryKey = 'id_jenis';

    protected $fillable = [
        'id_jenis',
        'jenis_kecelakaan',
        'keterangan',
        'created_at',
        'update_at'
    ];

    public function laporan(){
        return $this->hasMany(Laporan::class, 'id_jenis', 'id_jenis');
    }
}
