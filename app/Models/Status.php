<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';

    protected $primaryKey = 'id_sts';

    protected $fillable = [
        'id_sts',
        'nama_sts',
        'keterangan',
        'created_at',
        'update_at'
    ];

    public function detailPenanganan(){
        return $this->hasMany(DetailLaporan::class, 'id_sts', 'id_sts');
    }
}
