<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Model;

class KategoriKeuangan extends Model
{
    protected $table = 'kategori_keuangan';

    protected $primaryKey = 'id_kk';

    protected $fillable = [
        'id_kk',
        'nama_kategori',
        'jenis_kategori'
    ];

    // //Relation KategoriKeuangan to Transaksi
    // public function Transaksi()
    // {
    //     return $this->hasMany('App\Models\Keuangan\KamarSantris', 'id_transaksi');
    // }
}
