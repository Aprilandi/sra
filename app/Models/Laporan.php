<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $primaryKey = 'id_lapor';

    protected $fillable = [
        'id_lapor',
        'id_jenis',
        'pelapor',
        'loc_gps',
        'keterangan',
        'tanggal_laporan',
        'created_at',
        'update_at'
    ];

    public function detailPenanganan(){
        return $this->hasOne(DetailPenanganan::class, 'id_lapor', 'id_lapor');
    }

    public function detailLaporan(){
        return $this->hasMany(DetailLaporan::class, 'id_lapor', 'id_lapor');
    }

    public function jenisKecelakaan(){
        return $this->belongsTo(JenisKecelakaan::class, 'id_jenis', 'id_jenis');
    }
}
