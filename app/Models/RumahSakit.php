<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'rumah_sakit';

    protected $primaryKey = 'id_rs';

    protected $fillable = [
        'id_rs',
        'id_user',
        'nama_rs',
        'alamat',
        'loc_gps',
        'no_telp',
        'created_at',
        'update_at'
    ];

    public function rumahSakit(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function detailPenanganan(){
        return $this->hasMany(DetailPenanganan::class, 'id_rs', 'id_rs');
    }
}
