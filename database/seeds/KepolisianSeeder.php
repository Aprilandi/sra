<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KepolisianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kepolisian')->insert([
            'id_user' => '3',
            'nama_pl' => 'Polsek Sukolilo Surabaya',
            'alamat' => 'Jl. Manyar Kertoadi 1 No.701, Klampis Ngasem, Kec. Sukolilo, Kota SBY, Jawa Timur 60117',
            'lat' => '-7.285651',
            'lng' => '112.781490',
            'no_telp' => '13',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
