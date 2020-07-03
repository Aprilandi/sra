<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenanganan extends Model
{
    protected $table = 'detail_penanganan';

    protected $primaryKey = 'id_penanganan';

    protected $fillable = [
        'id_penanganan',
        'id_lapor',
        'id_sts',
        'id_rs',
        'id_pl',
        'waktu_estimasi',
        'keterangan',
        'created_at',
        'update_at'
    ];

    public function rumahSakit(){
        return $this->belongsTo(RumahSakit::class, 'id_rs', 'id_rs');
    }

    public function kepolisian(){
        return $this->belongsTo(Kepolisian::class, 'id_pl', 'id_pl');
    }

    public function laporan(){
        return $this->belongsTo(Laporan::class, 'id_lapor', 'id_lapor');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'id_sts', 'id_sts');
    }
}
