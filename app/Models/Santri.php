<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
  
    protected $table = 'santris';

    protected $fillable = [
        'id_jabatan',
        'id_golongansantri',
        'id_kelas',
        'id_user',
        'no_ktp',
        'nama_lengkap',
        'nama_panggilan',
        'nama_kunyah',
        'tempat_lahir',
        'tanggal_lahir',
        'kota_asal',
        'alamat_asal',
        'no_hp',
        'email',
        'nama_kampus',
        'jurusan',
        'strata',
        'tahun_angkatan',
        'tahun_masuk',
        'tahun_keluar',
        'foto_profil'
    ];
}
