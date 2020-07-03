<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailLaporan extends Model
{
    protected $table = 'detail_laporan';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_detail',
        'id_lapor',
        'foto_bukti',
        'created_at',
        'update_at'
    ];

    public function laporan(){
        return $this->belongsTo(Laporan::class, 'id_lapor', 'id_lapor');
    }
}
