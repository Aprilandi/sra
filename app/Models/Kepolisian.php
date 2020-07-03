<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kepolisian extends Model
{
    protected $table = 'kepolisian';

    protected $primaryKey = 'id_pl';

    protected $fillable = [
        'id_pl',
        'id_user',
        'nama_pl',
        'alamat',
        'loc_gps',
        'no_telp',
        'created_at',
        'update_at'
    ];

    public function kepolisian(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    
    public function detailPenanganan(){
        return $this->hasMany(DetailPenanganan::class, 'id_pl', 'id_pl');
    }
}
