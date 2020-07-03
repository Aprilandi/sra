<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rumah_sakit')->insert([
            'id_user' => '2',
            'nama_rs' => 'RSU Haji Surabaya',
            'alamat' => 'Jl. Dr. Ir. H. Soekarno 10, Klampis Ngasem, Kec. Sukolilo, Kota SBY, Jawa Timur 60116',
            'lat' => '-7.283917',
            'lng' => '112.780872',
            'no_telp' => '12',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
